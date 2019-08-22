
@extends('layouts.frontend')
@section('title')
Login | CT Plumbing
@endsection
@section('content')
<div class="page-wrapper">
        
      <!-- Login -->
      <div class="container">
      <div class="card card-container">

        <img id="logo-img" class="logo-img img-responsive" src="frontend/images/logo.png" />
        
          <form class="form-signin">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <button class="btn btn-default" type="submit">login</button>
          </form><!-- /form -->
          <div class="signin-help">
                    <p>forgot your password? <a href="{{url('/rst-psw')}}">click here</a></p>
                    <p>new user? <a href="{{url('/register')}}">create new account</a></p>
          </div>
      </div>
      </div> <!--/ Login -->
       

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
                     <p> {{$about->content}}
                     </p>
                     @endforeach
                     @endif
                  </div>
               </div>
@endsection