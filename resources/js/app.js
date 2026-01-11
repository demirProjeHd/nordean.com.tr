import './bootstrap';
import Alpine from 'alpinejs';
import Swiper from 'swiper';
import { Navigation, Pagination, Autoplay, Grid } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';
import 'swiper/css/grid';
import Pristine from 'pristinejs';

window.Alpine = Alpine;
window.Pristine = Pristine;
Alpine.start();

// Make Swiper available globally
window.Swiper = Swiper;
window.SwiperModules = { Navigation, Pagination, Autoplay, Grid };

// Initialize Swiper sliders
document.addEventListener('DOMContentLoaded', function() {
    // References Slider with Grid (2 rows)
    const referencesSwiper = new Swiper('.references-swiper', {
        modules: [Navigation, Pagination, Autoplay, Grid],
        loop: true,
        slidesPerView: 2,
        spaceBetween: 12,
        grid: {
            rows: 2,
            fill: 'row',
        },
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
                slidesPerView: 3,
                spaceBetween: 16,
                grid: {
                    rows: 2,
                    fill: 'row',
                },
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 16,
                grid: {
                    rows: 2,
                    fill: 'row',
                },
            }
        }
    });

    // Products Slider
    const productsSwiper = new Swiper('.products-swiper', {
        modules: [Navigation, Pagination, Autoplay],
        loop: true,
        slidesPerView: 2,
        spaceBetween: 12,
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

    // Solutions Slider
    const solutionsSwiper = new Swiper('.solutions-swiper', {
        modules: [Navigation, Pagination, Autoplay],
        loop: true,
        slidesPerView: 2,
        spaceBetween: 12,
        autoplay: {
            delay: 5500,
            disableOnInteraction: false,
        },
        pagination: {
            el: '.solutions-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.solutions-button-next',
            prevEl: '.solutions-button-prev',
        },
        breakpoints: {
            640: {
                slidesPerView: 3,
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 4,
                spaceBetween: 24,
            }
        }
    });
});
