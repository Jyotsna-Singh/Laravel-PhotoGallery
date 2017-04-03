<!doctype html>
<html class="no-js" lang="en">
<head>
<meta charset="utf-8"/>
<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
<title>PhotoGallery | Welcome</title>
<link rel="stylesheet" href="{{asset('css/foundation.css')}}">
<link rel="stylesheet" href="{{asset('css/app.css')}}">
</head>
<body>
<div class="off-canvas-wrapper">
<div class="off-canvas-wrapper-inner" data-off-canvas-wrapper>
<div class="off-canvas position-left reveal-for-large" id="my-info" data-off-canvas data-position="left">
<div class="row column">
<br>

<h5>Main Menu</h5>
<ul class="side-nav black-nav">
	<li><a href="{{url('/')}}">Home</a></li>
	<?php if(!Auth::check()) : ?>
		<li><a href="{{url('/login')}}">Login</a></li>
	
		<li><a href="{{url('/register')}}">Register</a></li>
	<?php endif; ?>
	<?php if(Auth::check()) : ?>
		<li><a href="{{url('/gallery/create')}}">Create Gallery</a></li>

		<li><a href="{{url('/logout')}}">Logout</a></li>
	<?php endif; ?>
</ul>
</div>
</div>
<div class="off-canvas-content" data-off-canvas-content>
<div class="title-bar hide-for-large">
<div class="title-bar-left">
<button class="menu-icon" type="button" data-open="my-info"></button>
<span class="title-bar-title">PhotoGallery</span>
</div>
</div>
@if(Session::has('message'))
<div data-alert class="alert-box">
	{{Session::get('message')}}
</div>
@endif
@yield('content')
<hr>
</div>
</div>
<script src="https://code.jquery.com/jquery-2.1.4.min.js"></script>
<script src="{{asset('js/vendor/foundation.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>
<script>
      $(document).foundation();
    </script>
<script type="text/javascript" src="https://intercom.zurb.com/scripts/zcom.js"></script>
</body>
</html>
