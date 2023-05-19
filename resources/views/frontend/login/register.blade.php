@extends('frontend.layout.master')
@push('mycss')
<link type="text/css" rel="stylesheet" href="{{asset("css/allcategorycss.css")}}" />
@endpush
@push('categorytop')
{{-- @include('frontend.layout.productcategory') --}}

@endpush
@section('content')
<div class="containerforms">
    <div class="registerform">
        <form action="{{route("registeruser")}}" method="Post">
            @csrf
            <label>Name</label>
            <input type="text" name="name" placeholder="Name">
            <label>Email</label>
            <input type="email" name="email" placeholder="Email">
            <label>Password</label>
            <input type="password" name="password" placeholder="********">
            <label>Confirm Password</label>
            <input type="password" name="cpassword" placeholder="Confirm Password">
            <input type="submit" value="Register" class="register">
           <p><small>have an account</small></p>
            <a href="{{route("login")}}" class="login">Login</a>
        </form>
    </div>
</div>

@endsection
