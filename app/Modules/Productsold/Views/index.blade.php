@extends('layouts.dashboard')
@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Products
                        <a href="{{ route('chooseCategory') }}" class="btn btn-outline-primary">
                            <i class="fa fa-plus-square"></i> <span>Add New</span></a>
                        </h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                            <form method="GET" class="navbar-form search-form page-search">
                                    <input name="product_name" value="{{ $request->product_name }}" class="form-control" placeholder="Search here..." type="text">
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
                                        <th>Product Name</th>
                                        <th>Category</th>
                                        <th>Market Price</th>
                                        <th>Discount Price</th>
                                        <th>Image</th>
                                    
                                        <th>Action</th>
                                        </tr>
                                    </thead>
                                    @if(count($products)>0)
                                        <tbody>
                                            @php
                                                $i = ($products->currentpage()-1) * $products->perpage() + 1;
                                            @endphp
                                             @foreach ($products as $key => $product)
                                                  <tr>
                                                    <td>{{ $i++  }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->product_name }}</td>
                                                    <td>{{ $product->market_price }}</td>
                                                    <td>{{ $product->discount }}</td>
                                                    <td><img src="{{ asset('uploads/images/'.$product->image) }}" width="100"></td>
                                                   
                                                <td>
                                                    <a href="{!! route('product.edit', $product->id ) !!}" type="button" class="btn btn-info" title="Edit"><i class="fa fa-edit"></i></a>
                                                 
                                                <a href="{{ URL::to('admin/products/delete/'.$product->id) }}" class="btn btn-danger " Onclick="return ConfirmDelete()"><i class="fa fa-trash-o"></i>
                                               
                                              </a>

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
                             {{ $products->render()  }}

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

<script >
    function ConfirmDelete() {
  return confirm("Are you sure you want to delete?");
}
</script>

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
























