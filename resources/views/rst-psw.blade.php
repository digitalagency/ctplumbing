@extends('layouts.frontend')
@section('title')
Reset Password | CT Plumbing
@endsection
@section('content')
      <div class="page-wrapper">
        
        <!-- register section -->   
        <div class="container">
            <div class="card card-container">
                <h2>Reset Password</h2>
                <form class="form-signin">
                     
                     
                    <input type="email" id="inputEmail" class="form-control" placeholder="Email" required autofocus>
                    
                    <button class="btn btn-default" type="submit">Reset Password</button>
               
                </form><!-- /form -->
            </div>
        </div>
@endsection