@extends('layouts.frontend')
@section('title')
Contact Us | CT Plumbing
@endsection
@section('content')
      <header class="contact-header hidden-xs">
         <div class="container">
            <div class="row">
               <div class="home-wrapper">
                  <div class="col-md-12">
                     <div class="home-content">
                        <h1>Get In Touch</h1>
                        <span>We are Happy to help</span>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <div class="page-wrapper">
        
      <!-- Sections  contact-wrapper-->
      <section id="contact" class="contact sections">
         <div class="container">
            <div class="row">
               <div class="main_contact whitebackground">
                  
                  <div class="contact_content">
                     <div class="col-md-6">
                        <div class="main-heading">
                           <h2>Send Your Massage</h2>
                           <p>Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum. Duis mollis, est non commodo luctus, nisi erat porttitor ligula.</p>
                        </div>
                        <div class="single_left_contact">
                        <form action="{{ route('contact') }}" id="formid" method="post" enctype="multipart/form-data">
                           @csrf
                           
                           <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                 <input type="text" class="form-control" name="name" placeholder="Name" >
                                 <small class="text-danger">{{ $errors->first('name') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                                 <input type="email" class="form-control" name="email" placeholder="Email">
                                 <small class="text-danger">{{ $errors->first('email') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('phone') ? ' has-error' : '' }}">
                                 <input type="text" class="form-control" name="phone" placeholder="Phone" >
                                 <small class="text-danger">{{ $errors->first('phone') }}</small>
                              </div>
                              <div class="form-group{{ $errors->has('message') ? ' has-error' : '' }}">
                                 <textarea class="form-control" name="message" rows="8" placeholder="Message"></textarea>
                                 <small class="text-danger">{{ $errors->first('message') }}</small>
                              </div>


                              <div class="center-content">
                                 <input type="submit" value="Submit" class="btn shop-btn">
                              </div>
                           </form>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="single_right_contact">
                           <p>Please feel free to contact us via email and telephone. You can visit our office at office hours and ask us directly without hesitation about your enquiries, we are happy to serve.</p>
                           <div class="contact_address margin-top-40">
                              <!--  <span><i class="fa fa-clock-o"></i><b>Working Hours</b>:Sun - Fri 10:00 - 5:00<span> 
                                 <span class="margin-top-20"><i class="fa fa-phone"></i><b>Phone</b>:  (+977) 1 4381281, 4383043</span> 
                                 <span><i class="fa fa-mobile"></i><b>Mobile</b>: (202) 456-1212</span>
                                 <span><i class="fa fa-map-marker"></i><b>Location</b>:Samakhusi Townplanning, Kathmandu, Nepal</span> 
                                 <span><i class="fa fa-envelope"></i><b>Location</b>:care@decadeint.com</span>  
                                 -->
                              <ul class="quick-links-contact">
                                 <li class="row">
                                    <div class="col-md-5"><i class="fa fa-clock-o"></i><b style="padding-left:5px; padding-right:13px;">Working Hours</b>:</div>
                                          <div class="col-md-7">Mon:  07:00 - 17:00<br>
                                          Tue:  07:00 - 17:00<br>
                                          Wed:  07:00 - 17:00<br>
                                          Thu:  07:00 - 17:00<br>
                                          Fri:  07:00 - 17:00<br>
                                          Sat:  08:00 - 15:00

                                          </div>
                                 </li>
                                 <li class="row">
                                    <div class="col-md-5"><i class="fa fa-phone"></i><b style="padding-left:6px; padding-right:69px;">Phone</b>:</div>
                                    <div class="col-md-7"> 020 7739 7162 </div>
                                 </li>
                                 <li class="row">
                                    <div class="col-md-5"><i class="fa fa-mobile"></i><b style="padding-left:9px; padding-right:68px;">Mobile</b>:</div>
                                    <div class="col-md-7"></div>
                                 </li>
                                 <li class="row">
                                    <div class="col-md-5"><i class="fa fa-map-marker"></i><b style="padding-left:7px; padding-right:56px">Location</b>:</div>
                                    <div class="col-md-7">51-55 Kingsland Road,Bethnal Green,London,E2 8AG</div>
                                 </li>
                                 <li class="row">
                                    <div class="col-md-5"><i class="fa fa-envelope"></i><b style="padding-right:77px">Email</b>:</div>
                                    <div class="col-md-7">info@ctplumbing.com</div>
                                 </li>
                              </ul>
                           </div>
                         
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- /.Sections  /.contact-wrapper--> 

       <!-- google-map -->
      <section class="google-map">
         <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3510.2470553541666!2d-0.0775357833971438!3d51.52936805548493!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x48761cbbed0b096f%3A0x9b947250c917633c!2sCity+Plumbing+Ltd!5e0!3m2!1sen!2snp!4v1551262664871" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
      </section>
      <!--/.google-map-->  
         <!-- section our-features -->

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