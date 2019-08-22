@extends('layouts.dashboard')

@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>User Create</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="{{url('admin')}}"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{url('admin/user/')}}">Users</a></li>
                            <li class="breadcrumb-item active">Create new user</li>
                        </ul>
                    </div>
                </div>

                 {{-- <div class="alert alert-info alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-info-circle"></i> The system is running well
                            </div>
                            <div class="alert alert-success alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                                <i class="fa fa-check-circle"></i> Your settings have been succesfully saved
                            </div>
                </div> --}}
            </div>
            @php
            $img = "";
            $feature_yes = '';
        @endphp
            @if($form=='edit')
                {{ Form::model($user, ['route' => ['user.update', $user->id], 'method' => 'PATCH', 'files' => true]) }}
                {{ Form::hidden('id',$user->id) }}
               @php

                if($user->feature_image){
                    $img = url('uploads/feature_images/'.$user->feature_image);
                    $feature_yes = 'yes';
                }
            @endphp
                @elseif($form=='create')
                    {{ Form::open( [ 'route'=>['user.store'],'method' => 'POST', 'files' => true]) }}
            @endif
            <div class="row clearfix">
                <div class="col-lg-9 col-md-12">
                    <div class="card">
                        <div class="body">
                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              {!! Form::label('Full Name', 'Full Name (required)') !!}
                              {!! Form::text('name', null, ['class' => 'form-control','placeholder'=>'Enter Full Name','id'=>'fullname']) !!}
                              <small class="text-danger">{{ $errors->first('fullname') }}</small>
                          </div>
                          {!! Form::label('slug', 'Slug') !!}
                          <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon3">{{url('/users')}}/</span>
                                </div>
                                {!! Form::text('slug', null, ['class' => 'form-control','id'=>'slug']) !!}
                                <small class="text-danger">{{ $errors->first('slug') }}</small>
                            </div><br/>
                          <div class="form-group{{ $errors->has('title') ? ' has-error' : '' }}">
                              {!! Form::label('Login Email', 'Login Email (required)') !!}
                              {!! Form::text('email', null, ['class' => 'form-control','placeholder'=>'Enter Login Email']) !!}
                              <small class="text-danger">{{ $errors->first('email') }}</small>
                          </div><br/>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              {!! Form::label('Password', 'Password (required)') !!}
                              {!! Form::password('password', ['class' => 'form-control','placeholder'=>'Enter Password']) !!}
                              <small class="text-danger">{{ $errors->first('password') }}</small>
                          </div>
                          <br/>
                          {{-- <div class="col-md-6 form-group{{ $errors->has('position') ? ' has-error' : '' }}">
                                {!! Form::label('Role', 'Role') !!}
                                {!! Form::select('position', ['first'=>'First','second'=>'Second'], $position='', ['class' => 'form-control', 'required' => 'required']) !!}
                                <small class="text-danger">{{ $errors->first('position') }}</small>
                            </div> --}}
                           <div>
                                <div class="form-group ">
                                    <label>Role</label>
                                    <div class="multiselect_div">
                                        <select id="user" name="single_selection" class="multiselect multiselect-custom form-control">
                                        <option>Choose ..</option>
                                       @foreach ($role as $role)
                                        <option  value="{{$role->id}}"selected>{{$role->name}}</option>
                                        @endforeach
                                        </select>
                                    </div>
                                </div>
                          </div>
                          <br/>

                          <!--
                          <div class="form-group{{ $errors->has('slug') ? ' has-error' : '' }}">
                              {!! Form::label('slug', 'Slug') !!}
                              {!! Form::text('slug', null, ['class' => 'form-control']) !!}
                              <small class="text-danger">{{ $errors->first('slug') }}</small>
                          </div>
                          -->

                          <div class="form-group{{ $errors->has('Biography') ? ' has-error' : '' }}">
                              {!! Form::label('Biography', 'Biography') !!}
                              {!! Form::textarea('Biography', null, ['class' => 'form-control summernote']) !!}
                              <small class="text-danger">{{ $errors->first('Biography') }}</small>
                          </div>




                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-12">
                <div class="card cardCat">

                        <div class="body">
                          <div class="btn-group row">

                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm hidden-sm pull-left">Save Draft</a>


                                        <a href="javascript:void(0);" class="btn btn-outline-secondary btn-sm hidden-sm pull-right">Preview</a>

                                    </div>
                                    <br/><br/><br/>
                          <h6><i class="fa fa-eye text-muted"></i> Status : <!--<span class="badge badge-warning">Draft</span><span class="badge badge-danger">UnPublished</span>--><span class="badge badge-success">Published</span><button type="button" title="Edit"><i class="fa fa-edit"></i></button></h6>
                          <br/>
                          <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                                </div>
                                <select class="custom-select" id="inputGroupSelect01">
                                <option>Choose...</option>
                                     {{-- @foreach ($role as $key => $row)
                                    <option selected>{{$row->name}}</option>
                                    @endforeach --}}
                                </select>
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="button">Update</button>
                                </div>
                            </div>
                            <br/>
                          <div class="form-group">
                                  {{-- {!! Form::reset("Reset", ['class' => 'btn btn-primary']) !!} --}}
                                  <!-- {!! Form::submit("Add New User", ['class' => 'btn btn-success']) !!} -->
                                  <button type="submit" class="btn btn-success" title="Save"> <i class="fa fa-save"></i> <span>Submit</span></button>
                              </div>

                         <!--
                          <div class="category">
                            {{-- @foreach ($role as $key => $category)
                              @php
                              $ture_false = false;
                              if($form=='edit'){
                                $ture_false = in_array($category->id, $assign_cat)?true:false;
                              }
                              @endphp
                                  <div class="fancy-checkbox {{ $errors->has('checkbox_id') ? ' has-error' : '' }}">
                                      <label>
                                          {!! Form::checkbox('categories[]', $category->id, $ture_false,  ['id' => 'checkbox_id']) !!} <span>{{ $category->title }}</span>


                                      </label>
                                  </div>


                              {{-- <div class="fancy-checkbox">
                                <label><input name="categories[]" value="{{ $category->id }}" type="checkbox"><span>{{ $category->title }}</span></label>
                              </div> --}}
                            {{-- @endforeach --}} --}}


                            </div>
                        </div>
                              -->
                        </div>
                    </div>
                <div class="card">
                        <div class="body">
                           <div class="form-group{{ $errors->has('feature_image') ? ' has-error' : '' }}">
                               {!! Form::label('feature_image', 'Profile Image') !!}
                               <input type="file" id="dropify-event" name="feature_image"
                               data-default-file="{{$img}}" />
                               {{-- {!! Form::file('feature_image', [ 'id'=>'dropify-event', 'data-default-file' =>{{ $img}} ]) !!} --}}
                               {{-- <input id="feature_yes" type="hidden" name="feature_yes" value="{{ $feature_yes }}"> --}}
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
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css')}}">


{{-- <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/animate-css/animate.min.css') }}"> --}}
{{-- <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css') }}"> --}}
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-multiselect/bootstrap-multiselect.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.min.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.css') }}" />
<link rel="stylesheet" href="{{asset('assets/vendor/multi-select/css/multi-select.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/bootstrap-tagsinput/bootstrap-tagsinput.css') }}">
<link rel="stylesheet" href="{{asset('assets/vendor/nouislider/nouislider.min.css') }}" />




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
    <!-- <script src="{{ asset('assets/js/pages/forms/advanced-form-elements.js')}}"></script> -->











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

@if (!empty($event))

        $('#fullname').on('keyup change', function () {

        var title = $(this).val().trim();

        title = title.toLowerCase();

        var title_new = title.replace(/[^a-z0-9\s]/gi, '').replace(/[_\s]/g, '-').replace(/\//g, "-").replace(/\^-/g, "-");

        title_new = title_new.substring(0, 50);

        $('#slug').val(title_new);

        });
@endif

    </script>
@endprepend
