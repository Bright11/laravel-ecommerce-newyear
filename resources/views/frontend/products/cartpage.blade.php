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
                <th scope="col">Quantity</th>
                <th scope="col">Total Price</th>
                <th scope="col">Action</th>
            </tr>
        </thead>



        <tbody>
            @php
            $itemcount=1;
            @endphp
            @forelse ($getcartuser as $cartpage)
                <tr>
                    <th scope="row">{{$itemcount++}}</th>
                    <td>{{$cartpage->Product->name}}</td>
                    <td><img class="cartimg" src="{{Storage::url($cartpage->Product->image)}}" alt=""></td>
                    <td>{{$cartpage->Product->price-$cartpage->Product->discount}}</td>
                    <td>{{$cartpage->qty}}</td>
                    <td>{{number_format($cartpage->Product->price*$cartpage->qty-$cartpage->Product->discount*$cartpage->qty)}}</td>
                    <td>
                        <form action="/removeitem/{{$cartpage->id}}" method="post">
                            @csrf
                            <button class="delete"><i class="fa fa-close"></i></button>
                        </form>
                    </td>
                </tr>
            @empty

            @endforelse


        </tbody>
        <tr>
            <td colspan="3">Continue Shopping</td>
            <td colspan="5">SUBTOTAL: ${{number_format($total)}}</td>
        </tr>
    </table>
@endif
</div>
@endsection
