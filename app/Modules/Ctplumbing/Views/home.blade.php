@extends('layouts.frontend')
@section('content')
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
      <!-- /.navigation -->
      <div class="page-wrapper">
         <!-- banner -->
         <div class="banner-wrapper">
            <div class="owl-nome owl-carousel owl-theme">
              @if(!empty($sliders))
              @foreach($sliders as $slider)
               <div class="item">
                  <div class="overlay">
                  </div>
                  <img src="{{asset('uploads/images/'.$slider->image) }}" class="img-fluid" alt="banner-pic">
                  <div class="slide-caption">
                     <h2 class="slide-caption-title">Plumbing</h2>
                     <p class="slide-caption-desc">Equipment</p>
                     <a href="category/basin-taps" class="btn shop-btn">Shop Now</a>
                  </div>
               </div>
               @endforeach
               @endif

            </div>
         </div>
         <!-- ./banner -->
         <!-- promotion wrapper -->
         <div class="promotion-wrapper">
            <div class="container">
              @if(!empty($promotions))
              @foreach($promotions as $promotion)
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <!-- promotion box -->
                  <div class="promotion-box">
                     <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                         @if(!empty($product->image))
                              <a href="{{url('product/details/' .$promotion->id)}}"><img src="{{ asset('uploads/images/'.$product->image) }}" class="img-responsive"></a>
                             @else
                             <a href="{{url('product/details/' .$promotion->id)}}"><img src="{{ asset('uploads/images/'.$promotion->images->first()->image) }}" class="img-responsive" /></a>
                         @endif
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                           <div class="product-promotion text-center">
                              <h2>{{$promotion->product_name }}</h2>
                              <div class="discount-btn">
                                 <span class="pull-left">
                                  @php
                                  $discount_percents = $promotion->discount_percent;
                                  $discount = explode('.',$discount_percents);
                                  if(isset($discount[0]))
                                  echo $discount[0];
                                  @endphp
                                 %</span>
                                 <span class="pull-right">discount</span>
                              </div>
                              <a class="btn" href="{{url('product/details/' .$promotion->id)}}">Shop Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.promotion box -->
               </div>
               @endforeach
               @endif

            </div>
         </div>



         <!--/. promotion wrapper -->
         <!-- latest products -->

            <div class="special-offer">
            <div class="container">
               <div class="header-title text-center">
                  <h2>
                     <span class="inline-title">LATEST PRODUCT </span>
                  </h2>
               </div>

               <!-- product-wrapper-shop -->

               <div class="row">
                  <div class="product-wrapper-shop">
                     @if(!empty($products))
                     @foreach($products as $product)

                     <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="product-box">
                           <div class="product-image">
                              <div class="inner">

                              @if($product->image)
                              <a href="{{url('product/details/' .$product->id)}}"><img src="{{ asset('uploads/images/'.$product->image) }}" class="img-responsive"></a>
                             @else
                                <a href="{{url('product/details/' .$product->id)}}"><img src="{{ asset('uploads/images/'.$product->images->first()->image) }}" class="img-responsive"></a>
                              @endif
                              </div>
                           </div>
                           <div class="product-info">
                              <div class="product-title">
                                {{$product->product_name }}
                              </div>
                              <div class="product-price">

                                 <div class="pull-left">
                                    <div class="actual-price">£{{$product->discount}}</div>
                                 </div>
                                 <div class="pull-right">
                                    <div class="discount-text">£{{$product->market_price}}</div>
                                 </div>
                              </div>

                              <div class="rating">
                                 <div class="stars">
                                 <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $product->averageRating }}" data-size="xs" >

                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     @endforeach
                     @endif
                  </div>
               </div>
            </div>
         </div>


         <!-- /.latest product -->
         <!-- top product slider -->
         <div class="newproducts-wrapper">
            <div class="container">
               <div class="header-title text-center">
                  <h2>
                     <span class="inline-title">Top Categories</span>
                  </h2>
               </div>
               <div id="slider-carousel1" class="owl-carousel">
                  <!-- item1 -->

                     @if(!empty($topcategpries))
                     @foreach($topcategpries as $topcategory)
                  <div class="item">
                     <div class="product-box">
                        <div class="product-image">
                           <div class="inner">
                           @if(!empty($product->image))
                              <a href="{{url('product/details/' .$product->id)}}"><img src="{{ asset('uploads/images/'.$product->image) }}" class="img-responsive"></a>
                             @else
                             <a href="{{url('product/details/' .$topcategory->id)}}"><img src="{{ asset('uploads/images/'.$topcategory->image) }}" class="img-responsive"></a>
                           @endif

                           </div>
                           <div class="tag new">
                              New
                           </div>
                        </div>
                        <div class="product-info">
                           <div class="product-title">
                           {{$topcategory->product_name }}
                           </div>
                           <div class="product-price">
                              <div class="pull-left">
                                 <div class="actual-price"> £ {{$topcategory->discount}}</div>
                              </div>
                              <div class="pull-right">

                                 <div class="discount-text">£{{$topcategory->market_price}}</div>
                              </div>
                           </div>



                           <div class="rating">
                                 <div class="stars">
                                 <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $product->averageRating }}" data-size="xs" >

                                 </div>
                              </div>


                        </div>
                     </div>
                  </div>

                    @endforeach
                    @endif


               </div>
               <!-- /.owl-carousel -->
            </div>
         </div>
         <!-- /.top product slider -->
         <!-- section testimonial-wrapper -->
         <section class="testimonial-wrapper">
            <div class="container">
               <div class="row">
                  <div class="col-sm-6 text-center">
                     <div class="deals-image-wrapper">
                        <img src="frontend/images/deals-week-pic.jpg"  class="img-responsive" alt="deals-week" >
                        <!-- Image overlay text -->
                        <div class="overlay">
                           <h1 class="headline">
                              Deal of the week
                           </h1>
                           <h2 class="description">
                              <span>10% discount</span> offer
                           </h2>
                           <a class="btn btn-default shop-btn" href="category/basin-taps">Shop Now</a>
                        </div>
                        <!-- Image overlay text end-->
                     </div>
                  </div>
                  <div class="col-sm-6 text-center">
                     <div class="header-title text-center">
                        <h2><span class="inline-title">What Our Clients Say</span></h2>
                     </div>
                     <div class="quote" data-aos="flip-up" data-aos-duration="1000">
                        <div class="quoteWrap owl-carousel owl-theme">
                           @if(!empty($testomonials))
                            @foreach($testomonials as $testomonial)
                           <div class="quoteItem">
                              <p>

                              {{strip_tags($testomonial->description) }}
                              </p>
                              <div class="quoteProfile">
                                 <img src="{{ asset('uploads/images/'.$testomonial->feature_image) }}" alt="test-pic" class="img-responsive">
                              </div>
                              <div class="testimonial-name">
                              {{$testomonial->person_name }}
                            </div>
                              <!-- end quoteProfile -->
                           </div>
                             @endforeach
                             @endif
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- section /.testimonial-wrapper -->
         <!-- section our-features -->
         <section class="features-wrapper">
            <div class="container mt-0">
               <div class="row">
                  <div class="col-sm-3 text-center">
                     <img src="frontend/images/free-delivery.png"  class=""  >
                     <h3> Free Delivery</h3>
                     <p>Free delivery on all orders in excess of £100</p>
                  </div>
                  <div class="col-sm-3 text-center">
                     <img src="frontend/images/free-return.png"  class=""  >
                     <h3> Free Returns</h3>
                     <p>Return for free within 30 days</p>
                  </div>
                  <div class="col-sm-3 text-center">
                     <img src="frontend/images/secured.png"  class=""  >
                     <h3> Secured Shopping</h3>
                     <p>We use the best security features to protect your information.</p>
                  </div>
                  <div class="col-sm-3 text-center">
                     <img src="frontend/images/unlimited.png"  class=""  >
                     <h3> Unlimited Product</h3>
                     <p>While you are here, why not browse our selection of product. Take time to visit our site thoroughly.</p>
                  </div>
               </div>
            </div>
         </section>
         <!-- section /.our-features -->
         <!-- sections  partner-brand-section-->
         <section class="partner-brand">
            <div class="container">
               <div class="row">
                  <div class="col-xs-12">
                     <div class="partner owl-carousel">
                         @if(!empty($partners))
                           @foreach($partners as $partner)
                        <div class="item">
                           <a href="#"><img src="{{ asset('uploads/images/'.$partner->image) }}" alt="brand" />
                           </a>
                        </div>
                        @endforeach
                        @endif
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- /.partner-brand-section-->
      </div>
      <!-- page-wrapper -->

      <section id="footer-menu" class="footer-menu">
         <div class="container">
         <div class="footer-menu-wrapper">
            <div class="row">
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <div class="menu-item">
                     @if(!empty($aboutus))
                     @foreach($aboutus as $about)
                     <h5>{{$about->title }} </h5>
                      <?php echo $about->content ?>
                     @endforeach
                     @endif
                  </div>
               </div>
@endsection
