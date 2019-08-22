@extends('layouts.dashboard')
@section('content')
<div class="container">
<h2>Choose Category</h2>
<div class="row">
@foreach($categories as $category)
  <!--Card -->
  <div class="col-sm-2">
    <div class="card">
      <div class="card-body"> 
      <a href="{{ route('product.create', ['cid'=>$category->id])}}"  >
      <img src="http://cityplumbltd.co.uk/uploads/images/UM0052SCW_1_w635_h476_1559033182.jpg" class="img-fluid">
      <h5  class="card-title text-center" style="margin-top:20px; font-size:12px;">{{ $category->title }} </h5></a>
      </div>
    </div>
  </div>
  <!--/.Card -->
  @endforeach
  </div>
</div>
</div>
@endsection