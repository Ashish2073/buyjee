// select search bar auto width menu top
// (function($, window){
//   var arrowWidth = 30;

//   $.fn.resizeselect = function(settings) {  
//     return this.each(function() { 

//       $(this).change(function(){
//         var $this = $(this);

//         // create test element
//         var text = $this.find("option:selected").text();
        
//         var $test = $("<span>").html(text).css({
//           "font-size": $this.css("font-size"), // ensures same size text
//           "visibility": "hidden"               // prevents FOUC
//         });
        

//         // add to body, get width, and get out
//         $test.appendTo($this.parent());
//         var width = $test.width();
//         $test.remove();

//         // set select width
//         $this.width(width + arrowWidth);

//         // run on start
//       }).change();

//     });
//   };

//   // run by default
//   $("select.resizeselect").resizeselect();                       

// })(jQuery, window);

$(window).scroll(function(){
      if ($(this).scrollTop() > 10) {
          $('.home-header').addClass('sticky-header');
      } else {
          $('.home-header').removeClass('sticky-header');
      }
});









 //increase quantity
 	var minVal = 1;
 	var maxVal = $("#stokqunt").val(); // Set Max and Min values
// Increase product quantity on cart page
$(".add").on('click', function(){
		var $parentElm = $(this).parents(".quantity-wrap");
		$(this).addClass("clicked");
		setTimeout(function(){
			$(".clicked").removeClass("clicked");
		},100);
		var value = $parentElm.find(".qtyValue").val();
		if (value < maxVal) {
			value++;
		}
		$parentElm.find(".qtyValue").val(value);
});
// Decrease product quantity on cart page
$(".minus").on('click', function(){
		var $parentElm = $(this).parents(".quantity-wrap");
		$(this).addClass("clicked");
		setTimeout(function(){
			$(".clicked").removeClass("clicked");
		},100);
		var value = $parentElm.find(".qtyValue").val();
		if (value > 1) {
			value--;
		}
		$parentElm.find(".qtyValue").val(value);
	});




$(document).ready(function(){ 

	// search toggle
	// $('.btnsearch').click(function() {
	//     $('.formbox').slideToggle('fast');
	//   });

	$('#btnshow').click(function() {
    $('#btnshow').hide(0);  
    $('#btnhide').show(0);
    $('#searchbox').slideDown('slow');
    });
    $('#btnhide').click(function() {
        $('#btnhide').hide(0);  
    $('#btnshow').show(0);
        $('#searchbox').slideUp();
    });
    $('#btnhide2').click(function() {
        $('#btnhide').hide(0);  
    $('#btnshow').show(0);
        $('#searchbox').slideUp();
    });

    $('#btnshow').click(function(){
	    $('#search').focus();
	});

	
// responsive menu
    if($(window).width()<990){
        // $('.navbar-nav>li.dropdown>a').on('click',function(event){
        //     event.preventDefault();
        //     $(this).next().slideToggle();
        // });

       $(function() {
		    $("ul.navbar-nav > li > a").click(function() {
		    	$(this).next().slideToggle();
		        // $(".mega-menu").slideToggle(500);
		        // $(this).find(".dropdown-menu").slideToggle(400);
		    });
		}); 	
    }

//Tooltip, activated by hover event
   $('[data-toggle="tooltip"]').tooltip();

// main slider
	$("#owl-demo").owlCarousel({
		animateOut: 'slideOutDown',
		animateIn: 'flipInX',
		items: 1,
		margin: 0,
		loop: true,
		nav: false,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		dots: false,
		rewind: true,
		autoplay: true,
		mouseDrag: true,
		singleItem: true,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		checkVisible: false,
		lazyLoad: true,
		responsive: {
			0: {
				items: 1,
				dots: false
			},
			600: {
				items: 1,
				dots: false
			},
			1000: {
				items: 1
			}
		}
	});


	// add Slider
	$("#add-slider").owlCarousel({		
		items: 3,
		margin: 30,
		loop: false,
		nav: false,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		dots: false,
		rewind: true,
		autoplay: true,
		mouseDrag: true,
		singleItem: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		checkVisible: false,
		lazyLoad: true,
		responsive: {
			0: {
				items: 1,
				dots: false,
				margin: 10
			},
			600: {
				items: 2,
				dots: false,
				margin: 10
			},
			1000: {
				items: 3
			}
		}
	});


	// recomended product sider for singlepage
	$("#recomendedProduct").owlCarousel({		
		items: 4,
		margin: 30,
		loop: false,
		nav: false,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		dots: false,
		rewind: true,
		autoplay: true,
		mouseDrag: true,
		singleItem: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		checkVisible: false,
		lazyLoad: true,
		responsive: {
			0: {
				items: 2,
				dots: false,
				margin: 10
			},
			480: {
				items: 4,
				dots: false,
				margin: 10
			},
			990: {
				items: 4,
				dots: false,
				margin: 10
			},
			1100: {
				items: 4
			}
		}
	});

	// recomended product sider for singlepage
	$("#maxviewProduct").owlCarousel({		
		items: 4,
		margin: 30,
		loop: false,
		nav: false,
		navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
		dots: false,
		rewind: true,
		autoplay: true,
		mouseDrag: true,
		singleItem: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		checkVisible: false,
		lazyLoad: true,
		responsive: {
			0: {
				items: 2,
				dots: false,
				margin: 10
			},
			480: {
				items: 4,
				dots: false,
				margin: 10
			},
			990: {
				items: 4,
				dots: false,
				margin: 10
			},
			1100: {
				items: 4
			}
		}
	});

	// instagram slider
	$('#instaslider').owlCarousel({
	    stagePadding: 150,
	    loop:true,
	    margin:25,
	    nav:true,
	    navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
	    dots: false,
		rewind: true,
		autoplay: true,
		mouseDrag: true,
		singleItem: false,
		autoplayTimeout: 5000,
		autoplayHoverPause: true,
		checkVisible: false,
		lazyLoad: true,
	    responsive:{
	        0:{
	            items:1
	        },
	        600:{
	            items:3
	        },
	        1000:{
	            items:4
	        }
	    }
	});


	// thumb slider

	$("#thumslide").owlCarousel({       
        items: 5,
        margin:0,
        loop: false,
        nav: true,
        navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
        dots: false,
        rewind: true,
        autoplay: false,
        mouseDrag: true,
        singleItem: false,
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        checkVisible: false,
        lazyLoad: true,
        responsive: {
            0: {
                items: 4,
                dots: false,
                margin: 0
            },
            600: {
                items: 4,
                dots: false,
                margin: 0
            },
            1000: {
                items: 5
            }
        }
    });

// checkout for different addres on click
/*    $(function () {
        $("#ship-different-add").click(function () {
            if ($(this).is(":checked")) {
                $("#different-address").slideDown();
            } else {
                $("#different-address").slideUp();
            }
        });
    });*/





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

});

