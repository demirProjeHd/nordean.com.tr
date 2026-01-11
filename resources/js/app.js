import './bootstrap';
import Alpine from 'alpinejs';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Alpine = Alpine;
Alpine.start();

// Make Swiper available globally
window.Swiper = Swiper;
window.SwiperModules = { Navigation, Pagination, Autoplay };

// Initialize Swiper sliders
document.addEventListener('DOMContentLoaded', function() {
    // References Slider
    const referencesSwiper = new Swiper('.references-swiper', {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 16,
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.references-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.references-button-next',
            prevEl: '.references-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 16,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 16,
            }
        }
    });

    // Products Slider
    const productsSwiper = new Swiper('.products-swiper', {
        modules: [Navigation, Pagination, Autoplay],
        slidesPerView: 1,
        spaceBetween: 16,
        autoplay: {
            delay: 6000,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.products-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.products-button-next',
            prevEl: '.products-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 24,
            }
        }
    });
});
