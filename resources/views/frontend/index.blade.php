@extends('frontend.layout.master')

@push('categorytop')
@include('frontend.layout.productcategory')

@endpush
@section('content')
@include("frontend.products.products")

@endsection
