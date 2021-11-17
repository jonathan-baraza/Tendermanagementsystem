@extends('master/base')
@section('title','Delete Tender')
@section('content')
<br><br>
<div class="w-full p-4 bg-light shadow-lg">
	<center>
		<br>
		<h2><u>Are you sure you want to delete:</u> <br></h2>
			<h3 class="mt-1"><span class="text-success mr-1">Tender Name:</span>{{$tender->tender_name}}</h3>
			<h3 class="mt-1"><span class="text-success mr-1">Tender Ref No:</span>{{$tender->tender_ref}}</h3>
			<br><br>
			<div class="w-50 d-flex align-items-center justify-content-around">
				<a href="{{route('editTender',['id'=>$tender->id])}}" class="w-25 btn btn-warning">Cancel</a>
				<a href="{{route('deleteTender',['id'=>$tender->id])}}" class="w-25 btn btn-outline-danger">Yes, Delete!</a>
			</div>
	</center>
</div>
@endsection