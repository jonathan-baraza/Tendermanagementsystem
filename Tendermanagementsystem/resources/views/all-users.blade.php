@extends('master/base')
@section('title','Manage users')
@section('content')

@if(Session::has('status_changed'))
	<script type="text/javascript">
		alert("{{Session::get('status_changed')}}");
	</script>
@endif
<center><h4 class="mt-3"><u>TENDER MANAGEMENT SYSTEM USERS.</u></h4></center>
<div class="row mt-1" style="padding-left: 10%;">
	
		@foreach($users as $user)
		@if($user->role!='admin')
		<div class="col-sm-3 card border rounded w-25 m-3 p-0" style="box-shadow: 2px 2px 4px #dadada;">
			<div class="card-header p-2">
				<h4><span class="text-success">NAME:</span>{{$user->name}}</h4>
				<span class="d-flex align-items-center"><span class="text-success">ROLE: </span><b>{{$user->role}}</b></span>
			</div>
			<div class="card-body m-0 p-0">
				<img src="/storage/{{$user->profile->photo}}" class="w-100" style="width:100%;height:200px;">
				<center class="m-2">
					@if($user->status=='active')
						<a href="{{route('changeUserStatus',['id'=>$user->id])}}" class="btn btn-success disabled">Activate</a>
						<a href="{{route('changeUserStatus',['id'=>$user->id])}}" class="btn btn-danger">Deactivate</a>
					@else
						<a href="{{route('changeUserStatus',['id'=>$user->id])}}" class="btn btn-success">Activate</a>
						<a href="{{route('changeUserStatus',['id'=>$user->id])}}" class="btn btn-danger disabled">Deactivate</a>
						
					@endif
				</center>
			</div>
		</div>
		@endif
		@endforeach
</div>
@endsection