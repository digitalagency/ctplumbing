@extends('layouts.frontend')
@section('title')
Checkout | CT Plumbing
@endsection
@section('content')
<div class="page-wrapper">
           <!-- Sections  faq-wrapper-->
        <div class="shop-page">
              <div class="container">
                 <h1>Check Out</h1>
                 
                  <!-- checkout wrapper -->
                  <div class="checkout-wrapper">
                         <div class="panel-group " id="accordion" >
                            <!-- panel-one -->  
                            <div class="panel panel-default">
                               <div class="panel-heading active">
                                  <h4 class="panel-title active">
                                     <a  data-toggle="collapse" data-parent="#accordion" href="#collapseOne">       
                                     Review Your Order
                                     <i class="indicator fa fa-angle-up  pull-right"></i>
                                     </a>
                                  </h4>
                               </div>
                               <!-- collapse-one -->
                               <div id="collapseOne" class="panel-collapse collapse in">
                                  <div class="panel-body">
                                            <div class="items">
                                                <div class="col-md-9">
                                                    <table class="table table-striped">
                                                        <tbody><tr>
                                                            <td colspan="2">
                                                                <a class="btn btn-warning btn-sm pull-right" href="#" title="Remove Item">X</a>
                                                                <b>
                                                                    Premium Posting</b></td>
                                                        </tr>
                                                        <tr>
                                                            <td>
                                                                <ul>
                                                                    <li>One Job Posting Credit</li>
                                                                    <li>Job Distribution*</li>
                                                                    <li>Social Media Distribution</li>
                                                                </ul>
                                                            </td>
                                                            <td>
                                                                <b>$147.00</b>
                                                            </td>
                                                        </tr>
                                                    </tbody></table>
                                                </div>
                                                <div class="col-md-3">
                                                    <div style="text-align: center;">
                                                        <h3>Order Total</h3>
                                                        <h3><span style="color:green;">$147.00</span></h3>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                               </div>
                               <!-- /.collapse-0ne -->
                            </div>
                            <!-- /.panel-One -->
                            <!-- panel-two -->
                            <div class="panel panel-default">
                               <div class="panel-heading ">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                     Contact and Billing Information
                                     <i class="indicator fa fa-angle-up  pull-right"></i></a>
                                  </h4>
                               </div>
                               <div id="collapseTwo" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <b>Help us keep your account safe and secure, please verify your billing
                                            information.</b>
                                        <br><br>
                                        <table class="table table-striped" style="font-weight: bold;">
                                            <tbody><tr>
                                                <td style="width: 175px;">
                                                    <label for="id_email">Best Email:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_email" name="email" required="required" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_first_name">First name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_first_name" name="first_name" required="required" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_last_name">Last name:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_last_name" name="last_name" required="required" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_1">Address:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_address_line_1" name="address_line_1" required="required" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_address_line_2">Unit / Suite #:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_address_line_2" name="address_line_2" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_city">City:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_city" name="city" required="required" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_state">State:</label></td>
                                                <td>
                                                    <select class="form-control" id="id_state" name="state">
                                                        <option value="AK">Alaska</option>
                                                        <option value="AL">Alabama</option>
                                                        <option value="AZ">Arizona</option>
                                                        <option value="AR">Arkansas</option>
                                                        <option value="CA">California</option>
                                                        <option value="CO">Colorado</option>
                                                        <option value="CT">Connecticut</option>
                                                        <option value="DE">Delaware</option>
                                                        <option value="FL">Florida</option>
                                                        <option value="GA">Georgia</option>
                                                        <option value="HI">Hawaii</option>
                                                        <option value="ID">Idaho</option>
                                                        <option value="IL">Illinois</option>
                                                        <option value="IN">Indiana</option>
                                                        <option value="IA">Iowa</option>
                                                        <option value="KS">Kansas</option>
                                                        <option value="KY">Kentucky</option>
                                                        <option value="LA">Louisiana</option>
                                                        <option value="ME">Maine</option>
                                                        <option value="MD">Maryland</option>
                                                        <option value="MA">Massachusetts</option>
                                                        <option value="MI">Michigan</option>
                                                        <option value="MN">Minnesota</option>
                                                        <option value="MS">Mississippi</option>
                                                        <option value="MO">Missouri</option>
                                                        <option value="MT">Montana</option>
                                                        <option value="NE">Nebraska</option>
                                                        <option value="NV">Nevada</option>
                                                        <option value="NH">New Hampshire</option>
                                                        <option value="NJ">New Jersey</option>
                                                        <option value="NM">New Mexico</option>
                                                        <option value="NY">New York</option>
                                                        <option value="NC">North Carolina</option>
                                                        <option value="ND">North Dakota</option>
                                                        <option value="OH">Ohio</option>
                                                        <option value="OK">Oklahoma</option>
                                                        <option value="OR">Oregon</option>
                                                        <option value="PA">Pennsylvania</option>
                                                        <option value="RI">Rhode Island</option>
                                                        <option value="SC">South Carolina</option>
                                                        <option value="SD">South Dakota</option>
                                                        <option value="TN">Tennessee</option>
                                                        <option value="TX">Texas</option>
                                                        <option value="UT">Utah</option>
                                                        <option value="VT">Vermont</option>
                                                        <option value="VA">Virginia</option>
                                                        <option value="WA">Washington</option>
                                                        <option value="DC">Washington D.C.</option>
                                                        <option value="WV">West Virginia</option>
                                                        <option value="WI">Wisconsin</option>
                                                        <option value="WY">Wyoming</option>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_postalcode">Postalcode:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_postalcode" name="postalcode" required="required" type="text">
                                                </td>
                                            </tr>
                                            <tr>
                                                <td style="width: 175px;">
                                                    <label for="id_phone">Phone:</label></td>
                                                <td>
                                                    <input class="form-control" id="id_phone" name="phone" type="text">
                                                </td>
                                            </tr>

                                        </tbody></table>
                                    </div>
                                </div>
                               </div>
                               <!-- /.collapse-two -->
                            </div>
                            <!-- /.panel-two -->   
                            <!-- panel-three  -->  
                            <div class="panel panel-default">
                               <div class="panel-heading">
                                  <h4 class="panel-title">
                                     <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                     Payment Information
                                     <i class="indicator fa fa-angle-up  pull-right"></i></a>
                                  </h4>
                               </div>
                               <div id="collapseThree" class="panel-collapse collapse">
                                    <div class="panel-body">
                                       <span class="payment-errors"></span>
                                       <fieldset>
                                          <legend>What method would you like to pay with today?</legend>
                                          <div class="form-group">
                                             <label class="col-sm-3 control-label" for="card-holder-name">Name on
                                             Card</label>
                                             <div class="col-sm-9">
                                                <input type="text" class="form-control" stripe-data="name" id="name-on-card" placeholder="Card Holder's Name">
                                             </div>
                                          </div>
                                          <div class="form-group">
                                             <label class="col-sm-3 control-label" for="card-number">Card
                                             Number</label>
                                             <div class="col-sm-9">
                                                <input type="text" class="form-control" stripe-data="number" id="card-number" placeholder="Debit/Credit Card Number">
                                                <br>
                                                <div><img class="pull-right" src="https://s3.amazonaws.com/hiresnetwork/imgs/cc.png" style="max-width: 250px; padding-bottom: 20px; height:auto">
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-sm-3 control-label" for="expiry-month">Expiration
                                                Date</label>
                                                <div class="col-sm-9">
                                                   <div class="row">
                                                      <div class="col-xs-3">
                                                         <select class="form-control col-sm-2" data-stripe="exp-month" id="card-exp-month" style="margin-left:5px;">
                                                            <option>Month</option>
                                                            <option value="01">Jan (01)</option>
                                                            <option value="02">Feb (02)</option>
                                                            <option value="03">Mar (03)</option>
                                                            <option value="04">Apr (04)</option>
                                                            <option value="05">May (05)</option>
                                                            <option value="06">June (06)</option>
                                                            <option value="07">July (07)</option>
                                                            <option value="08">Aug (08)</option>
                                                            <option value="09">Sep (09)</option>
                                                            <option value="10">Oct (10)</option>
                                                            <option value="11">Nov (11)</option>
                                                            <option value="12">Dec (12)</option>
                                                         </select>
                                                      </div>
                                                      <div class="col-xs-3">
                                                         <select class="form-control" data-stripe="exp-year" id="card-exp-year">
                                                            <option value="2016">2016</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2020">2020</option>
                                                            <option value="2021">2021</option>
                                                            <option value="2022">2022</option>
                                                            <option value="2023">2023</option>
                                                            <option value="2024">2024</option>
                                                         </select>
                                                      </div>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <label class="col-sm-3 control-label" for="cvv">Card CVC</label>
                                                <div class="col-sm-3">
                                                   <input type="text" class="form-control" stripe-data="cvc" id="card-cvc" placeholder="Security Code">
                                                </div>
                                             </div>
                                             <div class="form-group">
                                                <div class="col-sm-offset-3 col-sm-9">
                                                </div>
                                             </div>
                                          </div>
                                       </fieldset>
                                       <button type="submit" class="btn shop-btn " >Pay
                                       Now
                                       </button>
                                       <br>
                                       <div style="text-align: left;"><br>
                                          By submiting this order you are agreeing to our <a href="#">universal
                                          billing agreement</a>, and <a href="#">terms of service</a>.
                                          If you have any questions about our products or services please contact us
                                          before placing this order.
                                       </div>
                                    </div>
                               </div>
                               <!-- /.collapse-three -->
                            </div>
                            <!-- panel-three  --> 

                         </div>
                         <!-- /.checkout wrapper -->

            
            </div>
                
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
                     <p> {{$about->content}}
                     </p>
                     @endforeach
                     @endif
                  </div>
               </div>


               <script src="js/jquery.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/owl.carousel.min.js"></script>      
      <script src="js/main.js"></script>
