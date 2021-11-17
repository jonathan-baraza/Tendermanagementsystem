@extends('master/base')
@section('title','Homepage')
@section('content')
@if(Session::has('tender_added'))
	<script type="text/javascript">
		alert("{{Session::get('tender_added')}}");
	</script>
@endif
@if(Session::has('tender_deleted'))
	<script type="text/javascript">
		alert("{{Session::get('tender_deleted')}}");
	</script>
@endif
@if(Session::has('tender_applied'))
	<script type="text/javascript">
		alert("{{Session::get('tender_applied')}}");
	</script>
@endif

<div class="w-full d-flex justify-content-center pl-3 pr-3">
	@if($tenders->count()==0)
	<center>
		<div class="alert alert-success m-3 w-100">
			<button type="button" class="close" data-dismiss="alert">&times;</button>
			<h5><b>There are no available tenders</b></h5>
		</div>
	</center>
	@else
	<div class="table-responsive">
	<table class="table table-striped table-bordered m-3 w-full">
		<thead class="bg-success text-light">
			<tr>
				<td colspan="7">
				<center>
					<img style="height: 50px;width:50px;" src="/storage/images/250px-Coat_of_arms_of_Kenya_(Official).png">
					<h3>AVAILABLE TENDERS</h3>
				</center>
				</td>
			</tr>
			<tr class="text-center">
				<td>Tender Ref Number</td>
				<td>Tender Name</td>
				<td>Tender Description</td>
				<td>Tender Requirements</td>
				<td>Tender Application deadline</td>
				<td>Tender Status</td>
				@auth
					@if(auth()->user()->role=='officer' || auth()->user()->role=='applicant')
						@if(auth()->user()->status=='active')
						<td>Operations</td>
						@endif
					@endif
				@endif
			</tr>
			
		</thead>
		<tbody>
			@foreach($tenders as $tender)
			<tr>
				<td><b>#{{$tender->tender_ref}}</b></td>
				<td class="w-25"><i class="fa fa-briefcase mr-1"></i>{{$tender->tender_name}}</td>
				<td class="w-auto">{{$tender->description}}</td>
				<td class="">{{$tender->requirements}}</td>
				<td><b>{{$tender->application_deadline}}</b></td>
				<td>
					@if($tender->status=='active')
						<b class="text-success">{{Str::upper($tender->status)}}</b>
					@elseif($tender->status=='pending')
						<b class="text-warning">{{Str::upper($tender->status)}}</b>
					@elseif($tender->status=='taken')
						<b class="text-danger">{{Str::upper($tender->status)}}</b>
					@endif
				</td>
				@auth
					@if(auth()->user()->role=='officer')
					<td><a href="{{route('editTender',['id'=>$tender->id])}}" class="btn btn-warning">Edit</a></td>
					@elseif(auth()->user()->role=='applicant')
						@if(auth()->user()->status=='active')
							<td><a href="{{route('editTender',['id'=>$tender->id])}}" class="btn btn-primary">Apply</a></td>
						@endif
					@endif
				@endif
				
			</tr>
			@endforeach

			
		</tbody>
	</table>
</div>
@endif
</div>

@endsection