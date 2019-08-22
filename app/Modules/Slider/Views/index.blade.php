@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Sliders
                        <a href="{{ route('createSlider') }}" class="btn btn-outline-primary">
                            <i class="fa fa-plus-square"></i> <span>Add New</span></a>
                        </h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                            <form method="GET" class="navbar-form search-form slider-search">
                                    <input name="title" value="{{ $request->title }}" class="form-control" placeholder="Search here..." type="text">
                                    <button type="submit" class="btn btn-default"><i class="icon-magnifier"></i></button>
                            </form>
                    </div>
                </div>
            </div>
          <div class="row clearfix">
                <div class="col-lg-12 col-md-12">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <i class="fa fa-check-circle"></i> {{ $message}}
                    </div>
                @endif
                <div class="card">
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table m-b-0 table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Image</th>
                                            <th>Postion</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if(count($sliders)>0)
                                        <tbody>
                                            @php
                                                $i = ($sliders->currentpage()-1) * $sliders->perpage() + 1;
                                            @endphp
                                          @foreach ($sliders as $key => $slider)
                                              <tr>
                                                    <td>{{ $i++  }}</td>
                                                    <td>{{ str_limit($slider->title,'10') }}</td>
                                                    <td><img src="{{ asset('uploads/images/'.$slider->image) }}" width="100"></td>
                                                    <td>{{ $slider->position }}</td>              
                                                    <td>{{ $slider->created_at }}</td>

                                                <td>
                                                    <a href="{!! route('editSlider', $slider->id ) !!}" type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <button type="button"  data-id="{{$slider->id}}" class="btn-delete btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>

                                                    {{ Form::open(['route' => ['deleteSlider', $slider->id], 'method' => 'GET', 'id' =>  $slider->id]) }}
                                                    {!! Form::close() !!}

                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="5" >
                                                <strong>Sorry!</strong> No Sliders Found.
                                                </td>
                                            </tr>
                                            @endif
                                    </tbody>
                                </table>
                            </div>
                             {{ $sliders->appends(request()->query())->links()  }}
                        </div>
                    </div>

                </div>

            </div>
@endsection



@prepend('css')

    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">


    <style>
        form.slider-search {
            width: 50%;
            float: right;
        }
    </style>
@endprepend

@prepend('scripts')

<script src="{{ asset('assets/vendor/sweetalert/sweetalert.min.js') }}"></script>
<script>

$(document).on('click', '.btn-delete', function (e) {
    e.preventDefault();
    var id = $(this).data('id');
    swal({
            title: "Are you sure!",
            type: "error",
            confirmButtonClass: "btn-danger",
            confirmButtonText: "Yes!",
            showCancelButton: true,
        },
        function() {
          event.preventDefault();
          document.getElementById(id).submit();
    });
});

</script>


@endprepend
