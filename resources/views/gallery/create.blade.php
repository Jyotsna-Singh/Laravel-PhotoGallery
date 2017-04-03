@extends('layouts.main')

@section('content')
<div class="callout primary">
<div class="row column">
<h1>Create Gallery</h1>
<p class="lead">Create a Gallery and Start Uploading!</p>
</div>
</div>
<div class="row small-up-2 medium-up-3 large-up-4">

</div>
<hr>
	<div class="main">
		{!! Form::open(array('action' => 'GalleryController@store', 'enctype' => 'multipart/form-data')) !!}
			{!! Form::label('name','Name') !!}
			{!! Form::text('name', $value = null, $attributes = ['placeholder' => 'Gallery Name', 'name' => 'name']) !!}
		
			{!! Form::label('description','Description') !!}
			{!! Form::text('name', $value = null, $attributes = ['placeholder' => 'Gallery Description', 'name' => 'description']) !!}
		
      		{!! Form::label('image','Cover Image') !!}
			{!! Form::file('image') !!}
		
			{!! Form::submit('Submit', $attributes = ['class' => 'button']) !!}
			
		{!! Form::close() !!}
	</div>
@stop