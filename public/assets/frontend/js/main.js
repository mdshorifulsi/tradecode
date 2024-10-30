function openMenu() {

    document.getElementById('side_menu').style.display = 'block';
    document.getElementById('menu-btn').style.display = 'none';
    document.getElementById('close-btn').style.display = 'block';

}
function closeMenu() {

    document.getElementById('side_menu').style.display = 'none';
    document.getElementById('menu-btn').style.display = 'block';
    document.getElementById('close-btn').style.display = 'none';

}

$('#owl-category-product').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    // autoplay:true,
    autoplayTimeout: 5000,

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
})



$('#owl-category-product-2').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    // autoplay:true,
    autoplayTimeout: 5000,

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
})


$('#owl-category-product-3').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    // autoplay:true,
    autoplayTimeout: 5000,

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
})
$('#owl-category-product-4').owlCarousel({
    loop: true,
    margin: 20,
    nav: true,
    dots: false,
    // autoplay:true,
    autoplayTimeout: 5000,

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
})


$('#owl-brand').owlCarousel({
    loop: true,
    margin: 20,
    nav: false,
    dots: false,
    autoplay:true,
    autoplayTimeout: 3000,

    responsive: {
        0: {
            items: 1
        },
        600: {
            items: 2
        },
        1000: {
            items: 4
        }
    }
})



