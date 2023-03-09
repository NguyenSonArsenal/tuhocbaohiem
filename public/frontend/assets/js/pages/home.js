$(document).ready(function () {
    HomeController.init();
});

var HomeController = {
    init: function () {
        HomeController.sliderBanner();
        HomeController.sliderCourse();
        HomeController.sliderTeacherHome();
    },

    sliderBanner: function () {
        var swiperBanner = new Swiper('.swiper-banner', {
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 4000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            loop: true,
        });
    },

    sliderCourse: function () {
        var sliderCourse = new Swiper('.swiper-course', {
            slidesPerView: 1,
            spaceBetween: 30,
            autoplay: {
                delay: 4000,
            },
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            loop: true,
        });
    },

    sliderTeacherHome: function () {
        var sliderTeacherHome = new Swiper('.swiper-teacher', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
            },
            autoplay: {
                delay: 4000,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
        });
    }
};
