<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <title>Home | CT Plumbing </title>
      <meta name="description" content="CT Plumbing, Plumbing">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!--Google fonts links-->
      <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Oswald" />
      <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">
      <!--Font awesome-->
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
      <!--Core css -->
      <link rel="stylesheet" href="{{ asset('frontend/css/bootstrap.min.css') }}">
      <!-- Owl Stylesheets -->
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}">
      <link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">

      <!--<link rel="stylesheet" href="{{ asset('frontend/css/style.css') }}">-->

      <link rel="stylesheet" href="{{ asset('frontend/css/main.css') }}">
      <script src="https://unpkg.com/vue"></script>

      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />

      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>

      <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

      <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700" rel="stylesheet">

      <link href="{{ asset('frontend/css/rating.css') }}" rel="stylesheet">
   </head>
   <body>
   <?php

    $error = 0;
    $user = null;
    if(Session::has('error_code')):
        $error = 1;
    endif;
    if(Session::has('user')):
        $user = Session::get('user');
    endif;
    ?>
      <!--topbar -->
      <div class="top-bar">
         <div class="container">
            <div class="row">
               <div class="social-wrapper">
                  <div class="col-md-6">
                     <div class="social-contact-top hidden-xs">
                        <a href="tel:020 7739 7162"><i class="fa fa-phone"></i>020 7739 7162</a>
                        <a href="{{ route('page',['name'=>'delivery-and-returns'])}}"><i class="fa fa-envelope"></i>Delivery Info  </a>
                        <a href="#"><i class="fa fa-envelope"></i>Your Orders</a>
                     </div>
                  </div>
                  <div class="col-md-4">
                     <div class="social-icon-top pull-right">
                        @if($user)
                        <li class="login"><a href="{{ route('customer/logout') }}"><i class="fa fa-lock" aria-hidden="true"></i> Logout</a></li>
                         @else
                        <li class="login"><a href="{{ route('customer/login') }}"><i class="fa fa-lock" aria-hidden="true"></i> Login</a></li>
                        <li class="login"><a href="{{ route('customer/register') }}"><i class="fa fa-user" aria-hidden="true"></i>Register</a></li>
                        @endif
                     </div>
                  </div>

                  <div class="col-md-2">
                    <div class="callus-wrapper hidden-xs">
                       <div class="shop-cart hidden-xs">
                          <ul class="navbar-right">
                             <!-- dropdown cart -->
                             <li class="dropdown">
                                <a href="{{ url('cart') }}"  >

                                <span class="icart"><i class="fa fa-shopping-cart"></i></span>
                                <span class="badge">£. {{ Cart::total()}} {{ Cart::content()->count()}} Items</span>
                                </a>
                             </li>
                             <!-- /.dropdown cart -->
                          </ul>
                          <!--end navbar-right -->
                       </div>
                    </div>
                  </div>

               </div>
            </div>
         </div>
         <!-- /.container -->
      </div>
      <!-- /.topbar -->
      <!-- header wrapper -->
      <div class="header-wrapper">
         <header id="header">
            <!-- main header -->
            <div class="main-header">
               <div class="container">
                  <div class="row">
                     <div class="col-xs-12 col-sm-3">
                        <div class="navbar-header">
                           <a class="navbar-brand" href="{{url('/')}}">
                           <img src="{{ asset('frontend/images/logo.png')}}" alt="Logo" class="img-responsive" /></a>
                           <!--/ logo -->
                           <div class="shop-cart visible-xs pull-right">

                              <ul class="navbar-right">
                                 <!-- dropdown cart -->
                                 <li class="dropdown">
                                    <a href="{{ url('cart') }}"  >

                                    <span class="icart"><i class="fa fa-shopping-cart"></i></span>
                                    <span class="badge">{{ Cart::total()}} {{ Cart::content()->count()}} Items</span>
                                    </a>
                                 </li>
                                 <!-- /.dropdown cart -->
                              </ul>
                              <!--end navbar-right -->
                              <!--end navbar-right -->
                           </div>
                        </div>
                     </div>

                     <div class="col-xs-12 col-sm-6">
                       <div class="search-bar">
                       <form action="{{ route('search') }}" method="GET">
                           <div class="input-group ">
                           <input type="text" class="form-control" name="txt" placeholder="Search Products" value="">
                              <span class="input-group-btn">
                              <button class="btn btn-default" type="submit">
                              <span class="glyphicon glyphicon-search" aria-hidden="true">
                              </span>
                              </button>
                              </span>
                           </div>
                           </form>
                           <!-- /input-group -->
                        </div>

                     </div>

                     <div class="col-xs-12 col-sm-2">
                        <?php /*<div class="callus-wrapper hidden-xs">
                           <div class="shop-cart hidden-xs">
                              <ul class="navbar-right">
                                 <!-- dropdown cart -->
                                 <li class="dropdown">
                                    <a href="{{ url('cart') }}"  >

                                    <i class="fa fa-shopping-cart"></i><span class="badge">£. {{ Cart::total()}} {{ Cart::content()->count()}} Items</span>
                                    </a>
                                 </li>
                                 <!-- /.dropdown cart -->
                              </ul>
                              <!--end navbar-right -->
                           </div>
                        </div> */?>
                     </div>
                  </div>
               </div>
               <!--  /.main-header -->
            </div>
         </header>
      </div>
      <!-- /.header wrapper -->
      <!-- navigation -->
      <div class="navigation">
         <div class="container">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navigation" aria-expanded="false">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <!-- nav -->
            <div class="navbar navbar-inverse">
               <div class="collapse navbar-collapse" id="navigation">

                  <?php
                  $menu_items = \App\MenuItems::orderBy('sort')->get();

                  $nav = \App\MenuItems::getMenu($menu_items);
                  echo $nav;
                 // dd($nav);
                  ?>

                </div>
            </div>
         </div>
      </div>

      @if(!empty($contactus))
      @if(Session::has('contactmessage'))
      <div class="alert {{ Session::get('alert-class', 'alert-info') }}" style="text-align:center;margin-top:40px">{!!  Session::get('contactmessage') !!}</div>
      @endif
      @endif

      <!-- /.navigation -->
      @yield('content')
      <!-- footer-section -->

               <div class="col-md-3 col-sm-6 col-xs-12">
                  <div class="menu-item">
                     <h5>Quick Links</h5>
                     <ul>
                        <li><a href="{{url('/')}}">› Home</a></li>
                        <li><a href="{{ route('page', ['about-us'])}}">› About Us</a></li>
                        <li><a href="{{ route('page',['name'=>'delivery-and-returns'])}}">› Delivery and Returns</a></li>
                        <li><a href="{{ route('page',['name'=>'privacy-policy'])}}">› Privacy Policy </a> </li>
                        <li><a href="{{ route('page', ['terms-and-conditions'])}}">› Terms & Conditions </a> </li>
                        <li><a href="{{ route('customer/login') }}">› Login</a> </li>
                        <li><a href="{{ url('contact') }}">› Contact Us</a> </li>

                     </ul>
                  </div>
               </div>
               <div class="col-md-5 col-sm-6 col-xs-12">
                  <div class="menu-item">
                     <h5>Newsletter</h5>
                     <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter your email address">
                        <input type="submit" class="form-control" value="Subscribe">
                     </div>
                     <h5>Connect With Us</h5>
                     <ul class="list-inline social-icons">
                        <li><img src="{{ asset('frontend/images/fb-icon.png')}}"></li>
                        <li><img src="{{ asset('frontend/images/twtr-icon.png')}}"></li>
                        <li><img src="{{ asset('frontend/images/linkden-icon.png')}}"></li>
                        <li><img src="{{ asset('frontend/images/pinteret-icon.png')}}"></li>
                     </ul>
                     <h5>Payment Method</h5>
                     <img src="{{ asset('frontend/images/payment-method.png')}}">
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!--footer bottom-->
      <footer class="footer-bottom">
         <div class="container">
            <div class="row">
               <div class="footer-wrapper">
                  <div class="col-md-6 col-sm-12 col-xs-12">
                     <div class="footer-brand">


                  <p class="pull-left">Cityplumbltd &copy;
                     <script type="text/javascript">
                    document.write(new Date().getFullYear());
                   </script>
                  </p>

                  </div>
                  </div>
                  <div class="col-md-6 col-sm-12 col-xs-12">
                     <p class="pull-right">Site Powered By:IGC Techonology</p>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <!--/.footer-bottom-->
      <div class="scrollup">
         <a href="#"><i class="fa fa-chevron-up"></i></a>
      </div>
      <!-- Script -->
      <script src="{{ asset('frontend/js/jquery.js')}}"></script>
      <script src="{{ asset('frontend/js/bootstrap.min.js')}}"></script>
      <script src="{{ asset('frontend/js/owl.carousel.min.js')}}"></script>
      <script src="{{ asset('frontend/js/main.js')}}"></script>
      <script src="{{ asset('frontend/loginform/script.js')}}"></script>


      <script src="{{ asset('frontend/js/zoom-image.js')}}"></script>
      <script src="{{ asset('frontend/js/main-zoom.js')}}"></script>

      <script type="text/javascript">

              $(document).ready(function(){
              $('.alert').delay(5000).slideUp(300);

            });
          </script>

<script type="text/javascript">

$("#input-id").rating();

</script>

   </body>
</html>
