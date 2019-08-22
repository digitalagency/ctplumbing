@extends('layouts.dashboard')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2>user edit</h2>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-12 text-right">
            <ul class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="{{url('admin')}}"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="{{url('admin/user/')}}">Users</a></li>
                <li class="breadcrumb-item active">Change password</li>
            </ul>
        </div>
    </div>
</div>

@if($form=='edit')

    {{ Form::model($user, ['route' => ['user.modify', $user->id], 'method' => 'PATCH', 'files' => true]) }}
    {{ Form::hidden('id',$user->id) }}
    @php
$img ='';
    if($user->feature_image){
        $img = url('uploads/feature_images/'.$user->feature_image);
    }
@endphp
@endif
@php
$role ='';

$feature_yes ='';
@endphp
<div class="row clearfix">
    <div class="col-lg-9 col-md-12">
        <div class="card">
            <div class="body">
                    <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('Login Email', 'Login Email') !!}
                            {!! Form::text('email', null, ['class' => 'form-control','placeholder'=>'Enter Login Email','readonly'=>'true']) !!}
                            <small class="text-danger">{{ $errors->first('email') }}</small>
                        </div><br/>
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                {!! Form::label('Full Name', 'Full Name') !!}
                {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Enter Full Name','id'=>'fullname']) !!}
                <small class="text-danger">{{ $errors->first('fullname') }}</small>
            </div><br/>

              <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                  {!! Form::label('Password', 'Password') !!}

                  {!! Form::text('password','', ['class' => 'form-control','placeholder'=>'Enter Password']) !!}
                  <small class="text-danger">{{ $errors->first('password') }}</small><br>
                  {!! Form::label('Password', 'enter the password if you want to change') !!}
              </div><br/>
              <div class="form-group{{ $errors->has('Biography') ? ' has-error' : '' }}">
                    {!! Form::label('Biography', 'Biography') !!}
                    {!! Form::textarea('Biography', null, ['class' => 'form-control summernote']) !!}
                    <small class="text-danger">{{ $errors->first('Biography') }}</small>
                </div>
              <br>

                 <br>
              <div class="form-group">
                  {{-- {!! Form::reset("Reset", ['class' => 'btn btn-primary']) !!} --}}
                  {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
              </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-12">
            <div class="card">
                <div class="body">
                    <div class="form-group{{ $errors->has('feature_image') ? ' has-error' : '' }}">
                        {!! Form::label('feature_image', 'Profile Image') !!}
                        <input type="file" id="dropify-event" name="feature_image"
                        data-default-file="{{$img}}" />
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
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">


{{-- <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/animate-css/animate.min.css') }}"> --}}
<link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}">
<!-- <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}"> -->
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
<link rel="stylesheet" href="{{asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/nouislider/nouislider.min.css') }}" />




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
<!-- <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script> -->
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

@if (!isset($event))

$('#fullname').on('keyup change', function () {

var title = $(this).val().trim();

title = title.toLowerCase();

var title_new = title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').replace(/\//g, "-").replace(/\^-/g, "-");

title_new = title_new.substring(0, 50);

$('#slug').val(title_new);

});
@endif

</script>
@endprepend
