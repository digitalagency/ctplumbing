
@extends('layouts.frontend')
@section('title')
Register | CT Plumbing
@endsection
@section('content')
      <!-- register section -->   
        <div class="container">
        <div class="page-wrapper" style="margin-top:35px;">
        <?php
         echo "<h2> $data->title  </h2>  <br>";
         echo $data->content   ?>  
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
                     <?php echo $about->content ?>
                     @endforeach
                     @endif
                  </div>
               </div>
@endsection
