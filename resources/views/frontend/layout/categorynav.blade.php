<!-- NAVIGATION -->
<nav id="navigation ">
    <!-- container -->
    <div class="container">
        <!-- responsive-nav -->

        <div id="responsive-nav ">
            <!-- NAV -->
            <ul >
                <style>
#brighttopnave{
  display: none;
}
.categorybtn{
  border: 0;
  padding: 10px 20px;
  margin: 10px 0px;
  background-color: #CA0D2D;
  font-size: 20px;
  text-shadow: 0px 0px 4px;
  color: white;

}

.loginstyle button{
    font-size: 12px
}
.loginstyle a{
    font-size: 12px;
    text-decoration: none;
    color: white;
}
                </style>
                <script>
                    function myFunction() {
                  var x = document.getElementById("brighttopnave");
                  if (x.style.display === "none") {
                    x.style.display = "block";
                  } else {
                    x.style.display = "none";
                  }
                }
                </script>
                <div class="main-nav nav navbar-nav mt-3 loginstyle">
                    <button class="active categorybtn" onclick="myFunction()">Category</button>
                    @if (Session::has('admin'))
                    <a class="active categorybtn" href="{{route("adminindex")}}" >Admin</a>
                    @endif
                    @if(Auth::user())
                    <a class="active categorybtn" href="{{route("logout")}}">Logout</a>
                  @else
                    <a class="active categorybtn" href="{{route("register")}}">Register</a>
                    <a class="active categorybtn" href="{{route('login')}}">Login</a>
                    @endif

                    {{--  --}}
                </div>
                    {{-- <li class="active" onclick="myFunction()"><a href="#">Home</a></li> --}}
                   <div id="brighttopnave" class="main-nav nav navbar-nav">
@if(Auth::user())


                    @forelse ($getcartuser as $allc)
                   <li><a href="#">Laptops</a></li>

                    @empty

                    @endforelse
                    @endif
                    {{-- <li><a href="#">Categories</a></li>
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Smartphones</a></li>
                    <li><a href="#">Cameras</a></li>
                    <li><a href="#">Accessories</a></li>
                    <li><a href="#">Hot Deals</a></li>
                    <li><a href="#">Categories</a></li>
                    <li><a href="#">Laptops</a></li>
                    <li><a href="#">Smartphones</a></li>
                    <li><a href="#">Cameras</a></li>
                    <li><a href="#">Accessories</a></li> --}}
                    </div>

            </ul>
            <!-- /NAV -->
        </div>
        <!-- /responsive-nav -->
    </div>
    <!-- /container -->
</nav>
<!-- /NAVIGATION -->
@if (count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
