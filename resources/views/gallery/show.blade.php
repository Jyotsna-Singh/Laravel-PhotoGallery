@extends('layouts.main')

@section('content')
<div class="callout primary">
<div class="row column">
	<a href="{{url('/')}}">Back To Gallery</a>
<h1>{{ $gallery->name }}</h1>
<p class="lead">{{ $gallery->description }}</p>
	<?php if(Auth::check()) : ?>
	<a class="button" href="{{asset('photo/create')}}/{{$gallery->id}}">Upload Photo</a> 
	<?php endif; ?>
	
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">
	<?php foreach($photos as $photo) : ?>
		<div class="column">
			<a href="{{url('photo/details')}}/{{$photo->id}}">
				<img class="thumbnail" src="{{asset('/images')}}/{{$photo->image}}">
			</a>
			<h5>{{$photo->title }}</h5>
			<p>{{$photo->description}}</p>
		</div>
	<?php endforeach; ?>
</div>



@stop