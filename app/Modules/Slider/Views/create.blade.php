@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Slider Create</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href=""><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Slider</li>
                            <li class="breadcrumb-item active">Slider Create</li>
                        </ul>
                    </div>
                </div>
            </div>
            @php
            $img = "";
            $image = '';
            @endphp
       <form role="form" method="POST" enctype='multipart/form-data' action="{{ route('storeSlider') }}">
       @csrf
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body">
                          <div class="row">
                          <div class="col-md-6 form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              {!! Form::label('title', 'Title') !!}
                              {!! Form::text('title', null, ['class' => 'form-control']) !!}
                              <small class="text-danger">{{ $errors->first('title') }}</small>
                          </div>
                          <div class="col-md-6 form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                            {!! Form::label('position', 'Position') !!}
                          <select name="position" class="form-control " required>
                            <option  selected="selected" value="first">First</option>
                            <option  value="second">Second</option>
                            <option  value="third">Third</option>
                          </select>
                        <small class="text-danger">{{ $errors->first('position') }}</small>
                          </div>
                        </div>
                          <div class="form-group{{ $errors->has('link') ? ' has-error' : '' }}">
                              {!! Form::label('link', 'Link') !!}
                              {!! Form::text('link', null, ['class' => 'form-control']) !!}
                              <small class="text-danger">{{ $errors->first('link') }}</small>
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
                                  {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
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
