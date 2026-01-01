import gsap from 'gsap';
import { TextPlugin } from 'gsap/TextPlugin';

gsap.registerPlugin(TextPlugin);

export function initHeroAnimations() {
    const heroSection = document.querySelector('#hero');
    if (!heroSection) return;

    const tl = gsap.timeline({
        defaults: { ease: 'power3.out' }
    });

    const codeLines = heroSection.querySelectorAll('.code-line');
    const heroActions = heroSection.querySelector('.hero-actions');

    // Set initial states with 3D perspective
    gsap.set(heroSection, { perspective: 1000 });

    codeLines.forEach(line => {
        gsap.set(line, {
            opacity: 0,
            x: -50,
            rotateY: -15
        });
    });

    // Animate nav first
    tl.from('#main-nav', {
        y: -60,
        opacity: 0,
        duration: 0.6,
        ease: 'back.out(1.5)'
    });

    // Line 1: Comment - slide in with rotation
    tl.to(codeLines[0], {
        opacity: 1,
        x: 0,
        rotateY: 0,
        duration: 0.5,
        ease: 'back.out(1.7)'
    }, '-=0.2');

    // Line 2: h1 open + name - dramatic entrance
    tl.to(codeLines[1], {
        opacity: 1,
        x: 0,
        rotateY: 0,
        duration: 0.6,
        ease: 'back.out(2)'
    }, '-=0.2');

    // Scale pop on name
    const heroName = codeLines[1]?.querySelector('.hero-name');
    if (heroName) {
        tl.from(heroName, {
            scale: 0.8,
            opacity: 0,
            duration: 0.4,
            ease: 'back.out(3)'
        }, '-=0.3');
    }

    // Line 3: role - with accent glow effect
    tl.to(codeLines[2], {
        opacity: 1,
        x: 0,
        rotateY: 0,
        duration: 0.6,
        ease: 'back.out(2)'
    }, '-=0.3');

    // Accent word pop
    const accentWord = codeLines[2]?.querySelector('.c-accent');
    if (accentWord) {
        tl.from(accentWord, {
            scale: 1.3,
            opacity: 0,
            duration: 0.5,
            ease: 'elastic.out(1, 0.5)'
        }, '-=0.3');
    }

    // Lines 4-7: Description - fast stagger
    for (let i = 3; i <= 6; i++) {
        if (codeLines[i]) {
            tl.to(codeLines[i], {
                opacity: 1,
                x: 0,
                rotateY: 0,
                duration: 0.3,
                ease: 'power2.out'
            }, '-=0.2');
        }
    }

    // Line 8: Stack array - bounce in
    if (codeLines[7]) {
        tl.to(codeLines[7], {
            opacity: 1,
            x: 0,
            rotateY: 0,
            duration: 0.5,
            ease: 'back.out(2)'
        }, '-=0.1');

        // Animate each string in the array
        const strings = codeLines[7].querySelectorAll('.c-string');
        strings.forEach((str, i) => {
            tl.from(str, {
                scale: 0,
                opacity: 0,
                duration: 0.3,
                ease: 'back.out(3)'
            }, `-=${i === 0 ? 0.2 : 0.25}`);
        });
    }

    // Buttons - slide up with bounce
    if (heroActions) {
        tl.to(heroActions, {
            opacity: 1,
            y: 0,
            duration: 0.6,
            ease: 'back.out(1.7)'
        }, '-=0.2');

        // Stagger buttons
        const buttons = heroActions.querySelectorAll('.btn');
        tl.from(buttons, {
            y: 20,
            opacity: 0,
            duration: 0.4,
            stagger: 0.1,
            ease: 'back.out(2)'
        }, '-=0.4');
    }

    // Add hover effect on code lines
    codeLines.forEach(line => {
        line.addEventListener('mouseenter', () => {
            gsap.to(line, {
                x: 8,
                duration: 0.2,
                ease: 'power2.out'
            });
        });
        line.addEventListener('mouseleave', () => {
            gsap.to(line, {
                x: 0,
                duration: 0.2,
                ease: 'power2.out'
            });
        });
    });

    // Floating animation on hero title lines
    gsap.to('.hero-line', {
        y: -5,
        duration: 2.5,
        repeat: -1,
        yoyo: true,
        ease: 'sine.inOut',
        stagger: 0.2
    });
}
