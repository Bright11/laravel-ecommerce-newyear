@extends('frontend.layout.master')

@push('mycss')
<link type="text/css" rel="stylesheet" href="{{asset("css/allcategorycss.css")}}" />
@endpush
@section('content')
@include("frontend.products.allcategorydata")

@endsection
