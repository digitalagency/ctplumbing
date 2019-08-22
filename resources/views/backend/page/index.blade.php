@extends('layouts.dashboard')

@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Pages
                        <a href="{{ route('page.create') }}" class="btn btn-outline-primary">
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
                                            <th>#</th>
                                            <th>Title</th>
                                            <th>Author</th>
                                            <th>Created At</th>
                                            <th>Action</th>

                                        </tr>
                                    </thead>
                                    @if(count($pages)>0)
                                        <tbody>
                                            @php
                                                $i = ($pages->currentpage()-1) * $pages->perpage() + 1;
                                            @endphp
                                          @foreach ($pages as $key => $page)

                                            <tr>
                                                    <td>{{ $i++  }}</td>
                                                    <td>{{ str_limit($page->title,'10') }}</td>

                                                    <td>{{ $page->user->name }}</td>
                                                    <td>{{ $page->created_at }}</td>

                                                <td>
                                                    <a href="{!! route('page.edit', $page->id ) !!}" type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                                    {{-- <a href="" class="button" data-id="{{$page->id}}">Delete</a> --}}

                                                    <button type="button"  data-id="{{$page->id}}" class="btn-delete btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>

                                                    {{ Form::open(['route' => ['page.destroy', $page->id], 'method' => 'DELETE', 'id' =>  $page->id]) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}

                                                      {{-- <button type="button" data-type="confirm" class="btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button> --}}
                                                    {{-- {{ Form::button('<i class="fa fa-trash-o"></i>', ['type' => 'submit', 'data-type'=> 'confirm', 'class' => 'btn btn-danger js-sweetalert','data-original-title'=> 'Remove'] )  }} --}}



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

                             {{ $pages->appends(request()->query())->links()  }}

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
