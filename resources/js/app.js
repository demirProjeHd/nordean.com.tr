import './bootstrap';
import Alpine from 'alpinejs';

window.Alpine = Alpine;
Alpine.start();

// Hero Slider
document.addEventListener('DOMContentLoaded', function() {
    const slider = document.querySelector('[x-data*="heroSlider"]');
    if (slider) {
        console.log('Hero slider initialized');
    }
});
