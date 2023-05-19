@extends('frontend.layout.master')

@push('mycss')
<link type="text/css" rel="stylesheet" href="{{asset("css/allcategorycss.css")}}" />
@endpush
@section('content')
<div class="container">
    @if(Auth::user())
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Number</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Price</th>
                <th scope="col">Add to Cart</th>
                <th scope="col">Action</th>
            </tr>
        </thead>

        <tbody>
            @php
            $itemcount=1;
            @endphp
            @forelse ($wishdata as $wishdata )
            <tr>
                <th scope="row">{{$itemcount++}}</th>
                <td>{{$wishdata->Product->name}}</td>
                <td><img class="cartimg" src="{{Storage::url($wishdata->Product->image)}}" alt=""></td>
                <td>${{number_format($wishdata->Product->price-$wishdata->Product->discount)}}</td>
                <td><form action="/addtocart/{{$wishdata->Product->id}}" method="post">
                    @csrf
                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                        cart</button>
                </form></td>
                <td>
                    <form action="/removeitem/{{$wishdata->id}}" method="post">
                        @csrf
                        <button class="delete"><i class="fa fa-close"></i></button>
                    </form>
                </td>
            </tr>
            @empty

            @endforelse


        </tbody>

    </table>
    @endif
</div>
@endsection
