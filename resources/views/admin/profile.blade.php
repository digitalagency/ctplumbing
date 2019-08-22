@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Update Profile</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Profile</li>
                            <li class="breadcrumb-item active">Profile Update</li>
                        </ul>
                    </div>
                </div>
            </div>
            @php
$img = "";
$feature_yes = '';
@endphp
@php
if($admins->image){
    $img = asset($admins->image);
    $feature_yes = 'yes';
}
@endphp 
     <form class="form-horizontal" files="true" role="form" enctype="multipart/form-data" action="{{url('/admin/profile'.'/edit')}}"  method="post"  >
          @csrf
            <div class="row clearfix">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="body">
                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                              <label>
                               Name
                            </label>
                            <input type="text" class="form-control" value="{{ $admins->name }}" name="name" value="{{ old('name') }}"/>
                                <small class="text-danger">{{ $errors->first('name') }}</small>
                            </div>

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <label>
                               Email Address
                            </label>
                            <input type="email" class="form-control" value="{{ $admins->email }}" name="email" value="{{ old('email') }}"/>
                                <small class="text-danger">{{ $errors->first('email') }}</small>
                            </div>

                            <div class="body">
                           <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                           {!! Form::label('image', 'Profile Picture') !!}
                           {!! Form::file('image', [ 'id'=>'dropify-event', 'data-default-file' => asset('uploads/images/' . $admins->image) ]) !!}
                          <input id="feature_yes" type="hidden" name="feature_yes" value="{{ $img }}">
                            </div>
                           </div>
                        <div class="form-group{{ $errors->has('old_password') ? ' has-error' : '' }}">
                              <label>
                               Old Password
                            </label>
                            <input type="password" class="form-control" placeholder="Old Password" name="old_password" value="{{ old('old_password') }}"/>
                                <small class="text-danger">{{ $errors->first('old_password') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('new_password') ? ' has-error' : '' }}">
                              <label>
                               New Password
                            </label>
                            <input type="password" class="form-control" placeholder="New Password" name="new_password" value="{{ old('new_password') }}"/>
                                <small class="text-danger">{{ $errors->first('new_password') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('re_password') ? ' has-error' : '' }}">
                              <label>
                               Re Password
                            </label>
                            <input type="password" class="form-control" placeholder="Re Password" name="re_password" value="{{ old('re_password') }}"/>
                                <small class="text-danger">{{ $errors->first('re_password') }}</small>
                            </div>
                          <br>
                             <br>
                              <div class="form-group">
                              <button type="submit" value="submit" class="btn btn-primary">Submit</button>
                              </div>
                        </div>
                    </div>
                </div>

              </div>
        {!! Form::close() !!}
@endsection


@prepend('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">

    <style>
    .cardCat .category {
      padding-bottom: 20px;
      height: 204px;
      overflow-x: auto;
      padding-top: 20px;
    }
    .fancy-checkbox input[type="checkbox"]+span {
      line-height: 16px;
    }
    .cardCat .fancy-checkbox input[type="checkbox"]+span:before {
      height: 18px;
      line-height: 16px;
      width: 18px;
    }
    .cardCat .fancy-checkbox input[type="checkbox"]:checked+span:before {
      line-height: 16px;
    }


    </style>
@endprepend

@prepend('scripts')
    <script src="{{ asset('assets/vendor/summernote/dist/summernote.js') }}"></script>
    <script src="{{ asset('assets/vendor/dropify/js/dropify.min.js') }}"></script>

    <script>

    jQuery(document).ready(function() {

        $('.summernote').summernote({
            height: 350, // set editor height
            minHeight: null, // set minimum height of editor
            maxHeight: null, // set maximum height of editor
            focus: false, // set focus to editable area after initializing summernote
            popover: { image: [], link: [], air: [] }
        });
});


$(function() {
    $('.dropify').dropify();

    var drEvent = $('#dropify-event').dropify();
    drEvent.on('dropify.beforeClear', function(event, element) {
        return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
    });

    drEvent.on('dropify.afterClear', function(event, element) {
        alert('File deleted');
        $('#feature_yes').val('no');
    });

});

    </script>
@endprepend


