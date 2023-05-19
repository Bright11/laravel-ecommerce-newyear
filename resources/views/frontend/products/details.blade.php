@extends('frontend.layout.master')

@push('mycss')
<link type="text/css" rel="stylesheet" href="{{asset("css/allcategorycss.css")}}" />
@endpush
@section('content')
{{-- @include("frontend.products.allcategorydata") --}}
<div class="container detailsstyle">
    {{-- prodetails --}}
    <div class="flex-left">
        <img src="{{Storage::url($prodetails->image)}}" alt="{{$prodetails->name}}"/>
    </div>
    <div class="flex-right">
      <h1>{{$prodetails->name}}</h1>
        <hr>
        <p>${{$prodetails->price-$prodetails->discount%$prodetails->price}}&nbsp;<span style="text-decoration: line-through;">${{$prodetails->discount}}</span></p>
        <hr>
        <div class="description">
            <P>{{$prodetails->description}}</P>
        </div>
        <hr>
        <div class="addtocartbtn">
            <a href="" class="">Add to cart</a>
        </div>
    </div>
</div>
@include('frontend.products.allrelatedproduct')
@endsection


