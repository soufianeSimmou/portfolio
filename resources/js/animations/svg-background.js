import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

function createSvgBackground() {
    if (document.getElementById('svg-bg')) {
        return document.getElementById('svg-bg');
    }

    const container = document.createElement('div');
    container.id = 'svg-bg';
    container.style.cssText = 'position:fixed;top:0;left:0;width:100%;height:100%;z-index:-1;pointer-events:none;overflow:hidden;';

    container.innerHTML = `
        <svg width="100%" height="100%" viewBox="0 0 1920 1080" preserveAspectRatio="xMidYMid slice">
            <defs>
                <!-- Grille éditeur -->
                <pattern id="editorGrid" width="60" height="28" patternUnits="userSpaceOnUse">
                    <line x1="0" y1="28" x2="60" y2="28" stroke="rgba(30,30,30,0.4)" stroke-width="0.5"/>
                </pattern>

                <!-- Glow filters (plus subtils) -->
                <filter id="glowOrange" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur stdDeviation="4" result="blur"/>
                    <feMerge>
                        <feMergeNode in="blur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
                <filter id="glowBlue" x="-50%" y="-50%" width="200%" height="200%">
                    <feGaussianBlur stdDeviation="3" result="blur"/>
                    <feMerge>
                        <feMergeNode in="blur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>

                <!-- Gradient pour orbes (très subtils) -->
                <radialGradient id="orbOrange" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="rgba(255,77,0,0.06)"/>
                    <stop offset="100%" stop-color="rgba(255,77,0,0)"/>
                </radialGradient>
                <radialGradient id="orbBlue" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="rgba(86,156,214,0.05)"/>
                    <stop offset="100%" stop-color="rgba(86,156,214,0)"/>
                </radialGradient>
                <radialGradient id="orbGreen" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="rgba(106,153,85,0.04)"/>
                    <stop offset="100%" stop-color="rgba(106,153,85,0)"/>
                </radialGradient>
            </defs>

            <!-- Grille de fond (très subtile) -->
            <rect width="100%" height="100%" fill="url(#editorGrid)" opacity="0.3"/>

            <!-- Orbes de lumière (très subtils) -->
            <g id="orbs">
                <circle id="orb1" cx="300" cy="200" r="250" fill="url(#orbOrange)"/>
                <circle id="orb2" cx="1600" cy="400" r="300" fill="url(#orbBlue)"/>
                <circle id="orb3" cx="800" cy="800" r="220" fill="url(#orbGreen)"/>
                <circle id="orb4" cx="1200" cy="150" r="180" fill="url(#orbOrange)"/>
                <circle id="orb5" cx="100" cy="600" r="250" fill="url(#orbBlue)"/>
                <circle id="orb6" cx="1700" cy="900" r="280" fill="url(#orbOrange)"/>
            </g>

            <!-- Gutter gauche (très discret) -->
            <g id="gutter" opacity="0.15">
                <rect x="0" y="0" width="50" height="1080" fill="rgba(15,15,15,0.6)"/>
                <line x1="50" y1="0" x2="50" y2="1080" stroke="rgba(50,50,50,0.4)" stroke-width="1"/>
                <text x="25" y="56" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">01</text>
                <text x="25" y="84" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">02</text>
                <text x="25" y="112" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">03</text>
                <text x="25" y="140" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">04</text>
                <text x="25" y="168" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">05</text>
                <text x="25" y="196" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">06</text>
                <text x="25" y="224" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">07</text>
                <text x="25" y="252" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">08</text>
                <text x="25" y="280" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">09</text>
                <text x="25" y="308" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">10</text>
                <text x="25" y="336" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">11</text>
                <text x="25" y="364" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">12</text>
                <text x="25" y="392" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">13</text>
                <text x="25" y="420" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">14</text>
                <text x="25" y="448" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">15</text>
                <text x="25" y="476" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">16</text>
                <text x="25" y="504" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">17</text>
                <text x="25" y="532" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">18</text>
                <text x="25" y="560" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">19</text>
                <text x="25" y="588" fill="#333" font-family="monospace" font-size="10" text-anchor="middle">20</text>
            </g>

            <!-- Blocs de code stylisés (très subtils) -->
            <g id="codeBlocks">
                <!-- Bloc 1 -->
                <g id="block1" opacity="0.15">
                    <rect x="80" y="100" width="280" height="120" rx="8" fill="rgba(12,12,12,0.8)" stroke="rgba(30,30,30,0.5)" stroke-width="1"/>
                    <rect x="95" y="120" width="60" height="2" rx="1" fill="rgba(86,156,214,0.4)"/>
                    <rect x="160" y="120" width="40" height="2" rx="1" fill="rgba(255,255,255,0.15)"/>
                    <rect x="95" y="135" width="100" height="2" rx="1" fill="rgba(206,145,120,0.3)"/>
                    <rect x="200" y="135" width="30" height="2" rx="1" fill="rgba(255,77,0,0.3)"/>
                    <rect x="110" y="150" width="80" height="2" rx="1" fill="rgba(106,153,85,0.3)"/>
                    <rect x="110" y="165" width="120" height="2" rx="1" fill="rgba(156,220,254,0.25)"/>
                    <rect x="110" y="180" width="60" height="2" rx="1" fill="rgba(255,77,0,0.25)"/>
                    <rect x="95" y="195" width="40" height="2" rx="1" fill="rgba(86,156,214,0.4)"/>
                </g>

                <!-- Bloc 2 -->
                <g id="block2" opacity="0.12">
                    <rect x="1500" y="350" width="320" height="150" rx="8" fill="rgba(12,12,12,0.8)" stroke="rgba(30,30,30,0.5)" stroke-width="1"/>
                    <rect x="1515" y="370" width="80" height="2" rx="1" fill="rgba(197,134,192,0.4)"/>
                    <rect x="1600" y="370" width="50" height="2" rx="1" fill="rgba(255,255,255,0.15)"/>
                    <rect x="1530" y="390" width="140" height="2" rx="1" fill="rgba(86,156,214,0.3)"/>
                    <rect x="1530" y="410" width="100" height="2" rx="1" fill="rgba(206,145,120,0.3)"/>
                    <rect x="1640" y="410" width="60" height="2" rx="1" fill="rgba(255,77,0,0.3)"/>
                    <rect x="1530" y="430" width="180" height="2" rx="1" fill="rgba(156,220,254,0.25)"/>
                    <rect x="1530" y="450" width="70" height="2" rx="1" fill="rgba(106,153,85,0.3)"/>
                    <rect x="1515" y="470" width="50" height="2" rx="1" fill="rgba(197,134,192,0.4)"/>
                </g>

                <!-- Bloc 3 -->
                <g id="block3" opacity="0.1">
                    <rect x="700" y="780" width="300" height="130" rx="8" fill="rgba(12,12,12,0.8)" stroke="rgba(30,30,30,0.5)" stroke-width="1"/>
                    <rect x="715" y="800" width="90" height="2" rx="1" fill="rgba(86,156,214,0.4)"/>
                    <rect x="810" y="800" width="60" height="2" rx="1" fill="rgba(78,201,176,0.3)"/>
                    <rect x="730" y="820" width="150" height="2" rx="1" fill="rgba(206,145,120,0.3)"/>
                    <rect x="730" y="840" width="100" height="2" rx="1" fill="rgba(255,77,0,0.3)"/>
                    <rect x="730" y="860" width="200" height="2" rx="1" fill="rgba(156,220,254,0.25)"/>
                    <rect x="715" y="880" width="60" height="2" rx="1" fill="rgba(86,156,214,0.4)"/>
                </g>
            </g>

            <!-- Accolades (plus subtiles) -->
            <g id="curlies">
                <text id="curly1" x="400" y="280" fill="rgba(255,77,0,0.2)" font-family="'JetBrains Mono', monospace" font-size="120" filter="url(#glowOrange)">{</text>
                <text id="curly2" x="1400" y="600" fill="rgba(255,77,0,0.15)" font-family="'JetBrains Mono', monospace" font-size="100" filter="url(#glowOrange)">}</text>
                <text id="curly3" x="150" y="700" fill="rgba(255,77,0,0.12)" font-family="'JetBrains Mono', monospace" font-size="80">{</text>
                <text id="curly4" x="1650" y="200" fill="rgba(255,77,0,0.18)" font-family="'JetBrains Mono', monospace" font-size="90" filter="url(#glowOrange)">}</text>
                <text id="curly5" x="600" y="950" fill="rgba(255,77,0,0.1)" font-family="'JetBrains Mono', monospace" font-size="70">{</text>
                <text id="curly6" x="1100" y="300" fill="rgba(255,77,0,0.12)" font-family="'JetBrains Mono', monospace" font-size="60">}</text>
            </g>

            <!-- Chevrons HTML -->
            <g id="chevrons">
                <text id="chev1" x="550" y="180" fill="rgba(86,156,214,0.2)" font-family="'JetBrains Mono', monospace" font-size="70" filter="url(#glowBlue)">&lt;/&gt;</text>
                <text id="chev2" x="1200" y="850" fill="rgba(86,156,214,0.15)" font-family="'JetBrains Mono', monospace" font-size="55" filter="url(#glowBlue)">&lt;&gt;</text>
                <text id="chev3" x="900" y="450" fill="rgba(86,156,214,0.12)" font-family="'JetBrains Mono', monospace" font-size="50">&lt;</text>
                <text id="chev4" x="1000" y="450" fill="rgba(86,156,214,0.12)" font-family="'JetBrains Mono', monospace" font-size="50">/&gt;</text>
                <text id="chev5" x="250" y="450" fill="rgba(86,156,214,0.1)" font-family="'JetBrains Mono', monospace" font-size="45">&lt;div&gt;</text>
                <text id="chev6" x="1550" y="750" fill="rgba(86,156,214,0.12)" font-family="'JetBrains Mono', monospace" font-size="40">&lt;/div&gt;</text>
            </g>

            <!-- Crochets -->
            <g id="brackets">
                <text id="brack1" x="750" y="600" fill="rgba(255,215,0,0.15)" font-family="'JetBrains Mono', monospace" font-size="60">[</text>
                <text id="brack2" x="850" y="600" fill="rgba(255,215,0,0.15)" font-family="'JetBrains Mono', monospace" font-size="60">]</text>
                <text id="brack3" x="1300" y="180" fill="rgba(255,215,0,0.1)" font-family="'JetBrains Mono', monospace" font-size="50">[...]</text>
                <text id="brack4" x="100" y="900" fill="rgba(255,215,0,0.08)" font-family="'JetBrains Mono', monospace" font-size="45">[]</text>
            </g>

            <!-- Commentaires -->
            <g id="comments">
                <text id="com1" x="500" y="350" fill="rgba(106,153,85,0.2)" font-family="'JetBrains Mono', monospace" font-size="24">// TODO:</text>
                <text id="com2" x="1100" y="550" fill="rgba(106,153,85,0.15)" font-family="'JetBrains Mono', monospace" font-size="20">/* code */</text>
                <text id="com3" x="300" y="550" fill="rgba(106,153,85,0.12)" font-family="'JetBrains Mono', monospace" font-size="18"># config</text>
                <text id="com4" x="1400" y="1000" fill="rgba(106,153,85,0.1)" font-family="'JetBrains Mono', monospace" font-size="22">// ...</text>
            </g>

            <!-- Symboles -->
            <g id="symbols">
                <text id="sym1" x="650" y="700" fill="rgba(206,145,120,0.2)" font-family="'JetBrains Mono', monospace" font-size="28">=&gt;</text>
                <text id="sym2" x="1050" y="700" fill="rgba(197,134,192,0.15)" font-family="'JetBrains Mono', monospace" font-size="24">const</text>
                <text id="sym3" x="450" y="800" fill="rgba(78,201,176,0.15)" font-family="'JetBrains Mono', monospace" font-size="22">function</text>
                <text id="sym4" x="1500" y="550" fill="rgba(156,220,254,0.12)" font-family="'JetBrains Mono', monospace" font-size="20">return</text>
                <text id="sym5" x="200" y="350" fill="rgba(255,77,0,0.15)" font-family="'JetBrains Mono', monospace" font-size="30">;</text>
                <text id="sym6" x="1700" y="650" fill="rgba(255,77,0,0.12)" font-family="'JetBrains Mono', monospace" font-size="28">;</text>
                <text id="sym7" x="850" y="250" fill="rgba(255,255,255,0.1)" font-family="'JetBrains Mono', monospace" font-size="20">...</text>
            </g>

            <!-- Points -->
            <g id="dots">
                <circle id="dot1" cx="960" cy="520" r="4" fill="rgba(255,77,0,0.25)"/>
                <circle id="dot2" cx="978" cy="520" r="4" fill="rgba(255,77,0,0.25)"/>
                <circle id="dot3" cx="996" cy="520" r="4" fill="rgba(255,77,0,0.25)"/>

                <circle id="dot4" cx="400" cy="650" r="3" fill="rgba(86,156,214,0.2)"/>
                <circle id="dot5" cx="415" cy="650" r="3" fill="rgba(86,156,214,0.2)"/>
                <circle id="dot6" cx="430" cy="650" r="3" fill="rgba(86,156,214,0.2)"/>

                <circle id="dot7" cx="1250" cy="400" r="3" fill="rgba(106,153,85,0.2)"/>
                <circle id="dot8" cx="1265" cy="400" r="3" fill="rgba(106,153,85,0.2)"/>
                <circle id="dot9" cx="1280" cy="400" r="3" fill="rgba(106,153,85,0.2)"/>
            </g>

            <!-- Curseurs -->
            <rect id="cursor1" x="380" y="115" width="2" height="18" fill="rgba(255,77,0,0.4)"/>
            <rect id="cursor2" x="1720" y="365" width="2" height="16" fill="rgba(86,156,214,0.35)"/>

            <!-- Lignes de connexion -->
            <g id="connectors" opacity="0.08">
                <path d="M360 280 Q500 320 550 180" fill="none" stroke="rgba(255,77,0,0.3)" stroke-width="1" stroke-dasharray="4,4"/>
                <path d="M1500 600 Q1300 500 1100 550" fill="none" stroke="rgba(86,156,214,0.25)" stroke-width="1" stroke-dasharray="4,4"/>
                <path d="M700 780 Q600 700 650 600" fill="none" stroke="rgba(106,153,85,0.25)" stroke-width="1" stroke-dasharray="4,4"/>
            </g>

            <!-- Particules -->
            <g id="particles">
                <circle id="p1" cx="200" cy="300" r="2" fill="rgba(255,77,0,0.3)"/>
                <circle id="p2" cx="500" cy="500" r="1.5" fill="rgba(86,156,214,0.25)"/>
                <circle id="p3" cx="800" cy="200" r="2" fill="rgba(106,153,85,0.25)"/>
                <circle id="p4" cx="1100" cy="400" r="1.5" fill="rgba(255,77,0,0.25)"/>
                <circle id="p5" cx="1400" cy="700" r="2" fill="rgba(86,156,214,0.3)"/>
                <circle id="p6" cx="1600" cy="300" r="1.5" fill="rgba(106,153,85,0.2)"/>
                <circle id="p7" cx="300" cy="800" r="2" fill="rgba(255,77,0,0.2)"/>
                <circle id="p8" cx="1000" cy="900" r="1.5" fill="rgba(86,156,214,0.25)"/>
            </g>
        </svg>
    `;

    document.body.insertBefore(container, document.body.firstChild);
    return container;
}

