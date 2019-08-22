@extends('layouts.dashboard')

@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Testimonial Create</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Testimonial</li>
                            <li class="breadcrumb-item active">Testimonial Create</li>
                        </ul>
                    </div>
                </div>
            </div>
            @php
                $img = "";
                $feature_yes = '';
            @endphp
            @if($form=='edit')
                {{ Form::model($testimonial, ['route' => ['testimonial.update', $testimonial->id], 'method' => 'PATCH', 'files' => true]) }}
                @php
                    if($testimonial->feature_image){
                        $img = url('uploads/images/'.$testimonial->feature_image);
                        $feature_yes = 'yes';
                    }
                @endphp
            @elseif($form=='create')
                {{ Form::open( ['route' => ['testimonial.store'], 'method' => 'POST', 'files' => true]) }}
            @endif
            <div class="row clearfix">
                <div class="col-lg-9 col-md-12">
                    <div class="card">
                        <div class="body">
                          <div class="form-group{{ $errors->has('person_name') ? ' has-error' : '' }}">
                                {!! Form::label('Name', 'Name') !!}
                                {!! Form::text('person_name', null, ['class' =>'form-control','placeholder'=>'Enter Name','id'=>'person_name']) !!}
                                <small class="text-danger">{{ $errors->first('person_name') }}</small>
                          </div>
                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                            {!! Form::label('Title', 'Title') !!}
                            {!! Form::text('title', null, ['class' =>'form-control','placeholder'=>'Enter title','id'=>'title']) !!}
                            <small class="text-danger">{{ $errors->first('title') }}</small>
                          </div>
                          <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                            {!! Form::label('slug', 'Slug') !!}
                            {!! Form::text('slug', null, ['class' => 'form-control', 'placeholder'=>'Enter slug']) !!}
                            <small class="text-danger">{{ $errors->first('slug') }}</small>
                        </div>
                          <div class="form-group{{ $errors->has('designation') ? ' has-error' : '' }}">
                            {!! Form::label('Designation', 'Designation') !!}
                            {!! Form::text('designation', null, ['class' => 'form-control','placeholder'=>'Enter designation']) !!}
                            <small class="text-danger">{{ $errors->first('designation') }}</small>
                        </div>
                        {{-- <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                                {!! Form::label('Description', 'Description') !!}
                                {!! Form::textarea('description', null, ['class' => ' summer-note form-control','placeholder'=>'Enter designation']) !!}
                                <small class="text-danger">{{ $errors->first('description') }}</small>
                            </div> --}}
                           <div class="form-group{{ $errors->has('description') ? ' has-error' : '' }}">
                              {!! Form::label('Description', 'Description') !!}
                              {!! Form::textarea('description', null, ['class' => 'form-control summernote']) !!}
                              <small class="text-danger">{{ $errors->first('description') }}</small>
                          </div> <br>
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
                            @php
                            $status = 'publish';
                            if($form == 'edit'){
                                $status = $testimonial->status;
                            }
                            @endphp
                             <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                    </div>
                                    <select class="custom-select"  name="status" id="inputGroupSelect01">
                                        <option value='draft' @if($status=='draft' ){{"selected"}} @endif>Draft</option>
                                        <option value='publish' @if($status=='publish' ){{"selected"}} @endif>Published</option>
                                        <option value='unpublish' @if($status=='unpublish' ){{"selected"}} @endif>Unpublish</option>
                                        <option value='pending' @if($status=='pending' ){{"selected"}} @endif>Pending</option>
                                     </select>
                                    {{-- <div class="input-group-append">
                                        <button class="btn btn-outline-secondary" type="button">Update</button>
                                    </div> --}}
                                </div> <br><br><br>
                                <div class="form-group{{ $errors->has('feature_image') ? ' has-error' : '' }}">
                                        {!! Form::label('feature_image', 'Feature Image') !!}
                                        <input type="file" id="dropify-event" name="feature_image"
                                        data-default-file="{{$img}}" />
                                        <input id="feature_yes" type="hidden" name="feature_yes" value="{{ $img }}">
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
@if($form != 'edit')
        $('#person_name').on('keyup change', function () {

        var title = $(this).val().trim();

        title = title.toLowerCase();

        var title_new = title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').replace(/\//g, "-").replace(/\^-/g, "-");

        title_new = title_new.substring(0, 50);

        $('#slug').val(title_new);

        });
@endif

    </script>
@endprepend
