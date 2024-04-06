// window loader

$(window).on('load', function() { // makes sure the whole site is loaded 

  $('#overlayer').fadeOut(); // will first fade out the loading animation 

  $('#loader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website. 

  $('body').delay(350).css({'overflow':'visible'});

})



$(document).ready(function(){   



    // // RELOADS WEBPAGE WHEN MOBILE ORIENTATION CHANGES  

    window.onorientationchange = function () {

            var orientation = window.orientation;

            switch (orientation) {

                case 0:

                case 90:

                case -90: window.location.reload();

                    break;

            }

        };



// main slider

        $("#owl-demo").owlCarousel({

            items: 1,

            margin:0,

            loop: true,

            nav:false,

            navText: [

                '<i class="fa fa-angle-left" aria-hidden="true"></i>',

                '<i class="fa fa-angle-right" aria-hidden="true"></i>'

            ],

            dots: true,

            rewind: true,

            autoplay: true,

            mouseDrag: true,

            singleItem: true,

            autoplayTimeout: 5000,

            autoplayHoverPause: true,

            checkVisible: false,

            lazyLoad:true,

            responsive:{

                0:{

                    items:1,

                    dots:false

                },

                600:{

                    items:1,

                    dots:false

                },

                1000:{

                    items:1

                }

            }

        })



    // store banner slider

        $("#store-slider").owlCarousel({

                items: 1,

                margin:0,

                loop: true,

                nav:false,

                navText: [

                    '<i class="fa fa-angle-left" aria-hidden="true"></i>',

                    '<i class="fa fa-angle-right" aria-hidden="true"></i>'

                ],

                dots: false,

                rewind: true,

                autoplay: true,

                mouseDrag: true,

                singleItem: true,

                autoplayTimeout: 5000,

                autoplayHoverPause: true,

                checkVisible: false,

                lazyLoad:true,

                responsive:{

                    0:{

                        items:1,

                        dots:false

                    },

                    600:{

                        items:1,

                        dots:false

                    },

                    1000:{

                        items:1

                    }

                }

            })



        // fashion slider



        $("#fashion").owlCarousel({

            items: 1,

            margin:0,

            loop: true,

            nav:false,

            navText: [

                '<i class="fa fa-angle-left" aria-hidden="true"></i>',

                '<i class="fa fa-angle-right" aria-hidden="true"></i>'

            ],

            dots: true,

            rewind: true,

            autoplay: true,

            mouseDrag: true,

            singleItem: true,

            autoplayTimeout: 5000,

            autoplayHoverPause: true,

            checkVisible: false,

            responsive:{

                0:{

                    items:1,

                    dots:false

                },

                600:{

                    items:2,

                    dots:false

                },

                768:{

                    items:2,

                    dots:false

                },

                991:{

                    items:3

                },

                1100:{

                    items:4

                }

            }

        })



    // art slider



        $("#art").owlCarousel({

            items: 1,

            margin:0,

            loop: true,

            nav:false,

            navText: [

                '<i class="fa fa-angle-left" aria-hidden="true"></i>',

                '<i class="fa fa-angle-right" aria-hidden="true"></i>'

            ],

            dots: true,

            rewind: true,

            autoplay: true,

            mouseDrag: true,

            singleItem: true,

            autoplayTimeout: 5000,

            autoplayHoverPause: true,

            checkVisible: false,

            responsive:{

                0:{

                    items:1,

                    dots:false

                },

                600:{

                    items:2,

                    dots:false

                },

                768:{

                    items:2,

                    dots:false

                },

                991:{

                    items:3

                },

                1100:{

                    items:4

                }

            }

        })




// home living slider

$("#homeliving").owlCarousel({

            items: 1,

            margin:0,

            loop: true,

            nav:false,

            navText: [

                '<i class="fa fa-angle-left" aria-hidden="true"></i>',

                '<i class="fa fa-angle-right" aria-hidden="true"></i>'

            ],

            dots: true,

            rewind: true,

            autoplay: true,

            mouseDrag: true,

            singleItem: true,

            autoplayTimeout: 5000,

            autoplayHoverPause: true,

            checkVisible: false,

            responsive:{

                0:{

                    items:1,

                    dots:false

                },

                600:{

                    items:2,

                    dots:false

                },

                768:{

                    items:2,

                    dots:false

                },

                991:{

                    items:3

                },

                1100:{

                    items:4

                }

            }

        })





// media slider



         $("#media-slider").owlCarousel({

                    items: 1,

                    margin:10,

                    loop: true,

                    nav:false,

                    navText: [

                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',

                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'

                    ],

                    dots: true,

                    rewind: true,

                    autoplay: true,

                    mouseDrag: true,

                    singleItem: true,

                    autoplayTimeout: 5000,

                    autoplayHoverPause: true,

                    checkVisible: false,                                        

                    responsive:{

                        0:{

                            items:1,

                            dots:false

                        },

                        600:{

                            items:2,

                            dots:false

                        },

                        768:{

                            items:2,

                            dots:false

                        },

                        991:{

                            items:3

                        }

                    }

                })





// news slider



         $("#news-slider").owlCarousel({

                    items: 1,

                    margin:10,

                    loop: true,

                    nav:false,

                    navText: [

                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',

                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'

                    ],

                    dots: true,

                    rewind: true,

                    autoplay: true,

                    mouseDrag: true,

                    singleItem: true,

                    autoplayTimeout: 5000,

                    autoplayHoverPause: true,

                    checkVisible: false,                                        

                    responsive:{

                        0:{

                            items:1,

                            dots:false

                        },

                        600:{

                            items:2,

                            dots:false

                        },

                        768:{

                            items:2,

                            dots:false

                        },

                        991:{

                            items:3

                        }

                    }

                })





// news slider



         $("#creator-slider").owlCarousel({

                    items: 1,

                    margin:10,

                    loop: true,

                    nav:false,

                    navText: [

                        '<i class="fa fa-angle-left" aria-hidden="true"></i>',

                        '<i class="fa fa-angle-right" aria-hidden="true"></i>'

                    ],

                    dots: true,

                    rewind: true,

                    autoplay: true,

                    mouseDrag: true,

                    singleItem: true,

                    autoplayTimeout: 5000,

                    autoplayHoverPause: true,

                    checkVisible: false,                                        

                    responsive:{

                        0:{

                            items:1,

                            dots:false

                        },

                        600:{

                            items:2,

                            dots:false

                        },

                        768:{

                            items:2,

                            dots:false

                        },

                        991:{

                            items:3

                        }

                    }

                })



        



         // checkout for different addres on click

        $(function () {

            $("#ship-different-add").click(function () {

                if ($(this).is(":checked")) {

                    $("#different-address").slideDown();

                } else {

                    $("#different-address").slideUp();

                }

            });

        });



    





//bottom to top scroll for window top

    $(window).scroll(function(){ 

        if ($(this).scrollTop() > 100) { 

            $('#scroll').fadeIn(); 

        } else { 

            $('#scroll').fadeOut(); 

        } 

    }); 

    $('#scroll').click(function(){ 

        $("html, body").animate({ scrollTop: 0 }, 600); 

        return false; 

    }); 





// accordian 







});





