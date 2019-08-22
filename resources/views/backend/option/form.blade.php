@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Site Options</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Settings</li>
                        </ul>
                    </div>
                </div>
            </div>
            {{ Form::open( ['route' => ['option.save'], 'method' => 'POST', 'files' => true]) }}
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                    <div class="card">
                        <div class="body">
                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              {!! Form::label('title', 'Title') !!}
                              {!! Form::text('title', $options?$options['short_desc']:'', ['class' => 'form-control','placeholder'=>'Website title']) !!}
                              <small class="text-danger">{{ $errors->first('title') }}</small>
                          </div>

                          <div class="form-group{{ $errors->has('short_desc') ? ' has-error' : '' }}">
                              {!! Form::label('short_desc', 'Short Description') !!}
                              {!! Form::textarea('short_desc',  $options?$options['short_desc']:'', ['class' => 'form-control', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('short_desc') }}</small>
                          </div>

                          <div class="form-group{{ $errors->has('admin_email') ? ' has-error' : '' }}">
                              {!! Form::label('admin_email', 'Admin Email') !!}
                              {!! Form::text('admin_email', $options?$options['admin_email']:'', ['class' => 'form-control']) !!}
                              <small class="text-danger">{{ $errors->first('admin_email') }}</small>
                          </div>

                          <div class="form-group{{ $errors->has('fb_page_link') ? ' has-error' : '' }}">
                              {!! Form::label('fb_page_link', 'Facebook Page Link') !!}
                              {!! Form::text('fb_page_link', $options?$options['fb_page_link']:'', ['class' => 'form-control']) !!}
                              <small class="text-danger">{{ $errors->first('fb_page_link') }}</small>
                          </div>

                          <div class="form-group{{ $errors->has('newsletter_title') ? ' has-error' : '' }}">
                              {!! Form::label('newsletter_title', 'Newsletter Title') !!}
                              {!! Form::text('newsletter_title', $options?$options['newsletter_title']:'', ['class' => 'form-control']) !!}
                              <small class="text-danger">{{ $errors->first('newsletter_title') }}</small>
                          </div>

                          <div class="form-group{{ $errors->has('newsletter_sub_title') ? ' has-error' : '' }}">
                              {!! Form::label('newsletter_sub_title', 'Newsletter Sub Title') !!}
                              {!! Form::text('newsletter_sub_title', $options?$options['newsletter_sub_title']:'', ['class' => 'form-control']) !!}
                              <small class="text-danger">{{ $errors->first('newsletter_sub_title') }}</small>
                          </div>

                          <div class="form-group{{ $errors->has('copy_right') ? ' has-error' : '' }}">
                              {!! Form::label('copy_right', 'Copy Rights Text') !!}
                              {!! Form::textarea('copy_right',  $options?$options['copy_right']:'', ['class' => 'form-control', 'required' => 'required']) !!}
                              <small class="text-danger">{{ $errors->first('copy_right') }}</small>
                          </div>


                              <div class="form-group">
                                  {{-- {!! Form::reset("Reset", ['class' => 'btn btn-primary']) !!} --}}
                                  {!! Form::submit("Sumbit", ['class' => 'btn btn-primary']) !!}
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
