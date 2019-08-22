@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Update Property</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">

                    </div>
                </div>
            </div>
          <div class="row clearfix">
                <div class="col-lg-5 col-md-5">

                <form  method="post" class=""  action="{{ route('updateProperty',['id'=>$data->id]) }}"   enctype='multipart/form-data' >
                       @csrf
                          <div class="carddd">
                              <div class="body">
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    {!! Form::label('name', 'Properties Name') !!}
                                    <input type="text" class="form-control" value="{{$data->name}}" name="name" />                                    <small class="text-danger">{{ $errors->first('title') }}</small>
                                </div>

                                <div class="form-group">
                                    {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
                                </div>
                              </div>
                          </div>

              {!! Form::close() !!}
                </div>
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

