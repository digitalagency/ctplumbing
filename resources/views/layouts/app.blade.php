<!DOCTYPE html>
<html lang="en">

<head>

    <title>CT Plumbing</title>

    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1.0,user-scalable=no,maximum-scale=1" media="(device-height: 568px)">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="HandheldFriendly" content="True">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">

    <!-- Style Sheets -->
    {{ HTML::style('assets/css/bootstrap.min.css')}}
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
        integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">

    {{ HTML::style('assets/css/reset.css')}}
    {{ HTML::style('assets/css/trunk.css')}}
    {{ HTML::style('assets/css/fullpage.css')}}
    {{ HTML::style('assets/css/slick.css')}}
    {{ HTML::style('assets/css/aos.css')}}
    {{ HTML::style('assets/css/owl.carousel.min.css')}}
    <!-- {{ HTML::style('assets/css/examples.css')}}-->
    {{ HTML::style('assets/css/style.css')}}
    {{ HTML::style('assets/css/responsive.css')}}

    {{ HTML::style('assets/css/tabs/card.css')}}
    {{ HTML::style('assets/css/tabs/tab.css')}}
    <link href="https://fonts.googleapis.com/css?family=Work+Sans:100,200,300,400,500,600,700,800,900" rel="stylesheet">
    <!-- {{ HTML::style('assets/css/tabs/typography.css')}} -->
    <link href="http://code.jquery.com/ui/1.10.2/themes/smoothness/jquery-ui.css" rel="Stylesheet">

</head>

<body>


    @yield('content')

    {{ HTML::script('assets/js/jquery-3.3.1.min.js')}}
    {{ HTML::script('assets/js/bootstrap.min.js')}}
    {{ HTML::script('assets/js/fullpage.js')}}
    {{ HTML::script('assets/js/slick.min.js')}}
    {{ HTML::script('assets/js/trunk.js')}}
    {{ HTML::script('assets/js/tabs/global.js')}}
    {{ HTML::script('assets/js/tabs/tab-scrollable.js')}}
    <!-- {{ HTML::script('assets/js/counter/waypoints.min.js')}} -->
    <!-- {{ HTML::script('assets/js/aos.js')}} -->
    {{ HTML::script('assets/js/owl.carousel.min.js')}}
    {{ HTML::script('assets/js/counter/jquery.counterup.min.js')}}
    {{ HTML::script('assets/js/script.js')}}



    <script type="text/javascript">
    var myFullpage = new fullpage('#fullpage', {
        // anchors: ['firstPage', 'secondPage', '3rdPage', '4thPage'],
        // sectionsColor: ['#C63D0F', '#1BBC9B', '#7E8F7C'],
        navigation: true,
        navigationPosition: 'right',
        navigation: ['First page', 'Second page', 'Third and last page', 'fdsfd'],
        responsiveWidth: 900,
        paralax: true,
        onLeave: function(origin, destination, direction) {
            var loadedSection = this;
            // if(origin.index == 0 && direction =='down'){
            // 	$(".header-wrapper").addClass('heading-nav');
            // }else if(origin.index == 2 && direction == "up"){
            // 	$(".header-wrapper").addClass('heading-nav');
            // }else{
            // 	$(".header-wrapper").removeClass('heading-nav');
            // }

            switch (destination.index) {
                case 0:
                    $(".header-wrapper").removeClass('heading-nav');
                    break;
                default:
                    $(".header-wrapper").addClass('heading-nav');
            }

        },
        afterResponsive: function(isResponsive) {}
    });
    // 			$(function() {
    //     var header = $(".header-wrapper");
    //     $(window).scroll(function() {
    //         var scroll = $(window).scrollTop();

    //         if (scroll >= 200) {
    //             header.removeClass('header-wrapper').addClass("header-alt");
    //         } else {
    //             header.removeClass("header-wrapper").addClass('header');
    //         }
    //     });
    // });

    $(document).ready(function() {
        $itemsSelector.attr('data-aos', 'fade-up');
        AOS.init({
            duration: 1200
        });
    })
    </script>

</body>

</html>
