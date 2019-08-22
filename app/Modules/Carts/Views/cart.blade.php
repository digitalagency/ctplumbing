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
<div class="page-wrapper">
<div class="shop-page">
<div class="container">
  <h1>Shopping Cart</h1>
  <!-- shopping-cart -->
  <div class="shopping-cart-wrap">
        <!-- product title -->
          <div class="column-labels">
                        <label class="cart-product-image">Image</label>
                        <label class="product-details">Product Name</label>
                        <label class="product-price">Price</label>
                        <label class="product-quantity">Quantity</label>

                        <label class="product-quantity">Cart</label>
                    
                        <label class="product-removal">Action</label>
                        <label class="product-line-price">Total</label>
          </div>
        <!-- product  -->
            <?php foreach(Cart::content() as $row) :?>
            <div class="product">
        
                        <div class="cart-product-image">
                           <img src="{{ asset('uploads/images/'. App\Modules\Products\Models\Products::getImageById($row->id)) }}" class="img-responsive" />
                        </div>
                        <div class="product-details">
                          <div class="product-title"><?php echo $row->name; ?></div>
                        </div>
                        <form method="get" action="{{ route('add.to.cart', ['id'=>$row->id]) }}" >
                        <div class="product-price"> <?php echo $row->price; ?></div>
                        <div class="product-quantity">
                        <input type="number" name="quantity"  min="1" value="<?php echo $row->qty; ?>">
                        </div>
                  
                        <div class="product-removal">
                        <input type="hidden" name="{{'id'}}"  value="{{$row->id}}">
                        <input type="submit"  class="cart-btn"  value="Add to Cart">

                        </div>
                        </form>

                        <div class="product-removal">

                           <a href="{{ route('cart.remove', ['id'=>$row->rowId]) }}" class="remove-product">
                        <span class="glyphicon glyphicon-remove"></span>
                        Remove</a>
                        </div>

                        <div class="product-line-price"><?php echo $row->total; ?></div>        
           </div>
           <?php endforeach;?>
            <!-- /.product  -->
            <div class="totals">
                        <div class="totals-item">
                          <label>Subtotal</label>
                          <div class="totals-value" id="cart-subtotal"> <?php echo Cart::subtotal(); ?></div>
                        </div>
                        <div class="totals-item">
                          <label>Tax</label>
                          <div class="totals-value" id="cart-tax">	<?php echo Cart::tax(); ?></div>
                        </div>
                       
                        <div class="totals-item totals-item-total">
                          <label>Total</label>
                          <div class="totals-value" id="cart-total">	<?php echo Cart::total(); ?></div>
                        </div>
                      </div>

                    

                      @if($user)

                     <form  method="POST" action="{{ route('payments') }}" enctype="multipart/form-data" class="form-horizontal">
                     {!! csrf_field() !!} 
                     <input type="hidden" name="type" value="1">
                     <input type="hidden" name="total" id="total" value="<?php echo Cart::total(); ?>">
                     <input type="submit" class="checkout" value="Checkout" />
                     </form>
                     @else
      
                     <a href="{{url('/customer/login')}}" class="checkout">Checkout</a>
                     @endif

                   
                  <div class="cleafix"></div>
                  <div class="continue-btn">
                  <a href="{{url('/')}}"><button type="button" class="btn btn-default btn-warning ">
                  <span class="glyphicon glyphicon-shopping-cart"></span> Continue Shopping
                  </button>
                </a>

              </div>
        </div>
        <!-- /.shopping-cart -->
      </div>
   </div>
      
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
