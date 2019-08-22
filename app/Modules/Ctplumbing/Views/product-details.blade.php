@extends('layouts.frontend')
@section('title')
Cart | CT Plumbing
@endsection
@section('content')
<style>
body {
  font-family: 'Raleway', sans-serif;
}
.custom-text {
  font-weight: bold;
  font-size: 1.9em;
  border: 1px solid #cfcfcf;
  padding-left: 10px;
  padding-right: 10px;
  border-radius: 5px;
  color: #999;
  background: #fff;
}
</style>
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
<div class="page-wrapper">
         <!-- shop page -->
       <div class="shop-page">
          <div class="container">
                  <!-- price-details -->
            @if($products)
            <div class="price-details">
             <div class="row">
             <div class="col-md-6">
              <!-- images thumbnail gallery -->
              
            @if($products->image)
              <div class="show" href="{{ asset('uploads/images/'.$products->image) }}">
                  <img id="show-img"  src="{{ asset('uploads/images/'.$products->image) }}"  >
              </div>
            @else
              <div class="show" href="{{ asset('uploads/images/'.$images->first()->image) }}">
                  <img id="show-img"  src="{{ asset('uploads/images/'.$images->first()->image) }}"  >
              </div>
            @endif

               
               <div class="small-img">
                  <img src="{{ asset('frontend/images/online_icon_right@2x.png')}}" class="icon-left" alt="" id="prev-img">
                  <div class="small-container">
                     <div id="small-img-roll">
                     @if($products->image)
                        <img class="show-small-img"  src="{{ asset('uploads/images/'.$products->image) }}"  >
                     @endif
                     @foreach($images as $singleimage)
                         <img  class="show-small-img" alt="" src="{{ asset('uploads/images/'.$singleimage->image) }}" >
                           @endforeach
                            </div>
                  </div>
                  <img src="{{ asset('frontend/images/online_icon_right@2x.png')}}" class="icon-right" alt="" id="next-img">
               </div>

               </div>
               <!-- /.images thumbnail gallery -->
                        <div class="details col-md-6">
                       @if($success = Session::get('success'))
                        <div align="center" class="alert alert-success" style="color: #424242;">
                         <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                         <i class="fa fa-check-circle"></i> {{$success}}
                        </div>
                        @endif
                           <h3 class="product-title">{{$products->product_name}}</h3>
                     @if($user)
                        <form action="{{ route('rating') }}" method="POST">
                              {{ csrf_field() }}
                                  <div class="rating">
                                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $products->averageRating }}" data-size="xs" >
                                         <input type="hidden" name="id" required="" value="{{ $products->id }}">
                                        <input type="hidden"  value="{{$user->id}}" name="customer_id" />

                                        <span class="review-no">422 reviews</span>
                                        <br/>

                                        <button class="btn btn-success">Submit Rating</button>
                                    </div>
                          </form>
                        @else
                          <div class="rating">
                           <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="{{ $products->averageRating }}" data-size="xs" >
                           <span class="review-no">422 reviews</span>
                            <br/>
                          <a href="{{url('/customer/login')}}" class="btn btn-success">Submit Rating</a>
                        </div>
                        @endif
                           <p class="product-description"></p>
                           <h4 class="price">Price: <span>£{!! $products->market_price!!}</span></h4>

                           <div class="action">

                           <a href="{{ route('add.to.cart', ['id'=>$products->id]) }}" type="submit" class="btn shop-btn" value="addtocart">add to cart
                           </a>
                              <td><a href="{{ route('customer.interested', ['id'=>$products->id]) }}"
                               class="btn shop-{{($products->interested == '0')?'btn':'btn'}}"
                               title="YES"><span class="fa fa-heart"  style="color:red;"></span>{{($products->interested == '0')?"yes":"no" }}
                               </a>
                               </td>

                           </div>
                        </div>
                     </div>
                  </div>
                  @endif
                  <!-- /.price-details -->
                  <!--product specification -->
                  <div class="product-specification">
                     <div class="container-fluid">
                        <div class="row product-info" style="padding-bottom:0">
                           <ul id="myTab" class="nav nav-tabs nav_tabs">
                              <li class="active"><a href="#service-one" data-toggle="tab">PRODUCT INFO</a></li>
                              <li><a href="#service-two" data-toggle="tab">DESCRIPTION</a></li>
                              <li><a href="#service-three" data-toggle="tab">REVIEWS</a></li>
                           </ul>
                           <div id="myTabContent" class="tab-content">
                              <div class="tab-pane fade in active" id="service-one">
                               <section class="container product-info">

                                    <table class="table">
                                       <tbody>
                                       @foreach($props as $p)
                                       @if($p->value)
                                          <tr>
                                                <td><strong>{{ $p->label }}</strong>
                                                </td>
                                                <td>{{ $p->value }}</td>
                                          </tr>
                                          @endif
                                          @endforeach

                                       </tbody>

                                    </table>
                                 </section>
                              </div>
                              <div class="tab-pane fade" id="service-two">
                                 <section class="container product-info">
                                 @php echo $products->product_info @endphp
                                 </section>
                              </div>
                              <div class="tab-pane fade" id="service-three">
                                  @if($user)
                                 <section class="container product-info" style="padding-bottom:0">
                                  <div class="col-lg-5 col-md-5">

                                  {!! Form::open(array('url'=>'product/details/'.$products->id, 'method'=>'post', 'class'=>'form-horizontal', 'enctype'=>'multipart/form-data', 'role'=>'form')) !!}
                                  @csrf
                                 <div id="review"></div>

                                 <input type="hidden"  value="{{$products->id}}" name="product_id" />
                                 <input type="hidden"  value="{{$user->id}}" name="customer_id" />

                                   <div class="form-group required">
                                  <h3>Write a review</h3>
                                  <label class="control-label" for="input-name">Your Name</label>
                                  <input type="text" name="name" required id="input-name" class="form-control">
                               </div>
                              <div class="form-group required">

                                  <label class="control-label" for="input-review">Your Review</label>
                                  <textarea name="review" rows="5"  required id="input-review" class="form-control"></textarea>
                                   <input class="btn shop-btn" type="submit" value="Submit">
                                </form>
                                 </section>
                                 @elseif($user==null)
                                 <section class="container product-info">
                                  <div class="col-lg-5 col-md-5">

                                 <div id="review"></div>

                                  <h3>Write a review</h3>
                                   <div class="form-group required">

                                  <label class="control-label" for="input-name">Your Name</label>
                                  <input type="text" name="name" required id="input-name" class="form-control">

                               </div>
                              <div class="form-group required">

                                  <label class="control-label" for="input-review">Your Review</label>
                                  <textarea name="review" rows="5"  required id="input-review" class="form-control"></textarea>

                               </div>
                                   <div class="form-group">
                                   <input class="btn shop-btn" type="submit" value="Submit" disabled>
                                   </div>
                                  <h3> Note:You must be login to continue</h3>
                                 </section>
                                 @endif
                              </div>
                           </div>
                           <hr>
                        </div>
                     </div>
                  </div>
                  <!--/.product specification -->
            </div>
         </div>
         <!-- /.shop-page -->
         <!-- related products -->
         <div class="newproducts-wrapper" style="padding-top:0">
            <div class="container">
               <div class="header-title text-center">
                  <h2>
                     <span class="inline-title">Related Products</span>
                  </h2>
               </div>
               <div id="slider-carousel1" class="owl-carousel">
                  <!-- item1 -->
                  @if(!empty($related_products))
                  @foreach($related_products as $related_product)
                  <div class="item">
                     <div class="product-box">
                        <div class="product-image">
                           <div class="inner">
                             @if(!empty($promotion->image))
                                  <a href="{{url('product/details/' .$related_product->id)}}"><img src="{{ asset('uploads/images/'.$related_product->image) }}" class="img-responsive"></a>
                                 @else
                                 <a href="{{url('product/details/' .$related_product->id)}}"><img src="{{ asset('uploads/images/'.$related_product->images->first()->image) }}" class="img-responsive" /></a>
                             @endif

                           </div>
                           <div class="tag new">
                              New
                           </div>
                        </div>
                        <div class="product-info">
                           <div class="product-title">
                           {{$related_product->product_name}}
                           </div>
                           <div class="product-price">
                              <div class="pull-left">
                                 <div class="actual-price">£{{$related_product->discount }}</div>

                              </div>
                              <div class="pull-right">
                                 <div class="discount-text">£{{$related_product->market_price }}</div>
                              </div>
                           </div>

                           <div class="rating">
                                 <div class="stars">
                                 <input id="input-1" name="rate" class="rating rating-loading" data-min="0" data-max="5" data-step="1" value="" data-size="xs" >

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
         <!-- /.related products -->
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

      <!-- /.page-wrapper -->
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

               <script>
Vue.component('star-rating', VueStarRating.default)

new Vue({
  el: '#app',
  methods: {
    setRating: function(rating) {
      this.rating = "You have Selected: " + rating + " stars";
    },
    showCurrentRating: function(rating) {
      this.currentRating = (rating === 0) ? this.currentSelectedRating : "Click to select " + rating + " stars"
    },
    setCurrentSelectedRating: function(rating) {
      this.currentSelectedRating = "You have Selected: " + rating + " stars";
    }
  },
  data: {
    rating: "No Rating Selected",
    currentRating: "No Rating",
    currentSelectedRating: "No Current Rating",
    boundRating: 3,
  }
});

Vue.component('star-rating', VueStarRating.default);



</script>
<script src="https://unpkg.com/vue-star-rating/dist/star-rating.min.js"></script>

<script src="https://unpkg.com/vue@2.2.6/dist/vue.js"></script>
<script src="https://unpkg.com/vue-star-rating@1.6.0/dist/star-rating.min.js"></script>

      @endsection
