@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2> Create Partners</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{ route('indexPartners') }}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Partners</li>
                            <li class="breadcrumb-item active">Create Partners</li>
                        </ul>
                    </div>
                </div>
            </div>
            @php
            $img = "";
            $image = '';
            @endphp
            <div class="row clearfix">
                <div class="col-lg-9 col-md-12">
                    <div class="card">
                        <div class="body">

                        <form  method="post" class="" action="{{ route('storePartners') }}" enctype='multipart/form-data' >
                       @csrf
                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              <label>
                              Title
                            </label>
                            <input type="text" class="form-control" placeholder="Title" name="title" value="{{ old('title') }}"/>
                              <small class="text-danger">{{ $errors->first('title') }}</small>
                          </div>
                           <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
                           <label>
                              Image
                            </label>
                           {!! Form::file('image', [ 'id'=>'dropify-event' ,'data-default-file' => $img]) !!}
                           <input id="image" type="hidden" name="image" value="{{ $image }}">
                           <small class="text-danger">{{ $errors->first('image') }}</small>
                            </div>
                        
                        
                              <div class="form-group">
                              <button type="submit" value="submit" class="btn btn-success mr-2">Submit</button>
                              </div>
                        </div>
                    </div>
                </div>
              </div>
              </form>    

@endsection


@prepend('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">

   
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
        $('#image').val('no');
    });

});

    </script>
@endprepend























