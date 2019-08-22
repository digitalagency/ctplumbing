@extends('layouts.dashboard')

@section('content')

{!! Menu::render() !!}

@endsection

@push('scripts')
    {!! Menu::scripts() !!}
@endpush
