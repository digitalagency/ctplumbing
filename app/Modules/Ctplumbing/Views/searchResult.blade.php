@extends('layouts.frontend')
@section('title')
Shop | CT Plumbing
@endsection
@section('content')
         <!-- shop page -->
         <div class="shop-page">
            <div class="container">
               
                  <div class="col-xs-12 col-sm-12 col-md-3">

                    <div  class="product-filter-wrap">
                      <h2 class="product-title">Filter By price</h2>
                      <div class="price-slider-wrapper">
                      <p>
                      <label for="amount">Price range:</label>
                      <input type="text" id="amount" readonly style="border:0; color:#f6931f; font-weight:bold;">
                    </p>
                      <div id="slider-range"></div>
                      </div>
                    </div>   
                    <div  class="product-categories-wrap">
                        <h2 class="product-title">Product categories</h2>
                        @if(!empty($categories))
                        @foreach($categories as $cat)
                        <ul class="product-categories">
                           <!-- Collapse first lavel -->
                         <?php $category = new App\Modules\Category\Models\Category ?>
                          <li class="cat-item"><a href="{{ url($cat->link) }}">{{ $cat->label }} <span class="product-count">( {{ $category::countProduct($cat->link)}} )</span></a></li>
               
                        </ul>
                        @endforeach  
                        @endif
                    </div>
                  </div>
                  <div class="col-xs-12 col-sm-12 col-md-9">
                     <div class="header-title">
                        <h2>
                           <span class="inline-title">SHOP</span>
                        </h2>
                     </div>
                    <div class="row">
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="product-count pull-left">
                          <p>Showing all results</p>
                        </div>
                      </div>
                       <div class="col-md-6 col-sm-6 col-xs-12">  
                        <div class="product-order pull-right">
                         
                              <select name="orderby" class="orderby" onchange="location = this.value;">
                                      <option value="menu_order" selected="selected">Default sorting</option>
                                      <!-- <option value="">Sort by popularity</option>
                                      <option value="">Sort by average rating</option> -->
                                     
                                      <option value="{{ route('search', ['txt'=>$txt, 'sortby'=>'latest']) }}">Sort by newness</option>
                                      <option value="{{ route('search', ['txt'=>$txt, 'sortby'=>'lowPrice']) }}">Sort by price: low to high</option>
                                      <option value="{{ route('search', ['txt'=>$txt, 'sortby'=>'highPrice']) }}">Sort by price: high to low</option>
                                  </select>
                         
                        </div>
                      </div>  

         
                      <!-- product-wrapper-shop -->
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
                    
                    <!-- next row -->
                    <!-- pagination -->
                     <div class="page-nation">
                       <ul class="pagination pagination-large">
                           {{ $products->render()  }}
                        </ul>
                    </div>
                    <!-- /.pagination -->
                    </div>                   
               </div>
            </div>
         </div><!-- /. shop page -->                

            <!-- section our-features -->
         <section class="features-wrapper">
            <div class="container mt-0">
               <div class="row">
                  <div class="col-sm-3 text-center">
                     <img src="/frontend/images/free-delivery.png"  class=""  >     
                     <h3> Free Delivery</h3>
                     <p>Free delivery on all orders in excess of £100</p>
                  </div>
                  <div class="col-sm-3 text-center">
                     <img src="/frontend/images/free-return.png"  class=""  > 
                     <h3> Free Returns</h3>
                     <p>Return for free within 30 days</p>
                  </div>
                  <div class="col-sm-3 text-center">
                     <img src="/frontend/images/secured.png"  class=""  > 
                     <h3> Secured Shopping</h3>
                     <p>We use the best security features to protect your information.</p>
                  </div>
                  <div class="col-sm-3 text-center">
                     <img src="/frontend/images/unlimited.png"  class=""  > 
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
                           <a href="#"><img src="/frontend/images/partner1.png" alt="brand" />
                           </a>                     
                        </div>
                        <div class="item">
                           <a href="#"><img src="/frontend/images/partner2.png" alt="brand" />
                           </a>
                        </div>
                        <div class="item">
                           <a href="#"><img src="/frontend/images/partner3.png" alt="brand" />
                           </a>
                        </div>
                        <div class="item">
                           <a href="#"><img src="/frontend/images/partner4.png" alt="brand" />
                           </a>
                        </div>
                        <div class="item">
                           <a href="#"><img src="/frontend/images/partner5.png" alt="brand" />
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </section>
         <!-- /.partner-brand-section--> 
      
      </div>
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
      <!-- page-wrapper -->
       <!-- footer-section --> 
<script type="text/javascript">
function handleSelect(elm)
{
window.location = elm.value+".php";
}
</script>
@endsection