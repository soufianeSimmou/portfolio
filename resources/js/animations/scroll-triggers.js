import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';

export function initScrollTriggers() {

    // =============================================
    // SECTION CODE HEADERS
    // =============================================
    gsap.utils.toArray('.section-code').forEach(code => {
        gsap.to(code, {
            scrollTrigger: {
                trigger: code,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            opacity: 1,
            y: 0,
            duration: 0.5,
            ease: 'power2.out'
        });
    });

    // =============================================
    // SERVICE CARDS
    // =============================================
    const cards = gsap.utils.toArray('.card');

    gsap.to(cards, {
        scrollTrigger: {
            trigger: '#services',
            start: 'top 75%'
        },
        opacity: 1,
        y: 0,
        duration: 0.5,
        stagger: 0.1,
        ease: 'power2.out'
    });

    // =============================================
    // PROJECT CARDS
    // =============================================
    const projectCards = gsap.utils.toArray('.project-card');

    gsap.to(projectCards, {
        scrollTrigger: {
            trigger: '#projets',
            start: 'top 75%'
        },
        opacity: 1,
        y: 0,
        duration: 0.5,
        stagger: 0.12,
        ease: 'power2.out'
    });

    // =============================================
    // TIMELINE ITEMS
    // =============================================
    const timelineItems = gsap.utils.toArray('.timeline-item');

    timelineItems.forEach((item, index) => {
        gsap.to(item, {
            scrollTrigger: {
                trigger: item,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            opacity: 1,
            x: 0,
            duration: 0.5,
            delay: index * 0.1,
            ease: 'power2.out'
        });
    });

    // =============================================
    // STAT CARDS
    // =============================================
    const statCards = gsap.utils.toArray('.stat-card');

    statCards.forEach((card, index) => {
        const numberEl = card.querySelector('.stat-num');
        const targetValue = parseInt(numberEl?.dataset.value) || 0;
        const suffix = numberEl?.dataset.suffix || '';

        gsap.to(card, {
            scrollTrigger: {
                trigger: card,
                start: 'top 85%',
                toggleActions: 'play none none reverse'
            },
            opacity: 1,
            y: 0,
            duration: 0.4,
            delay: index * 0.08,
            ease: 'power2.out',
            onStart: () => {
                if (numberEl) {
                    gsap.to({ val: 0 }, {
                        val: targetValue,
                        duration: 1,
                        delay: 0.1,
                        ease: 'power2.out',
                        onUpdate: function() {
                            numberEl.textContent = Math.round(this.targets()[0].val) + suffix;
                        }
                    });
                }
            }
        });
    });

    // =============================================
    // CONTACT CARDS
    // =============================================
    const contactCards = gsap.utils.toArray('.contact-card');

    gsap.to(contactCards, {
        scrollTrigger: {
            trigger: '#contact',
            start: 'top 75%'
        },
        opacity: 1,
        y: 0,
        duration: 0.4,
        stagger: 0.08,
        ease: 'power2.out'
    });

    // =============================================
    // SMOOTH SCROLL
    // =============================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;

            const target = document.querySelector(targetId);
            if (target) {
                gsap.to(window, {
                    duration: 1,
                    scrollTo: {
                        y: target,
                        offsetY: 80
                    },
                    ease: 'power3.inOut'
                });
            }
        });
    });
}
