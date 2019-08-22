
@extends('layouts.frontend')
@section('title')
Register | CT Plumbing
@endsection
@section('content')
      <!-- register section -->   
        <div class="container">
        <div class="page-wrapper">
        <div id="app">
	   	<component :is='componentName' @change="change"></component>
	     </div>
	<template id="signUpForm">
            <div class="card card-container">

                @if($message = Session::get('message'))
                    <div align="center" class="alert alert-danger" style="color: #860808;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle"></i> {{ $message}}
                    </div>
                 @endif

                 @if($success = Session::get('success'))
                    <div align="center" class="alert alert-success" style="color: #424242;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle"></i> {{$success}}
                    </div>
                 @endif
                <h2>Create an Account</h2>
                <form id="register-customer"   method="POST" action="{{ route('register') }}" class="form-signin">
                 <input type="hidden" name="flag" value='false'>
                 <input name="_token" value="{{csrf_token()}}" type="hidden">

             <div class="form-group @if($errors->has('email')) has-error @endif">
                 <label id="email">Email</label>
                 <input type="email" id="email"  v-model='email'  name="email" value="{{old('email')}}"class="form-control" placeholder="Email" autofocus />
                     @if ($errors->has('email'))
                     <msgcolor>{{ $errors->first('email') }}</msgcolor>
                      @endif
                 </div>
			    	<msgcolor v-if='msg.email'>@{{msg.email}}</msgcolor>

            <div class="form-group @if($errors->has('password')) has-error @endif">
                  <label for="password">Password</label>
                  <input type="password" id="password" v-model='password'  placeholder="password"   name="password" value="{{old('password')}}" class="form-control"
                     pattern=".{6,}" title="6 characters minimum" />  
                     @if ($errors->has('password'))
                     <msgcolor>{{ $errors->first('password') }}</msgcolor>
                      @endif  
                  </div>
				  <msgcolor v-if='msg.password'>@{{msg.password}}</msgcolor>
				  
             <div class="form-group @if($errors->has('re_password')) has-error @endif">
                 <label>Confirm Password</label>
                 <div class="form-group has-feedback {{ $errors->has('re_password') ? ' has-error' : '' }}">
                  <input type="password" v-model='confirmPassword'  placeholder="Confirm password"  class="form-control" id="re_password" name="re_password" /> 
                  @if ($errors->has('re_password'))
                  <msgcolor>{{ $errors->first('re_password') }}</msgcolor>
                  @endif       
              <msgcolor v-if='msg.confirmPassword'>@{{msg.confirmPassword}}</msgcolor>

                 </div>
           </div>
         <input class="btn btn-default" name="submit" type="submit" value="Register"/>
		  </form>
		  <!-- /form -->
                <div class="signin-help">
                <p>Already have an account? <a href="{{url('/customer/login')}}">Login</a></p>             
               </div>
            </div>
		</div><!-- /register section -->
		</template>
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