<script>
      /* Set rates + misc */
var taxRate = 0.05;
var shippingRate = 15.00; 
var fadeTime = 300;


/* Assign actions */
$('.product-quantity input').change( function() {
  updateQuantity(this);
});

$('.product-removal button').click( function() {
  removeItem(this);
});


/* Recalculate cart */
function recalculateCart()
{
  var subtotal = 0;
  
  /* Sum up row totals */
  $('.product').each(function () {
    subtotal += parseFloat($(this).children('.product-line-price').text());
  });
  
  /* Calculate totals */
  var tax = subtotal * taxRate;
  var shipping = (subtotal > 0 ? shippingRate : 0);
  var total = subtotal + tax + shipping;
  
  /* Update totals display */
  $('.totals-value').fadeOut(fadeTime, function() {
    $('#cart-subtotal').html(subtotal.toFixed(2));
    $('#cart-tax').html(tax.toFixed(2));
    $('#cart-shipping').html(shipping.toFixed(2));
    $('#cart-total').html(total.toFixed(2));
    if(total == 0){
      $('.checkout').fadeOut(fadeTime);
    }else{
      $('.checkout').fadeIn(fadeTime);
    }
    $('.totals-value').fadeIn(fadeTime);
  });
}


/* Update quantity */
function updateQuantity(quantityInput)
{
  /* Calculate line price */
  var productRow = $(quantityInput).parent().parent();
  var price = parseFloat(productRow.children('.product-price').text());
  var quantity = $(quantityInput).val();
  var linePrice = price * quantity;
  
  /* Update line price display and recalc cart totals */
  productRow.children('.product-line-price').each(function () {
    $(this).fadeOut(fadeTime, function() {
      $(this).text(linePrice.toFixed(2));
      recalculateCart();
      $(this).fadeIn(fadeTime);
    });
  });  
}


/* Remove item from cart */
function removeItem(removeButton)
{
  /* Remove row from DOM and recalc cart total */
  var productRow = $(removeButton).parent().parent();
  productRow.slideUp(fadeTime, function() {
    productRow.remove();
    recalculateCart();
  });
}

</script>

 <!-- accordion locacation js -->    
      <script>
         function toggleChevron(e) {
             $(e.target)
                 .prev('.panel-heading')
                 .find("i.indicator")
                 .toggleClass('fa-angle-up fa-angle-down');
         
         }
         
         $('#accordion').on('hidden.bs.collapse', toggleChevron);
         $('#accordion').on('shown.bs.collapse', toggleChevron);
         
          $('.accordion-toggle').on('click', function() {
             $(this).toggleClass('active').siblings().removeClass('active');
           });
      </script>
      <script>
         $(document).ready(function() {
           $('.panel-collapse').on('show.bs.collapse', function () {
             $(this).siblings('.panel-heading').addClass('active');
         
           });
         
           $('.panel-collapse').on('hide.bs.collapse', function () {
             $(this).siblings('.panel-heading').removeClass('active');
           });
         
         });
         
          
      </script> 

      @endsection
