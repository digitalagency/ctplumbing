@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Pages Create</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Pages</li>
                            <li class="breadcrumb-item active">Pages Create</li>
                        </ul>
                    </div>
                </div>
            </div>
            @php
                $img = "";
                $feature_yes = '';
            @endphp
            @if($form=='edit')
                {{ Form::model($page, ['route' => ['page.update', $page->id], 'method' => 'PATCH', 'files' => true]) }}
                @php

                    if($page->feature_image){
                        $img = asset($page->feature_image);
                    }
                @endphp
            @elseif($form=='create')
                {{ Form::open( ['route' => ['page.store'], 'method' => 'POST', 'files' => true]) }}
            @endif
            <div class="row clearfix">
                <div class="col-lg-9 col-md-12">
                    <div class="card">
                        <div class="body">
                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              {!! Form::label('title', 'Title') !!}
                              {!! Form::text('title', null, ['class' => 'form-control','placeholder'=>'Enter title','id'=>'title']) !!}
                              <small class="text-danger">{{ $errors->first('title') }}</small>
                          </div>
                              
                          @if($form=='edit')
                          <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                              {!! Form::label('slug', 'Slug') !!}
                              <input type="text" class="form-control" id="slug" value="{{$page->slug}}"  disabled >
                        
                              <small class="text-danger">{{ $errors->first('slug') }}</small>
                          </div>
                          @endif
                          @if($form=='create')
                          <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                              {!! Form::label('slug', 'Slug') !!}
                              {!! Form::text('slug', null, ['class' => 'form-control','id'=>'slug']) !!}
                              <small class="text-danger">{{ $errors->first('slug') }}</small>
                          </div>
                          @endif

                          <div class="form-group{{ $errors->has('content') ? ' has-error' : '' }}">
                              {!! Form::label('content', 'Content') !!}
                              {!! Form::textarea('content', null, ['class' => 'form-control summernote']) !!}
                              <small class="text-danger">{{ $errors->first('content') }}</small>
                          </div>



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
                        <div class="form-group category">
                          @php
                              $homepage = false;
                              if($form=='edit'){
                                $homepage = ($page->homepage==1)?true:false;
                              }
                          @endphp
                            <div class="fancy-checkbox {{ $errors->has('homepage') ? ' has-error' : '' }}">
                                <label>
                                    {!! Form::checkbox('homepage', 1, $homepage, ['id' => 'hmepage']) !!} <span>Display Homepage</span>
                                </label>

                            </div>
                            <small class="text-danger">{{ $errors->first('homepage') }}</small>
                        </div>

                        <div class="form-group{{ $errors->has('order') ? ' has-error' : '' }}">
                            {!! Form::label('order', 'Order') !!}
                            {!! Form::text('order', null, ['class' => 'form-control','placeholder'=>'Homepage order']) !!}
                            <small class="text-danger">{{ $errors->first('order') }}</small>
                        </div>

                      </div>
                    </div>


                    <div class="card">
                        <div class="body">
                           <div class="form-group{{ $errors->has('feature_image') ? ' has-error' : '' }}">
                               {!! Form::label('feature_image', 'Feature Image') !!}
                               <input type="file" name="image2" id="input-file-now" class="dropify"   data-default-file="{{$img}}">
                               <input id="feature_yes" type="hidden" name="feature_yes" value="{{ $feature_yes }}">
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

@if (!isset($event))

        $('#title').on('keyup change', function () {

        var title = $(this).val().trim();

        title = title.toLowerCase();

        var title_new = title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').replace(/\//g, "-").replace(/\^-/g, "-");

        title_new = title_new.substring(0, 50);

        $('#slug').val(title_new);

        });
@endif
    </script>
@endprepend
