import './bootstrap';
import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import { TextPlugin } from 'gsap/TextPlugin';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

// Register GSAP plugins
gsap.registerPlugin(ScrollTrigger, TextPlugin, ScrollToPlugin);

// Import animation modules
import { initAnimations } from './animations';
import { initVideoPlayers } from './components/video-player';

// Initialize when DOM is ready
document.addEventListener('DOMContentLoaded', () => {
    initAnimations();
    initVideoPlayers();
});