let isInitialized = false;

export function initSvgBackground() {
    if (isInitialized) return;
    isInitialized = true;

    const container = createSvgBackground();
    if (!container) return;

    // === CURSEURS CLIGNOTANTS ===
    gsap.to('#cursor1', { opacity: 0, duration: 0.5, repeat: -1, yoyo: true, ease: 'steps(1)' });
    gsap.to('#cursor2', { opacity: 0, duration: 0.6, repeat: -1, yoyo: true, ease: 'steps(1)', delay: 0.3 });

    // === ORBES ===
    gsap.to('#orb1', { x: 50, y: 30, duration: 10, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#orb2', { x: -40, y: -25, duration: 12, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1 });
    gsap.to('#orb3', { x: 35, y: -20, duration: 11, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 2 });
    gsap.to('#orb4', { x: -30, y: 40, duration: 13, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.5 });
    gsap.to('#orb5', { x: 45, y: 25, duration: 10.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1.5 });
    gsap.to('#orb6', { x: -35, y: -30, duration: 11.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 2.5 });

    // === BLOCS DE CODE ===
    gsap.to('#block1', { y: 8, duration: 8, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#block2', { y: -6, duration: 9, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1 });
    gsap.to('#block3', { y: 10, duration: 7, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 2 });

    // === ACCOLADES ===
    gsap.to('#curly1', { y: 20, x: 10, rotation: 5, duration: 9, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#curly2', { y: -15, x: -8, rotation: -4, duration: 10, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1 });
    gsap.to('#curly3', { y: 25, x: 10, rotation: 4, duration: 8, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 2 });
    gsap.to('#curly4', { y: -20, x: -12, rotation: -5, duration: 9.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.5 });
    gsap.to('#curly5', { y: 15, x: 6, rotation: 3, duration: 8.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1.5 });
    gsap.to('#curly6', { y: -12, x: -6, rotation: -3, duration: 7.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 2.5 });

    // === CHEVRONS ===
    gsap.to('#chev1', { y: 12, rotation: 2, duration: 8, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#chev2', { y: -10, rotation: -2, duration: 9, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1 });
    gsap.to('#chev3', { x: 6, duration: 7, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#chev4', { x: -6, duration: 7, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#chev5', { y: 8, duration: 8.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.5 });
    gsap.to('#chev6', { y: -12, duration: 7.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1.5 });

    // === CROCHETS ===
    gsap.to('#brack1', { y: 10, duration: 7, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#brack2', { y: 10, duration: 7, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.2 });
    gsap.to('#brack3', { y: -8, x: 4, duration: 8, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1 });
    gsap.to('#brack4', { y: 12, duration: 7.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.8 });

    // === COMMENTAIRES ===
    gsap.to('#com1', { y: 6, duration: 6, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#com2', { y: -5, duration: 7, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.5 });
    gsap.to('#com3', { y: 8, duration: 5.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1 });
    gsap.to('#com4', { y: -6, duration: 7.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1.5 });

    // === SYMBOLES ===
    gsap.to('#sym1', { x: 4, duration: 5, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#sym2', { y: 5, duration: 6, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.5 });
    gsap.to('#sym3', { y: -4, duration: 6.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 1 });
    gsap.to('#sym4', { x: -3, duration: 4.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.3 });
    gsap.to('#sym5', { y: 6, duration: 5, repeat: -1, yoyo: true, ease: 'sine.inOut' });
    gsap.to('#sym6', { y: -5, duration: 5.5, repeat: -1, yoyo: true, ease: 'sine.inOut', delay: 0.8 });
    gsap.to('#sym7', { opacity: 0.05, duration: 3, repeat: -1, yoyo: true, ease: 'sine.inOut' });

    // === POINTS ===
    gsap.to('#dot1, #dot2, #dot3', { scale: 1.3, duration: 1.5, repeat: -1, yoyo: true, ease: 'sine.inOut', stagger: 0.15 });
    gsap.to('#dot4, #dot5, #dot6', { scale: 1.25, duration: 1.8, repeat: -1, yoyo: true, ease: 'sine.inOut', stagger: 0.12, delay: 0.5 });
    gsap.to('#dot7, #dot8, #dot9', { scale: 1.2, duration: 1.6, repeat: -1, yoyo: true, ease: 'sine.inOut', stagger: 0.1, delay: 1 });

    // === PARTICULES ===
    gsap.to('#p1', { y: -80, x: 40, opacity: 0, duration: 10, repeat: -1, ease: 'none' });
    gsap.to('#p2', { y: -60, x: -25, opacity: 0, duration: 12, repeat: -1, ease: 'none', delay: 1 });
    gsap.to('#p3', { y: -100, x: 30, opacity: 0, duration: 11, repeat: -1, ease: 'none', delay: 2 });
    gsap.to('#p4', { y: -70, x: -35, opacity: 0, duration: 13, repeat: -1, ease: 'none', delay: 0.5 });
    gsap.to('#p5', { y: -90, x: 25, opacity: 0, duration: 10.5, repeat: -1, ease: 'none', delay: 1.5 });
    gsap.to('#p6', { y: -65, x: -20, opacity: 0, duration: 11.5, repeat: -1, ease: 'none', delay: 2.5 });
    gsap.to('#p7', { y: -80, x: 45, opacity: 0, duration: 9.5, repeat: -1, ease: 'none', delay: 3 });
    gsap.to('#p8', { y: -75, x: -30, opacity: 0, duration: 12.5, repeat: -1, ease: 'none', delay: 0.8 });

    // === CONNECTEURS ===
    gsap.to('#connectors path', { strokeDashoffset: 20, duration: 4, repeat: -1, ease: 'none' });

    // === SCROLL PARALLAX ===
    const tl = gsap.timeline({
        scrollTrigger: {
            trigger: document.documentElement,
            start: 'top top',
            end: 'bottom bottom',
            scrub: 2,
        }
    });

    tl.to('#orb1', { y: '+=120', x: '+=40', ease: 'none' }, 0);
    tl.to('#orb2', { y: '+=80', x: '-=30', ease: 'none' }, 0);
    tl.to('#orb3', { y: '-=60', x: '+=25', ease: 'none' }, 0);
    tl.to('#orb4', { y: '+=100', x: '-=30', ease: 'none' }, 0);
    tl.to('#orb5', { y: '-=80', x: '+=35', ease: 'none' }, 0);
    tl.to('#orb6', { y: '-=100', x: '-=35', ease: 'none' }, 0);

    tl.to('#block1', { y: '+=60', ease: 'none' }, 0);
    tl.to('#block2', { y: '+=50', ease: 'none' }, 0);
    tl.to('#block3', { y: '-=55', ease: 'none' }, 0);

    tl.to('#curly1', { y: '+=100', x: '+=30', ease: 'none' }, 0);
    tl.to('#curly2', { y: '+=70', x: '-=25', ease: 'none' }, 0);
    tl.to('#curly3', { y: '-=60', x: '+=28', ease: 'none' }, 0);
    tl.to('#curly4', { y: '+=80', x: '-=20', ease: 'none' }, 0);
    tl.to('#curly5', { y: '-=90', x: '+=25', ease: 'none' }, 0);
    tl.to('#curly6', { y: '+=65', x: '-=15', ease: 'none' }, 0);

    tl.to('#chev1', { y: '+=55', ease: 'none' }, 0);
    tl.to('#chev2', { y: '-=50', ease: 'none' }, 0);
    tl.to('#chev5', { y: '+=40', ease: 'none' }, 0);
    tl.to('#chev6', { y: '-=60', ease: 'none' }, 0);

    tl.to('#gutter', { y: '+=150', ease: 'none' }, 0);
}
