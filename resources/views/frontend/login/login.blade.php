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
        <form action="{{route("loginuser")}}" method="post">
            @csrf
            <label>Email</label>
            <input type="email" name="email" placeholder="Email">
            <label>Password</label>
            <input type="password" name="password" placeholder="********" autocomplete="off">

            <input type="submit" value="Login" class="register">
            <p><small>Don't have account</small></p>
            <a href="{{route("register")}}" class="login">Register</a>
        </form>
    </div>
</div>

@endsection