// product page slider
$(document).ready(function() {

    var sync1 = $("#sync1");
    var sync2 = $("#sync2");
    var slidesPerPage = 4; //globaly define number of elements per page
    var syncedSecondary = true;

    sync1.owlCarousel({
        items: 1,
        slideSpeed: 2000,
        animateOut: 'fadeOut',
        nav: true,
        autoplay: false, 
        dots: false,
        loop: true,
        responsiveRefreshRate: 200,
        navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #015a7a;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #015a7a;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
    }).on('changed.owl.carousel', syncPosition);

    sync2
        .on('initialized.owl.carousel', function() {
            sync2.find(".owl-item").eq(0).addClass("current");
        })
        .owlCarousel({
            items: slidesPerPage,
            dots: false,
            nav: true,
            navText: ['<svg width="100%" height="100%" viewBox="0 0 11 20"><path style="fill:none;stroke-width: 1px;stroke: #015a7a;" d="M9.554,1.001l-8.607,8.607l8.607,8.606"/></svg>', '<svg width="100%" height="100%" viewBox="0 0 11 20" version="1.1"><path style="fill:none;stroke-width: 1px;stroke: #015a7a;" d="M1.054,18.214l8.606,-8.606l-8.606,-8.607"/></svg>'],
            smartSpeed: 200,
            slideSpeed: 500,
            slideBy: slidesPerPage, //alternatively you can slide by 1, this way the active slide will stick to the first item in the second carousel
            responsiveRefreshRate: 100
        }).on('changed.owl.carousel', syncPosition2);

    function syncPosition(el) {
        //if you set loop to false, you have to restore this next line
        //var current = el.item.index;

        //if you disable loop you have to comment this block
        var count = el.item.count - 1;
        var current = Math.round(el.item.index - (el.item.count / 2) - .5);

        if (current < 0) {
            current = count;
        }
        if (current > count) {
            current = 0;
        }

        //end block

        sync2
            .find(".owl-item")
            .removeClass("current")
            .eq(current)
            .addClass("current");
        var onscreen = sync2.find('.owl-item.active').length - 1;
        var start = sync2.find('.owl-item.active').first().index();
        var end = sync2.find('.owl-item.active').last().index();

        if (current > end) {
            sync2.data('owl.carousel').to(current, 100, true);
        }
        if (current < start) {
            sync2.data('owl.carousel').to(current - onscreen, 100, true);
        }
    }

    function syncPosition2(el) {
        if (syncedSecondary) {
            var number = el.item.index;
            sync1.data('owl.carousel').to(number, 100, true);
        }
    }

    sync2.on("click", ".owl-item", function(e) {
        e.preventDefault();
        var number = $(this).index();
        sync1.data('owl.carousel').to(number, 300, true);
    });
});