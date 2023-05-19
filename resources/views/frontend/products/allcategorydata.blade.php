{{-- @if(count($mycat->Product)>0) --}}


<!-- SECTION -->
<div class="section">
    <!-- container -->
    <div class="container">


                        <div class="allcatitems">
                                @forelse ($allcat as $p)

                                  <div class="allproductitem">
                 <img class="productimg" src="{{Storage::url($p->image)}}" alt="">
                <div class="discount">
                    <h1 class="mydiscount">-{{$p->discount}}%</h1>
                    <h1 class="mydiscount newitem">New</h1>
                </div>
                <div class="datanameholder">
                    <h1>{{$p->name}}</h1>
                   <div class="dataname">
                    <h4 class="product-price">${{number_format($p->price-$p->discount%$p->price)}}</h4>
                    <h4 class="product-old-price">${{number_format($p->discount%$p->price)}}</h4>
                   </div>
                </div>
                    <div class="prices">
                       <div class="product-rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>

                        <div class="product-btns">
                            <a href="" class="add-to-wishlist"><i class="fa fa-heart-o"></i><span class="tooltipp">add to
                                    wishlist</span></a>

                            <a href="/details/{{$p->slug}}" class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick view</span></a>
                        </div>

                                  </div>
                                  <div class="addtocartbtn">
                                    <a href="" class="">Add to cart</a>
                                </div>

                                    </div>

                                @empty

                                @endforelse


            </div>

        </div>
        <!-- /row -->
    </div>

