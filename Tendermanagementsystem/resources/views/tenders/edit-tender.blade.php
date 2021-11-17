@extends('master/base')
@section('title','Edit tender')
@section('content')
@if(Session::has('tender_updated'))
	<script type="text/javascript">
		alert("{{Session::get('tender_updated')}}");
	</script>
@endif

	<div class="w-full d-flex justify-content-center p-3 m-3">
		<div id="card" class="card p-3 border rounded shadow" style="width:40%;">
			<div class="card-header">
				<h2><small class="text-success mr-1">NAME:</small> {{$tender->tender_name}}</h2>
				<span class="float-right"><span class="text-success">Ref No.</span><b>#{{$tender->tender_ref}}</b></span>
			</div>
			<div class="card-body">
				<h4 class="text-success" style="">Tender Description</h4>
				<p>{{$tender->description}}</p>
				<hr>
				<h4 class="text-success" style="">Tender Requirements</h4>
				<p>{{$tender->requirements}}</p>
				<hr>
				<span><span class="text-success mr-1"><b>Appliction Deadline:</b></span>
				<b>{{$tender->application_deadline}}</b></span>
				<hr>
				<span><span  class="text-success mr-1"><b>Tender Status :</b></span> 
					@if($tender->status=='active')
						<button class="btn btn-success">{{$tender->status}}</button>
					@elseif($tender->status=='pending')
						<button class="btn btn-warning">{{$tender->status}}</button>
					@elseif($tender->status=='taken')
						<button class="btn btn-danger">{{$tender->status}}</button>
					@endif
				</span>
			</div>
			@if($tender->status=='active')	
				@if(auth()->user()->role=='officer')
					<div class="card-footer d-flex justify-content-around align-items-center">
						<button id="showEditForm" class="btn  w-25 btn-warning">Edit</button>
						<a href="{{route('confirmDeleteTenderForm',['id'=>$tender->id])}}" class="btn w-25  btn-danger">Delete</a>
					</div>
				@endif
			@endif
		</div>
			
		<form id="editForm" method="POST" action="{{route('updateTender')}}" class="bg-success text-light border box-shadow p-5 rounded" style="width:40%;display: none;">
			@csrf
			<span id="closeEditForm" style="cursor: pointer;" class="btn btn-outline-light float-right">&times;</span>
			<center><h3><u>Edit Tender</u></h3></center>
			<input type="hidden" name="id" value="{{$tender->id}}">
			<div class="form-group">
				<label for="name">Tender Name</label>
				<input id="name" type="text" name="name" class="form-control" placeholder="" value="{{$tender->tender_name}}">
				@error('name')
				<p class="text-danger">{{$message}}</p>
				@enderror	
			</div> 
			<div class="form-group">
				<label for="description">Tender Description</label>
				<input id="description" type="text" name="description" class="form-control" placeholder="" value="{{$tender->description}}">	
				@error('description')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>
			<div class="form-group">
				<label for="requirements">Tender Requirements</label>
				<textarea id="requirements" name="requirements" class="form-control" placeholder="">
					{{$tender->requirements}}
				</textarea>	
				@error('requirements')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>
			<div class="form-group">
				<label for="application_deadline">Tender Application Deadline</label>
				<input id="application_deadline" type="date" name="application_deadline" class="form-control" placeholder="" value="{{$tender->application_deadline}}">	
				@error('application_deadline')
				<p class="text-danger">{{$message}}</p>
				@enderror
			</div>

			<input type="submit" name="submit" class="btn btn-primary form-control" value="update">
		</form>
		
	</div>
	
@endsection