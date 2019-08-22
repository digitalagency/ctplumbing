@extends('layouts.frontend')
@section('content')
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
                  <img src="{{ asset($slider->image) }}" class="img-fluid" alt="banner-pic">
                  <div class="slide-caption">
                     <h2 class="slide-caption-title">Plumbing</h2>
                     <p class="slide-caption-desc">Equipment</p>
                     <a href="#" class="btn shop-btn">Shop Now</a>
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
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <!-- promotion box -->
                  <div class="promotion-box">
                     <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                           <img src="frontend/images/top-product1.jpg" alt="product-promotion" class="img-responsive" />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                           <div class="product-promotion text-center">
                              <h2>Bathroom taps</h2>
                              <div class="discount-btn">
                                 <span class="pull-left">10%</span>
                                 <span class="pull-right">discount</span>
                              </div>
                              <a class="btn" href="#">Shop Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.promotion box -->
               </div>
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <!-- promotion box -->
                  <div class="promotion-box">
                     <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                           <img src="frontend/images/top-product2.jpg" alt="product-promotion" class="img-responsive" />
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                           <div class="product-promotion text-center">
                              <h2>Water Heater</h2>
                              <div class="discount-btn">
                                 <span class="pull-left">10%</span>
                                 <span class="pull-right">discount</span>
                              </div>
                              <a class="btn" href="#">Shop Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.promotion box -->
               </div>
               <div class="col-md-4 col-sm-6 col-xs-12">
                  <!-- promotion box -->
                  <div class="promotion-box">
                     <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                           <img src="frontend/images/top-product3.jpg" alt="product-promotion" class="img-responsive" />
                        </div>
                        <div class="col-md-6 col-sm-12 col-xs-6">
                           <div class="product-promotion text-center">
                              <h2>basin monobloc</h2>
                              <div class="discount-btn">
                                 <span class="pull-left">10%</span>
                                 <span class="pull-right">discount</span>
                              </div>
                              <a class="btn" href="#">Shop Now</a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.promotion box -->  
               </div>
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
                                 <a href="{{url('product/details/' .$product->id)}}"><img src="{{ asset('uploads/images/'.$product->image) }}" class="img-responsive"></a>
                              </div>
                           </div>
                           <div class="product-info">
                              <div class="product-title">
                                {{$product->product_name }}
                              </div>
                              <div class="product-price">
                                 <div class="pull-left">
                                    <div class="actual-price">${{$product->market_price}}</div>
                                 </div>
                                 <div class="pull-right">
                                    <div class="discount-text">${{$product->discount}}</div>
                                 </div>
                              </div>
                              <div class="rating">
                                 <div class="stars">
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star checked"></span>
                                    <span class="fa fa-star"></span>
                                    <span class="fa fa-star"></span>
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
                           <a href="{{url('product/details/' .$topcategory->id)}}"><img src="{{ asset('uploads/images/'.$product->image) }}" class="img-responsive"></a>
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
                                 <div class="actual-price">${{$topcategory->market_price}}</div>
                              </div>
                              <div class="pull-right">
                                 <div class="discount-text">${{$topcategory->discount}}</div>
                              </div>
                           </div>
                           <div class="rating">
                              <div class="stars">
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star checked"></span>
                                 <span class="fa fa-star"></span>
                                 <span class="fa fa-star"></span>
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
                           <a class="btn btn-default shop-btn" href="">Shop Now</a> 
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
                           <div class="quoteItem">
                              <p>You never know what is going to happen until you try. But let me tell you that taking a risk with these guys
                                 was totally worth it. Now we are a regular client, and this was probably the best decision we ever made!
                              </p>
                              <div class="quoteProfile">
                                 <img src="frontend/images/test-pic.jpg" alt="test-pic" class="img-responsive">
                              </div>
                              <!-- end quoteProfile -->
                           </div>
                           <div class="quoteItem">
                              <p>You never know what is going to happen until you try. But let me tell you that taking a risk with these guys
                                 was totally worth it. Now we are a regular client, and this was probably the best decision we ever made!
                              </p>
                              <div class="quoteProfile">
                                 <img src="frontend/images/test-pic.jpg" alt="test-pic" class="img-responsive">
                              </div>
                              <!-- end quoteProfile -->
                           </div>
                           <div class="quoteItem">
                              <p>You never know what is going to happen until you try. But let me tell you that taking a risk with these guys
                                 was totally worth it. Now we are a regular client, and this was probably the best decision we ever made!
                              </p>
                              <div class="quoteProfile">
                                 <img src="frontend/images/test-pic.jpg" alt="test-pic" class="img-responsive">
                              </div>
                              <!-- end quoteProfile -->
                           </div>
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
                        <div class="item">
                           <a href="#"><img src="frontend/images/partner1.png" alt="brand" />
                           </a>                     
                        </div>
                        <div class="item">
                           <a href="#"><img src="frontend/images/partner2.png" alt="brand" />
                           </a>
                        </div>
                        <div class="item">
                           <a href="#"><img src="frontend/images/partner3.png" alt="brand" />
                           </a>
                        </div>
                        <div class="item">
                           <a href="#"><img src="frontend/images/partner4.png" alt="brand" />
                           </a>
                        </div>
                        <div class="item">
                           <a href="#"><img src="frontend/images/partner5.png" alt="brand" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- /.partner-brand-section-->
      </div>
      <!-- page-wrapper -->
     
      


@endsection