@extends('layouts.dashboard')

@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Options Create</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item">Options</li>
                            <li class="breadcrumb-item active">Options Create</li>
                        </ul>
                    </div>
                </div>
            </div>
            @if($form=='edit')
            {{ Form::model($cmsoption, ['route' => ['cmsoption.update', $cmsoption->id], 'method' => 'PATCH', 'files' => true]) }}
            @php
             $img = '';
            @endphp
            @elseif($form=='create')
            {{ Form::open( ['route' => ['cmsoption.store'], 'method' => 'POST', 'files' => true]) }}
        @endif
            <div class="row clearfix">
                <div class="col-lg-9 col-md-12">
                    <div class="card">
                        <div class="body">
                            <div class="form-group{{ $errors->has('option_title') ? ' has-error' : '' }}">
                                {!! Form::label('Option title', 'Option title') !!}
                                {!! Form::text('option_title', null, ['class' => 'form-control']) !!}
                                <small class="text-danger">{{ $errors->first('option_title') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('option_key') ? ' has-error' : '' }}">
                                {!! Form::label('Option key', 'Option key') !!}
                                {!! Form::text('option_key', null, ['class' => ' form-control','id'=>'search_text']) !!}
                                <small class="text-danger">{{ $errors->first('option_key') }}</small>
                            </div>
                            <div class="form-group{{ $errors->has('option_value') ? ' has-error' : '' }}">
                                    {!! Form::label('Option value', 'Option value') !!}
                                    {!! Form::textarea('option_value', null, ['class' => 'form-control summernote']) !!}
                                    <small class="text-danger">{{ $errors->first('option_value') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('autoload') ? ' has-error' : '' }}">
                                    {!! Form::label('Autoload', 'Autoload') !!}
                                    {!! Form::text('autoload', null, ['class' => 'form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('autoload') }}</small>
                                </div>
                                <div class="form-group{{ $errors->has('group') ? ' has-error' : '' }}">
                                    {!! Form::label('Group', 'Group') !!}
                                    {!! Form::text('group', null, ['class' => 'typeahead form-control']) !!}
                                    <small class="text-danger">{{ $errors->first('group') }}</small>
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
                          @php
                          $status = 'publish';
                          if($form == 'edit'){
                              $status = $cmsoption->status;
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
                                      data-default-file="{{$img = ''}}" />
                                      {{-- <input id="feature_yes" type="hidden" name="feature_yes" value="{{ $img }}"> --}}
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


    </style>
@endprepend


@prepend('css')
    <link rel="stylesheet" href="{{ asset('assets/vendor/summernote/dist/summernote.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/dropify/css/dropify.min.css') }}">
    <link href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
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
    <script src="{{asset('assets/js/plugins/typeahead/bootstrap3-typeahead.js')}}"></script>
    <script type="text/javascript">
        var path = "{{ route('option.group') }}";
        $('.typeahead').typeahead({
            source:  function (query, process) {
            return $.get(path, { query: query }, function (data) {
                    return process(data);
                });
            }
        });
    </script>
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
        $('#feature_yes2').val('no');
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

