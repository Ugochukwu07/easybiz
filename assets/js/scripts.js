$('.owl-carousel.p-social').owlCarousel({
    loop: true,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
$('.owl-carousel.catch-p').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
$('.owl-carousel.back').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 4000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});
$('.owl-item').addClass('wow fadeInDown');

$('.owl-carousel.back').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 12000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 1
        },
        1000: {
            items: 1
        }
    }
});
$('.owl-carousel.blog-carousel').owlCarousel({
    loop: true,
    autoplay: true,
    autoplayTimeout: 12000,
    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 3
        }
    }
});

$(window).on('scroll', function() {
    if ($(window).scrollTop() > 50) {
        $('header').addClass('fixed-menu');
        $('.header-top').addClass('d-none');
    } else {
        $('header').removeClass('fixed-menu');
        $('.header-top').removeClass('d-none');
    }
});

ClassicEditor.create(document.querySelector('#about')).catch(error => {
    console.log(error);
});