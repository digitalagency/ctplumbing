@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Properties
                        <a href="{{ route('createProperty') }}" class="btn btn-outline-primary">
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
                                        <th style="33%">Id</th>
                                            <th>Name</th>
                                            <th style="33%">Action</th>
                                        </tr>
                                    </thead>
                                    <?php $i=1; ?>
                                    @if(count($properties)>0)
                                    <tbody>
                                          @foreach ($properties as $key => $property)
                                            <tr>
                                            <td>{{$i++}}</td>
                                                <td>
                                                  <p class="c_name">{{ $property->name }}</p>
                                                </td>
                                        
                                                <td>
                                                <a href="{!! route('editProperty', $property->id ) !!}" type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                             <button type="button"  data-id="{{$property->id}}" class="btn-delete btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>
                                            {{ Form::open(['route' => ['deleteProperty', $property->id], 'method' => 'GET', 'id' =>  $property->id]) }}
                                               {!! Form::close() !!}

                                                </td>
                                            </tr>
                                          @endforeach
                                    </tbody>
                                    @endif
                                </table>
                            </div>

                            {{ $properties->render() }}

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
