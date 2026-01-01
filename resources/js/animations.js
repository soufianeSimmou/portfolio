import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

export function initAnimations() {
    // Hero animations
    const heroLines = document.querySelectorAll('.hero .code-line');
    gsap.to(heroLines, {
        opacity: 1,
        x: 0,
        duration: 0.8,
        stagger: 0.1,
        ease: 'power2.out'
    });

    const heroActions = document.querySelector('.hero-actions');
    if (heroActions) {
        gsap.to(heroActions, {
            opacity: 1,
            y: 0,
            duration: 0.8,
            delay: heroLines.length * 0.1,
            ease: 'power2.out'
        });
    }

    // Section headers
    const sectionCodes = document.querySelectorAll('.section-code');
    sectionCodes.forEach(code => {
        gsap.to(code, {
            scrollTrigger: {
                trigger: code,
                start: 'top 80%',
            },
            opacity: 1,
            y: 0,
            duration: 0.6,
            ease: 'power2.out'
        });
    });

    // Cards
    const cards = document.querySelectorAll('.card');
    cards.forEach((card, i) => {
        gsap.to(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
            },
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: i * 0.1,
            ease: 'power2.out'
        });
    });

    // Project cards
    const projectCards = document.querySelectorAll('.project-card');
    projectCards.forEach((card, i) => {
        gsap.to(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
            },
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: i * 0.1,
            ease: 'power2.out'
        });
    });

    // Timeline items
    const timelineItems = document.querySelectorAll('.timeline-item');
    timelineItems.forEach((item, i) => {
        gsap.to(item, {
            scrollTrigger: {
                trigger: item,
                start: 'top 85%',
            },
            opacity: 1,
            x: 0,
            duration: 0.6,
            delay: i * 0.1,
            ease: 'power2.out'
        });
    });

    // Stat cards
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach((card, i) => {
        gsap.to(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
            },
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: i * 0.1,
            ease: 'power2.out'
        });
    });

    // Contact cards
    const contactCards = document.querySelectorAll('.contact-card');
    contactCards.forEach((card, i) => {
        gsap.to(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
            },
            opacity: 1,
            y: 0,
            duration: 0.6,
            delay: i * 0.1,
            ease: 'power2.out'
        });
    });

    // Animate stat numbers
    const statNums = document.querySelectorAll('.stat-num');
    statNums.forEach(num => {
        const target = parseFloat(num.dataset.value);
        const suffix = num.dataset.suffix || '';

        ScrollTrigger.create({
            trigger: num,
            start: 'top 85%',
            onEnter: () => {
                gsap.to(num, {
                    innerHTML: target,
                    duration: 2,
                    snap: { innerHTML: target < 100 ? 0.1 : 1 },
                    onUpdate: function() {
                        const val = parseFloat(this.targets()[0].innerHTML);
                        this.targets()[0].innerHTML = val.toFixed(target < 100 ? 1 : 0) + suffix;
                    }
                });
            },
            once: true
        });
    });
}
