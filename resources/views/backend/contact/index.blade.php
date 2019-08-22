@extends('layouts.dashboard')

@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Contacts  List
                           
                        </h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                            <form method="GET" class="navbar-form search-form page-search">
                                    <input name="con_name" value="{{ $request->con_name }}" class="form-control" placeholder="Search here..." type="text">
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
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact No.</th>
                                            <th>Message</th>
                                            <th>Created At</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if(count($contacts)>0)
                                        <tbody>
                                            @php
                                                $i = ($contacts->currentpage()-1) * $contacts->perpage() + 1;
                                            @endphp
                                          @foreach ($contacts as $key => $contact)
                                            <tr>
                                                    <td>{{ $i++  }}</td>
                                                    <td>{{ str_limit($contact->name,'10') }}</td>

                                                    <td>{{ $contact->email }}</td>
                                                    <td>{{ $contact->phone }}</td>
                                                    <td>{{ $contact->message }}</td>
                                                    <td>{{ $contact->created_at }}</td>

                                                <td>
                                                    <button type="button"  data-id="{{$contact->id}}" class="btn-delete btn btn-danger js-sweetalert" title="Delete"><i class="fa fa-trash-o"></i></button>

                                                    {{ Form::open(['route' => ['contact.destroy', $contact->id], 'method' => 'DELETE', 'id' =>  $contact->id]) }}
                                                    {{ Form::hidden('_method', 'DELETE') }}

                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="5" >
                                                <strong>Sorry!</strong> No Contacts Found.
                                                </td>
                                            </tr>
                                            @endif
                                    </tbody>
                                </table>
                            </div>

                             {{ $contacts->appends(request()->query())->links()  }}

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
