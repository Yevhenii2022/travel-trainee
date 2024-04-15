document.addEventListener('DOMContentLoaded', function () {
    const swiper = new Swiper('.swiper__swiper', {
        loop: true,
        effect: 'fade',
    });

    const excursions = new Swiper('.excursions__slider', {
        slidesPerView: 1,
        spaceBetween: 16,
        loop: true,
        speed: 800,
        centeredSlides: true,
        keyboard: {
            enabled: true,
        },
        pagination: {
            el: '.swiper__pagination',
            type: 'fraction',
        },
        navigation: {
            nextEl: '.swiper__nav--next',
            prevEl: '.swiper__nav--prev',
        },
        breakpoints: {
            542: {
                slidesPerView: 2.3,
                pagination: false,
            },
            1026: {
                slidesPerView: 3.3,
                pagination: false,
            },
        },
    });

    const homeGallery = new Swiper('.gallery__slider', {
        slidesPerView: 1.425,
        spaceBetween: 8,
        freeMode: true,
        loop: true,
        speed: 500,
        centeredSlides: true,
        autoplay: {
            delay: 3000,
        },
        breakpoints: {
            542: {
                spaceBetween: 16,
                slidesPerView: 2.8,
                freeMode: true,
                loop: true,

            },
            1026: {
                spaceBetween: 16,
                slidesPerView: 3.7,
                freeMode: true,
                loop: true,

            },
        },
    });

    const galleryPage = new Swiper('.gallery-page__slider', {
        loop: true,
        spaceBetween: 8,
        slidesPerView: 2.8,
        centeredSlides: true,
        watchSlidesProgress: true,
        breakpoints: {
            542: {
                spaceBetween: 12,
                slidesPerView: 4.8,
            },
            1026: {
                spaceBetween: 16,
                slidesPerView: 6.29,
            },
        },
    });

    const galleryPage2 = new Swiper('.gallery-page__slider2', {
        loop: true,
        spaceBetween: 12,
        centeredSlides: true,
        slidesPerView: 'auto',
        pagination: {
            el: '.swiper-pagination',
            type: 'fraction',
        },
        navigation: {
            nextEl: '.gallery__nav--next',
            prevEl: '.gallery__nav--prev',
        },
    });

    galleryPage.controller.control = galleryPage2;
    galleryPage2.controller.control = galleryPage;

    //fancybox
    Fancybox.bind('[data-fancybox="gallery"]', {
        idle: false,
        showClass: false,
        hideClass: false,
        dragToClose: false,
        contentClick: false,
        Toolbar: {
            display: {
                left: [],
                middle: ['infobar'],
                right: ['close'],
            },
        },
        Thumbs: {
            type: 'classic',
        },
    });
});
