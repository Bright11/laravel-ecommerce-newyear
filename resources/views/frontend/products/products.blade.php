{{-- @if(count($mycat->Product)>0) --}}

@forelse ($pro as $c)
@if(count($c->Product)>0)


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">
        <!-- row -->
        <div class="row">

            <!-- section title -->
            <div class="col-md-12">
                <div class="section-title">
                    <h3 class="title">{{$c->name}}</h3>
                    <div class="section-nav">
                        <ul class="section-tab-nav tab-nav">
                            <li class="active"><a  href="/allcategory/{{$c->slug}}">View All {{$c->name}}</a></li>

                        </ul>
                    </div>
                </div>
            </div>
            <!-- /section title -->

            <!-- Products tab & slick -->
            <div class="col-md-12">
                <div class="row">
                    <div class="products-tabs">
                        <!-- tab -->
                        <style>
                            .productimg{
                                max-height: 200px;
                            }
                        </style>
                        <div id="tab1" class="tab-pane active">
                            <div class="products-slick" data-nav="#slick-nav-1">
                                <!-- product -->
                             @forelse ($c->Product as $p)


                                    <div class="product">
                                        <div class="product-img">
                                            <img class="productimg" src="{{Storage::url($p->image)}}" alt="">
                                            <div class="product-label">
                                                <span class="sale">${{$p->discount}}&nbsp;Off</span>
                                                <span class="new">NEW</span>
                                            </div>
                                        </div>
                                        <div class="product-body">
                                            <p class="product-category">Category</p>
                                            <h3 class="product-name"><a href="#">{{$p->name}}</a></h3>
                                            <h4 class="product-price">${{number_format($p->price-$p->discount)}}<del class="product-old-price">${{number_format($p->discount-$p->price)}}</del>
                                            </h4>
                                            <div class="product-rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                            <div class="product-btns">
                                               <form  action="/addtowishlist/{{$p->id}}" method="post">
                                                @csrf
                                                <button class="add-to-wishlist"><i class="fa fa-heart-o"></i>
                                                    <span class="tooltipp">add to
                                                        wishlist</span>
                                                </button>
                                               </form>

                                            </div>
                                        </div>
                                        <div class="add-to-cart">
                                            @if ($p->qty==0)
                                                <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i>Out of Stock</button>
                                                @else
                                                <form action="/addtocart/{{$p->id}}" method="post">
                                                    @csrf
                                                    <button type="submit" class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                                        cart</button>
                                                </form>
                                            @endif

                                        </div>
                                    </div>
                                    <!-- /product -->


                                    @empty

                                    @endforelse

                            </div>
                            <div id="slick-nav-1" class="products-slick-nav"></div>
                        </div>
                        <!-- /tab -->
                    </div>
                </div>
            </div>
            <!-- Products tab & slick -->
        </div>
        <!-- /row -->
    </div>
    <!-- /container -->
</div>
<!-- /SECTION -->
{{-- @endif --}}
@endif
@empty

@endforelse
