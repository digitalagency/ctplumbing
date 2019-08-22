
@extends('layouts.frontend')
@section('title')
Register | CT Plumbing
@endsection
@section('content')
     <div class="page-wrapper">
        
        <!-- register section -->   
        <div class="container">
            <div class="card card-container">

                <h2>Create an Account</h2>
                <form class="form-signin">
                     <input type="text" id="inputUser" class="form-control" placeholder="What's your username?" required autofocus>

                     <input type="password" id="inputPassword" class="form-control" placeholder="Choose a password" required>

                     <input type="password" id="inputPassword1" class="form-control" placeholder="Confirm password" required>

                     
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                    
                    <button class="btn btn-default" type="submit">Register</button>
                </form><!-- /form -->
                <div class="signin-help">
                <p>Already have an account? <a href="{{url('/login')}}">Login</a></p>             
               </div>
            </div>
        </div><!-- /register section -->
      </div>
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
