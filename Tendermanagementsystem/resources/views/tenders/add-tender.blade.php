@extends('master/base')
@section('title','Add tender')
@section('content')
	<div class="w-full d-flex justify-content-center p-3 m-3">
		<form method="POST" action="{{route('addNewTender')}}" class="bg-dark text-light border box-shadow p-5 rounded" style="width:40%;">
			@csrf
			<center><h3><u>Add New Tender</u></h3></center>
			<div class="form-group">
				<label for="name">Tender Name</label>
				<input id="name" type="text" name="name" class="form-control" placeholder="">
				@error('name')
				<p class="text-danger">{{$message}}</p>
				@enderror	
			</div> 
			<div class="form-group">
				<label for="description">Tender Description</label>
				<input id="description" type="text" name="description" class="form-control" placeholder="">	
				@error('description')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>
			<div class="form-group">
				<label for="requirements">Tender Requirements</label>
				<textarea id="requirements" name="requirements" class="form-control" placeholder="">
				</textarea>	
				@error('requirements')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>
			<div class="form-group">
				<label for="application_deadline">Tender Application Deadline</label>
				<input id="application_deadline" type="date" name="application_deadline" class="form-control" placeholder="">	
				@error('application_deadline')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>

			<input type="submit" name="submit" class="btn btn-success form-control">
		</form>
		
	</div>
@endsection