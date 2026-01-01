import { initHeroAnimations } from './hero';
import { initScrollTriggers } from './scroll-triggers';
import { initHoverEffects } from './hover-effects';
import { initSvgBackground } from './svg-background';

export function initAnimations() {
    // Check for reduced motion preference
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');

    if (!prefersReducedMotion.matches) {
        // Initialize all animations
        initSvgBackground();
        initHeroAnimations();
        initScrollTriggers();
        initHoverEffects();
    } else {
        // For users who prefer reduced motion, just show elements immediately
        import('gsap').then(({ gsap }) => {
            gsap.set('.code-line, .hero-actions, .section-code, .card, .project-card, .timeline-item, .stat-card, .contact-card', {
                opacity: 1,
                x: 0,
                y: 0,
                rotateY: 0
            });
        });
    }
}
