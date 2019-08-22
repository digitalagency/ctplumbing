 //carousel special offer
/*$(document).ready(function() {
     var owl = $("#slider-carousel");
     owl.owlCarousel({
      
       pagination: false,
       margin: 30,
       responsive : {
      // breakpoint from 0 up
      0 : {
          items :1,
         
      },
      // breakpoint from 480 up
      480 : {
           items :1,
          
      },
      // breakpoint from 768 up
      768 : {
           items :4,
      }
      }
    });


   
     $(".next").click(function() {
       owl.trigger('next.owl.carousel');
     })
     $(".prev").click(function() {
       owl.trigger('prev.owl.carousel');
     });


     $('.overlay-btn').on('click', function() {

        $('.overlay').toggle();

     });
   });*/

/* //carousel special offer
$(document).ready(function() {
     var owl = $("#slider-carousel2");
     owl.owlCarousel({
      
       pagination: false,
       margin: 30,
       responsive : {
      // breakpoint from 0 up
      0 : {
          items :1,
         
      },
      // breakpoint from 480 up
      480 : {
           items :1,
          
      },
      // breakpoint from 768 up
      768 : {
           items :4,
      }
      }
     });
     $(".next").click(function() {
       owl.trigger('next.owl.carousel');
     })
     $(".prev").click(function() {
       owl.trigger('prev.owl.carousel');
     });


     $('.overlay-btn').on('click', function() {

        $('.overlay').toggle();

     });
   });

*/

 //carousel top Categories
$(document).ready(function() {
    
   $('#slider-carousel1').owlCarousel({
  loop: true,
  margin: 10,
  nav: true,
  navText: [
    "<i class='fas fa-angle-left'></i>",
    "<i class='fas fa-angle-right'></i>"
  ],
  autoplay: true,
  autoplayHoverPause: true,
  responsive: {
    0: {
      items: 1,
      nav:false
    },
    600: {
      items: 3,
        nav:false
    },
    1000: {
      items: 4
    }
  }
})
  
   

});

//testimonial
$(document).ready(function() {
  
    
   $('.quoteWrap').owlCarousel({
    items:1,
    margin:10,
    autoHeight:true,
    nav: false,
});
       
  
});
//main banner images
$(document).ready(function() {
 
 $('.owl-nome').owlCarousel({
    loop:true,
    autoplay:true,
    nav:true,
    dots: true,
    navText: [
      "<i class='fa fa-angle-left'></i>",
      "<i class='fa fa-angle-right'></i>"
      ],
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:1
        }
    }
})
 
});
//Partners
$('.partner').owlCarousel({
    center: false,
    items: 6,
    loop: true,
    margin: 10,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive: {
      0: {
        items: 2,
        
          },  
      600: {
        items: 3
      },
     1000: {
        items: 6
      }
    }
  });

//Deals Banner
$('#deals').owlCarousel({
    center: false,
    items: 3,
    loop: true,
    margin: 10,
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    responsive: {
      0: {
        items: 1,
        
          },  
      600: {
        items: 1
      }
    }
  });


// scroll Up

    $(window).scroll(function () {
        if ($(this).scrollTop() > 600) {
            $('.scrollup').fadeIn('slow');
        } else {
            $('.scrollup').fadeOut('slow');
        }
    });
    $('.scrollup').click(function () {
        $("html, body").animate({scrollTop: 0}, 1000);
        return false;
    });


$('#monitor').html($(window).width());

$(window).resize(function() {
    var viewportWidth = $(window).width();
    $('#monitor').html(viewportWidth);
});

// price range slider
  $(document).ready(function() {
    $( "#slider-range" ).slider({
      range: true,
      min: 0,
      max: 500,
      values: [ 75, 300 ],
      slide: function( event, ui ) {
        $( "#amount" ).val( "$" + ui.values[ 0 ] + " - $" + ui.values[ 1 ] );
      }
    });
    $( "#amount" ).val( "$" + $( "#slider-range" ).slider( "values", 0 ) +
      " - $" + $( "#slider-range" ).slider( "values", 1 ) );
  } );