@extends('layouts.dashboard')
@section('content')
<div class="block-header">
    <div class="row">
        <div class="col-lg-5 col-md-8 col-sm-12">
            <h2>Products Edit</h2>
        </div>
        <div class="col-lg-7 col-md-4 col-sm-12 text-right">
            <ul class="breadcrumb justify-content-end">
                <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item">Products</li>
                <li class="breadcrumb-item active">Product Edit</li>
            </ul>
        </div>
    </div>
</div>
 @php
 $img = "";
 $image = '';
 @endphp
 <form  method="post"  action="{{ route('product.update',['id'=>$data->id]) }}" enctype='multipart/form-data' >
@csrf
<div class="row clearfix">
    <div class="col-lg-9 col-md-12">
        <div class="card">
            <div class="body">
                <div class="form-group{{ $errors->has('product_name') ? ' has-error' : '' }}">
                    {!! Form::label('product_name', 'Product Name') !!}
                    <input type="text" class="form-control" value="{{$data->product_name}}" name="product_name" />
                    <small class="text-danger">{{ $errors->first('product_name') }}</small>
                </div>

                <div class="form-group{{ $errors->has('market_price') ? ' has-error' : '' }}">
                    {!! Form::label('market_price', ' Market Price') !!}
                    <input type="text"  pattern="[0-9,,]{1,15}" name="market_price" value="{{$data->market_price}}" id="market_price"   class="form-control">
                    <small class="text-danger">{{ $errors->first('market_price') }}</small>
                </div>

                <input type="hidden" name="discount_percent" >

                <div class="form-group{{ $errors->has('discount') ? ' has-error' : '' }}">
                    {!! Form::label('discount', 'Discount') !!}
                    <input type="text"  pattern="[0-9,,]{1,15}" name="discount" value="{{$data->discount}}" id="discount"   class="form-control">
                    <small class="text-danger">{{ $errors->first('discount') }}</small>
                </div>

                <!-- <div class="form-group{{ $errors->has('details') ? ' has-error' : '' }}">
                    {!! Form::label('details', 'Details') !!}
                    <textarea type="text"   name="details" id="details"   class="form-control summernote">
                            {{$data->details}}
                    </textarea>
                    <small class="text-danger">{{ $errors->first('details') }}</small>
                </div> -->
                <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                          <label>Status</label>
                          <select name="status" class="form-control " required>
                           <option value="0">Available</option>
                           <option selected="selected" value="1">Unavailable</option>
                         </select>
                <small class="text-danger">{{ $errors->first('status') }}</small>
                </div>
                <div class="form-group{{ $errors->has('product_info') ? ' has-error' : '' }}">
                    {!! Form::label('product_info', 'Details') !!}

                    <textarea type="text"   name="product_info" id="product_info"   class="form-control summernote">
                            {{$data->product_info}}
                    </textarea>
                    <small class="text-danger">{{ $errors->first('product_info') }}</small>
                </div>

                <div class="form-group">
                  
                    {!! Form::submit("Submit", ['class' => 'btn btn-primary']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-12">
        <div class="card">
            <div class="body">
             <div class="form-group{{ $errors->has('image') ? ' has-error' : '' }}">
             <label>
             Image
             </label>
            {!! Form::file('image', [ 'id'=>'dropify-event', 'data-default-file' => asset('uploads/images/' .$data->image) ]) !!}
          <input id="image" type="hidden" name="image" value="{{ $image }}">
            <small class="text-danger">{{ $errors->first('image') }}</small>
            </div>
            </div>
        </div>
        <div class="card cardCat">
        <div class="body">
                <label for="image">Properties</label>
                <input type="hidden" name="category_id" value="{{$data->category_id}}" >
                    @php $i=0; @endphp
                     @foreach($props as $p)
                        <div class="form-group">
                        <label>{{ $p->name }}</label>
                        <input type="hidden" class="form-control" name="label[]" value="{{ $p->name }}">
                       
                        <input type="text" class="form-control" name="value[]" value="{{ (in_array($p->name, $ar))?$pr[$p->name]:'' }}">
                       
                        </div>
                    @php $i++; @endphp
                    @endforeach
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
