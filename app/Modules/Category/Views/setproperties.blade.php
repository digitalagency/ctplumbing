
@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Choose Properties</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                    </div>
                </div>
            </div>
          <div class="row clearfix">
                <form  method="post" class="" action="{{ route('addPropertyDetails') }}" enctype='multipart/form-data' >
                       @csrf               
                    <div class="body">
                    <input type="hidden" name="cat_id" value="{{ $id }}" />
                        <label for="exampleFormControlSelect2">Select Properties  *</label><br>
                            <div class="form-check">
                            <div class="row">
                            @if($properties)
                            @foreach($properties as $p)
                            <div class="col-md-4">                               
                            <div class="card" style="margin-bottom:12px; padding:5px;">
                                <input class="form-check-input" name="properties_id[]" value="{{$p->id}}" type="checkbox" style="z-index:99999;" id="inlineCheckbox1" {{ (in_array($p->id, $props))?"checked":'' }} >                                        
                                <label class="form-check-label" for="inlineCheckbox1" style="font-size:14px; "> {{$p->name}} </label>
                               </div>
                               </div>
                             @endforeach
                             @endif
                              </div>
                                <div class="form-group">
                                    {!! Form::submit("Add", ['class' => 'btn btn-primary']) !!}
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

