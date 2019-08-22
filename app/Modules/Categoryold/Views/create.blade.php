@extends('layouts.dashboard')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2>Create New Category</h2>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-12 text-right">
            <ul class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Categories</li>
                <li class="breadcrumb-item active">Create New Category</li>
            </ul>
        </div>
    </div>
</div>
@php
$img = "";
$image = '';
@endphp
<form role="form" method="POST" enctype='multipart/form-data' action="{{ route('storeCategory')}}">
@csrf
<div class="row clearfix">
    <div class="col-lg-7 col-md-9">
        <div class="card">
            <div class="body">
            <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                 {!! Form::label('title', 'Title') !!}
                 {!! Form::text('title', null, ['class' => 'form-control','placeholder'=>'Enter title']) !!}
                 <small class="text-danger">{{ $errors->first('title') }}</small>
                </div>

                <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                 {!! Form::label('slug', 'Slug') !!}
                    {!! Form::text('slug', null, ['class' => 'form-control','placeholder'=>'Enter slug or leave it blank']) !!}
                                    <small class="text-danger">{{ $errors->first('slug') }}</small>
                    </div>
                    <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                {!! Form::label('content', 'Content') !!}
                {!! Form::textarea('content', null, ['class' => 'form-control summernote','placeholder'=>'Content Here..']) !!}
                    <small class="text-danger">{{ $errors->first('content') }}</small>
                 </div>
                 <div class="form-group">
                {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-5 col-md-12">
        <div class="card">
            <div class="body">
                        <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                         <label>
                            Category Image
                            </label>
                            {!! Form::file('image', [ 'id'=>'dropify-event' ,'data-default-file' => $img]) !!}
                            <input id="image" type="hidden" name="image" value="{{ $image }}">
                            <small class="text-danger">{{ $errors->first('image') }}</small>
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
        popover: {
            image: [],
            link: [],
            air: []
        }
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
@if(!isset($event))

$('#title').on('keyup change', function() {

    var title = $(this).val().trim();

    title = title.toLowerCase();

    var title_new = title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').replace(/\//g, "-").replace(
        /\^-/g, "-");

    title_new = title_new.substring(0, 50);

    $('#slug').val(title_new);

});
@endif
</script>
@endprepend
