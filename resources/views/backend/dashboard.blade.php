@extends('layouts.dashboard')

@section('content')
<div class="block-header">
                <div class="row">
                    <div class="col-lg-5 col-md-8 col-sm-12">
                        <h2>Dashboard</h2>
                    </div>
                    <div class="col-lg-7 col-md-4 col-sm-12 text-right">
                        <ul class="breadcrumb justify-content-end">
                            <li class="breadcrumb-item"><a href="index.html"><i class="icon-home"></i></a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>



            <div class="row clearfix">
                <div class="col-xl-12 col-lg-12 col-md-12">
                    <div class="cardc">
                        <div class="header">
                            <h2>Welcome to {{ config('app.SITE_TITLE','Prakash Bhandari || www.pkbhandari.com.np') }} </h2>

                        </div>
                    </div>
                </div>
            </div>
@endsection
@prepend('scripts')

<script src="{{ asset('js/index.js') }}"></script>
@endprepend
