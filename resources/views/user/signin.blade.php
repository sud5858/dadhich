@extends('layouts.app')
@section('content')

<div class="row">
	<div class="col-md-4 col-md-offset-4">
		
<h1>Sign In </h1>

@if(count($errors) >0)
<div class="alert alert-danger"></div>
@foreach($errors->all() as $error )
<p>{{$error}}</p>
@endforeach
@endif

	<form action="{{url('user/signin')}}" method="post">
	
	<div class="form-group">
		<label for="email"> E-mail</label>
		<input type="text"  class="form-control" name="email" id="email">
	</div>
	<div class="form-group">
		<label for="password"> Password</label>
		<input type="text"  class="form-control" name="password" id="password">
	</div>
	<button type="submit" class="btn btn-primary">Sign Up</button>
	{{ csrf_field() }}
	 </form>
	
	</div>
</div>
@endsection