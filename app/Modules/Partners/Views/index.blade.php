@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Partners
                        <a href="{{ route('createPartners') }}" class="btn btn-outline-primary">
                            <i class="fa fa-plus-square"></i> <span>Add New</span></a>
                        </h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                            <form method="GET" class="navbar-form search-form page-search">
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
                                        <th>ID</th>
                                        <th>Title</th>
                                       <th>Image</th>
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if(count($partners)>0)
                                        <tbody>
                                            @php
                                                $i = ($partners->currentpage()-1) * $partners->perpage() + 1;
                                            @endphp
                                             @foreach ($partners as $key => $patner)
                                                  <tr>
                                                    <td>{{ $i++  }}</td>
                                                    <td>{{ $patner->title }}</td>
                                                    <td><img src="{{ asset('uploads/images/'.$patner->image) }}" width="100"></td>     
                                                <td>
                                                    <a href="{!! route('editPartners', $patner->id ) !!}" type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                                    <button type="button"  data-id="{{$patner->id}}" class="btn-delete btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>
                                                    {{ Form::open(['route' => ['deletePartners', $patner->id], 'method' => 'GET', 'id' =>  $patner->id]) }}
                                                    {!! Form::close() !!}

                                                </td>
                                            </tr>
                                          @endforeach
                                          @else
                                            <tr>
                                                <td colspan="5" >
                                                  <strong>Sorry!</strong> No Pages Found.
                                                </td>
                                            </tr>
                                              @endif

                                    </tbody>

                                </table>
                            </div>

                             {{ $partners->appends(request()->query())->links()  }}

                        </div>
                    </div>

                </div>

            </div>
@endsection



@prepend('css')

    <link rel="stylesheet" href="{{ asset('assets/vendor/sweetalert/sweetalert.css') }}">


    <style>
        form.page-search {
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
























