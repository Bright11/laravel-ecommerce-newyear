<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		 <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

		<title>Ecommerce</title>

		<!-- Google font -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

		<!-- Bootstrap -->
		<link type="text/css" rel="stylesheet" href="{{asset("css/bootstrap.min.css")}}"/>

		<!-- Slick -->
		<link type="text/css" rel="stylesheet" href="{{asset("css/slick.css")}}"/>
		<link type="text/css" rel="stylesheet" href="{{asset("css/slick-theme.css")}}"/>

		<!-- nouislider -->
		<link type="text/css" rel="stylesheet" href="{{asset("css/nouislider.min.css")}}"/>

		<!-- Font Awesome Icon -->
		<link rel="stylesheet" href="{{asset("css/font-awesome.min.css")}}">

		<!-- Custom stlylesheet -->
		<link type="text/css" rel="stylesheet" href="{{asset("css/style.css")}}"/>
        <link type="text/css" rel="stylesheet" href="{{asset("css/brightcss.css")}}" />
        @stack('mycss')
          </head>
	<body>
	@include('frontend.layout.topnav')
	@include('frontend.layout.navbar')
    @include('frontend.layout.categorynav')
   @stack('categorytop')
        @yield('content')
{{-- testproductcategory --}}
    @include('frontend.layout.footer')

	</body>
</html>
