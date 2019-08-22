
@extends('layouts.frontend')
@section('title')
Login | CT Plumbing
@endsection
@section('content')
<div class="page-wrapper">
        
      <!-- Login -->
      <div class="container">
      <div class="card card-container">

        <img id="logo-img" class="logo-img img-responsive" src="/frontend/images/logo.png" />
        
           <form id="login-customer"  method="POST" action="{{ route('loginverifyHome') }}" class="form-signin">
            @csrf
            <input name="_token" type="hidden" value="{{ csrf_token() }}">

            @if($message = Session::get('message'))
                    <div align="center" class="alert alert-danger" style="color: #860808;">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle"></i> {{ $message}}
                    </div>
            @endif
         <div class="form-group @if($errors->has('email')) has-error @endif">
               <label for="email">Email</label>
               <input type="email" id="email" name="email" value="{{old('email')}}"class="form-control"  />
               </div>
               @if ($errors->has('email'))
              <msgcolor>{{ $errors->first('email') }}</msgcolor>
                @endif
       <div class="form-group @if($errors->has('password')) has-error @endif">
               <label for="password">Password</label>
               <input type="password" id="password" name="password" value="{{old('password')}}"class="form-control" />
               </div>
               @if ($errors->has('password'))
              <msgcolor>{{ $errors->first('password') }}</msgcolor>
                @endif
            <button class="btn btn-default" value="login" name="submit" type="submit">login</button>
       </form><!-- /form -->
          <div class="signin-help">
                    <p>forgot your password? <a href="{{url('/rst-psw')}}">click here</a></p>
                    <p>new user? <a href="{{route('customer/register') }}">create new account</a></p>
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
                     <?php echo $about->content ?>
                     @endforeach
                     @endif
                  </div>
               </div>
@endsection