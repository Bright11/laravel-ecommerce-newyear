<!-- HEADER -->
<header class="navheader">

<style>
    #header{

    }
</style>
    <!-- MAIN HEADER -->
    <div id="header">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">
                <!-- LOGO -->
                <div class="col-md-3">
                    <div class="header-logo">

                        <a href="/" class="mylogo">

                          <img src="./img/logo.jpg" alt="">
                        </a>
                    </div>
                </div>
                <!-- /LOGO -->

                <!-- SEARCH BAR -->
                <div class="col-md-6">
                    <div class="header-search">
                        <form>
                            <select class="input-select">

                                <option>all category</option>
                            </select>
                            <input class="input" placeholder="Search here">
                            <button class="search-btn">Search</button>
                        </form>

                    </div>


                </div>
                <!-- /SEARCH BAR -->

                <!-- ACCOUNT -->
                <div class="col-md-3 clearfix">

                    <div class="header-ctn">

                        <!-- Wishlist -->
                        <div>
                            <a href="{{route('mywishlist')}}">
                                <i class="fa fa-heart-o"></i>
                               @if(Auth::user())
                                <span>Your Wishlist</span>
                                <div class="qty">{{$wishlistcount}}</div>
                               @else
                               <span>Your Wishlist</span>
                                <div class="qty">0</div>
                               @endif
                            </a>

                        </div>
                        <!-- /Wishlist -->

                        <!-- Cart -->
                        <div class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                <i class="fa fa-shopping-cart"></i>
                                <span>Your Cart</span>
                                <div class="qty">{{$countcart}}</div>
                            </a>
                            <div class="cart-dropdown">
                                <div class="cart-list">
                                    @if(Auth::user())
                                    @forelse ($getcartuser as $mycart)
                                        <div class="product-widget">
                                            <div class="product-img">
                                                <img src="{{Storage::url($mycart->Product->image)}}" alt="">
                                            </div>
                                            <div class="product-body">
                                                <h3 class="product-name"><a href="#">{{$mycart->Product->name}}</a></h3>
                                                <h4
                                                class="product-price"><span class="qty">{{$mycart->qty}}x</span>$
                                                {{number_format($mycart->Product->price-$mycart->Product->discount)}}
                                            </h4>
                                            </div>
                                           <form action="/removeitem/{{$mycart->id}}" method="post">
                                            @csrf
                                            <button class="delete"><i class="fa fa-close"></i></button>
                                           </form>
                                        </div>
                                    @empty

                                    @endforelse

                                    @endif

                                </div>
                                @if(Auth::user())

                                    <div class="cart-summary">

                                        <small>{{$countcart}} Item(s) selected</small>
                                        <h5>SUBTOTAL: ${{number_format($total)}}</h5>
                                        <a style="color: black;" href="{{route('removeallcart')}}">Remove all<i class="fa fa-close"></i></a>
                                    </div>
                                    <div class="cart-btns">

                                        <a href="{{route('cartpage')}}">View Cart</a>
                                        <a href="{{route('checkout')}}">Checkout <i class="fa fa-arrow-circle-right"></i></a>

                                    </div>
                                @endif
                            </div>

                        </div>
                        <!-- /Cart -->

                        <!-- Menu Toogle -->
                        <div class="menu-toggle">
                            <a href="#">
                                <i class="fa fa-bars"></i>
                                <span>Menu</span>
                            </a>
                        </div>
                        <!-- /Menu Toogle -->


                    </div>


                </div>
                <!-- /ACCOUNT -->

            </div>
            <!-- row -->

        </div>
        <!-- container -->
    </div>
    <!-- /MAIN HEADER -->
</header>
<!-- /HEADER -->
