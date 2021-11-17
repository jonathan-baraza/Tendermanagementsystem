@extends('master/base')
@section('title',"{$user->name}| Profile")
@section('content')

@if(Session::has('changed_theme_color'))
	<script type="text/javascript">
		alert("{{Session::get('changed_theme_color')}}");
	</script>
@endif
@if(Session::has('profile_updated'))
	<script type="text/javascript">
		alert("{{Session::get('profile_updated')}}");
	</script>
@endif
@if(auth()->user()->id==$user->id && $user->role=='applicant')
	@if($user->profile->photo=='/profile_pics/profile_pic_avatar.png' || $user->profile->location==null || $user->profile->about_us==null || $user->profile->phone_number==null)
		<script type="text/javascript">
			alert('Kindly update your profile!');
		</script>
	@endif

@endif
<div class="" style="padding:2%;width:100%;min-height: 550px;background-color: {{$user->profile->theme_color}};">
	<div id="pbody" class="d-flex mx-auto row p-0" style="width:80%;margin-left: 10%;box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);background-color: {{$user->profile->theme_color}};">

		<div class="p-4 col-sm-6 m-0 d-flex" style="background-image: url('/storage/images/profile_bg.png');background-position: bottom right;background-size: 50% 100%;background-repeat: no-repeat;">
			<div id="pcard" class="card mx-auto " style="width:80%;max-height: 400px;box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="card-header text-center">
					<h3 class="" style="color:{{$user->profile->theme_color}};">Role: <b class="text-primary">{{Str::upper($user->role)}}</b></h3>
				</div>
				<div class="card-body p-0" style="position: relative;">

				  
					<img class="" src="/storage/{{$user->profile->photo}}" style="width:100%;height: 300px;">
				   
				</div>
				@if(auth()->user()->id==$user->id && $user->role=='officer')
				<a href="{{route('addTenderForm')}}" style="background-color: {{$user->profile->theme_color}}" class="btn text-light w-50 mx-auto m-2"><i class="fa fa-briefcase"></i>Add a new tender</a>
				@elseif(auth()->user()->id==$user->id && $user->role=='applicant')
				<a href="#" style="background-color: {{$user->profile->theme_color}}" class="btn text-light w-50 mx-auto m-2"><i class="fa fa-briefcase"></i>Available tenders</a>
				@elseif(auth()->user()->id==$user->id && $user->role=='admin')
				<a href="/manage-users" style="background-color: {{$user->profile->theme_color}}" class="btn text-light w-50 mx-auto m-2">Manage users <i class="fa fa-user-shield"></i></a>
				
				@endif
			</div>

			<div class="bg-light ">
				
			</div>
		</div>
		<div class="bg-light col-sm-6 m-0 pt-3" style="">
			@if($user->role=='applicant')
			<h3 class="text-center"><i class="fas fa-building mr-2"></i>{{$user->name}} company.</h3>
			@else
			
			<h3 class="d-flex justify-content-center align-items-center"><img class="mr-2" src="/storage/images/250px-Coat_of_arms_of_Kenya_(Official).png" style="height: 30px;width:30px;"><span class="mr-1">GOK</span>{{$user->name}}</h3>
			
			@endif

			<br>
			<form method="POST" action="{{route('updateTheme',['id'=>$user->id])}}" id="theme_form" style="display: none;" class="form border rounded p-3 text-center">
				@csrf

				<div id="close_theme_form" style="cursor: pointer;font-size: 10px;" class="float-right btn btn-dark">close</div>
				<h3>Change theme color:</h3>
				<div class="form-group">
				<label for="theme">Select theme</label>
				<select name="theme_color">
					<option value="{{$user->profile->theme_color}}" class="bg-success">Choose theme</option>
					<option value="#28a745" class="bg-success">Success</option>
					<option value="#dc3545" class="bg-danger">danger</option>
					<option value="#007bff" class="bg-primary">primary</option>
					<option value="#17a2b8" class="bg-info">info</option>
					<option value="#ffc107" class="bg-warning">warning</option>
					<option value="#343a40" class="bg-dark">Dark</option>

				</select>
				</div>
				<input type="submit" name="submit" class="btn btn-success">
			</form>
				<form method="POST" action="{{route('updateProfile')}}" class="bg-dark text-light mb-3 form p-3 border rounded ml-3 mr-3"  id="update_profile_form" enctype="multipart/form-data" style="display:none;height: 400px;overflow-y: scroll;">
					@csrf
					<div class="text-center text-danger">
						@error('name')
						<script type="text/javascript">
							alert("{{Str::upper($message)}}, kindly go update your details again!");
						</script>
						@enderror
						@error('email')
						<script type="text/javascript">
							alert("{{Str::upper($message)}}, kindly go update your details again!");
						</script>
						@enderror
						@error('location')
						<script type="text/javascript">
							alert("{{Str::upper($message)}}, kindly go update your details again!");
						</script>
						@enderror
						@error('about_us')
						<script type="text/javascript">
							alert("{{Str::upper($message)}}, kindly go update your details again!");
						</script>
						@enderror
						@error('phone_number')
						<script type="text/javascript">
							alert("{{Str::upper($message)}}, kindly go update your details again!");
						</script>
						@enderror
						@error('whatsapp')
						<script type="text/javascript">
							alert("{{Str::upper($message)}}, kindly go update your details again!");
						</script>
						@enderror
						@error('photo')
						<script type="text/javascript">
							alert("{{Str::upper($message)}}, kindly go update your details again!");
						</script>
						@enderror
					</div>
					<div id="close_update_profile_form" style="cursor: pointer;font-size: 10px;" class="float-right btn btn-light"><b>close</b></div>
					<div class="text-center" style="color:{{$user->profile->theme_color}};"><b><u>Update your profile (<small style="font-style: italic;">scroll for more options</small>)</u></b></div>

					<input type="hidden" name="id" value="{{$user->id}}">
					<div class="form-group">
						<label for="name">Company Name</label>
						<input type="text" id="name" name="name" value="{{$user->name}}" placeholder="Enter company name" class="form-control">
					</div>
					<div class="form-group">
						<label for="name">Company Email</label>
						<input type="email" id="email" name="email" value="{{$user->email}}" placeholder="Enter company email" class="form-control">
					</div>
					<div class="form-group">
						<label for="location">Company Location</label>
						<input type="location" id="location" name="location" value="{{$user->profile->location}}" placeholder="Enter company location" class="form-control">
					</div>
					<div class="form-group">
						<label for="date_of_establishment">Date of Establishment</label>
						<input type="date" id="date_of_establishment" name="date_of_establishment" value="{{$user->profile->date_of_establishment}}" placeholder="Enter company date of establishment" class="form-control">
					</div>
					<div class="form-group">
						<label for="about_us">About us</label>
						<textarea id="about_us" name="about_us" rows="4" placeholder="Enter company bio..." class="form-control">{{$user->profile->about_us}}</textarea>
					</div>
					<div class="form-group">
						<label for="phone_number">Company Phone Number</label>
						<input type="text" id="phone_number" name="phone_number" value="{{$user->profile->phone_number}}" placeholder="Enter company phone number" class="form-control">
					</div>
					<div class="form-group">
						<label for="instagram">Instagram account(optional)</label>
						<input type="text" id="instagram" name="instagram" value="{{$user->profile->instagram}}" placeholder="Enter company's instagram account" class="form-control">
					</div>
					<div class="form-group">
						<label for="twitter">Twitter account(optional)</label>
						<input type="text" id="twitter" name="twitter" value="{{$user->profile->twitter}}" placeholder="Enter company's twitter account" class="form-control">
					</div>
					<div class="form-group">
						<label for="whatsapp">Whatsapp account(optional)</label>
						<input type="text" id="whatsapp" name="whatsapp" value="{{$user->profile->whatsapp}}" placeholder="Enter company's whatsapp account" class="form-control">
					</div>
					<div class="form-group">
						<label for="facebook">Facebook account(optional)</label>
						<input type="text" id="facebook" name="facebook" value="{{$user->profile->facebook}}" placeholder="Enter company's facebook account" class="form-control">
					</div>
					<div class="form-group">
						<label for="photo">Company Profile Photo</label>
						<input type="file" id="photo" name="photo" placeholder="Enter company's profile photo" class="form-control">
					</div>
					<input type="submit" name="submit" class="btn btn-primary" value="Update">
				</form>
			<div id="pwrapper" style="">
			@if($user->profile->photo=='/profile_pics/profile_pic_avatar.png' && $user->role=='applicant')
				<div class="alert alert-success text-center font-weight-bolder m-3">
					<button type="button" class="close" data-dismiss="alert">&times;</button>
					<div>Profile update needed!</div>
					
				</div>
			@else
			@if($user->role=='applicant')
				<p>The <b>{{$user->name}}</b> company was established in <b>{{$user->profile->date_of_establishment}}</b> and is located at <b>{{$user->profile->location}}</b> is an active <b>{{$user->role}}</b> in the Kenya Tenders Association.</p>
			@else
				<p>Hello, <b>{{$user->name}}</b>, you are an active {{$user->role}} of the Kenya Tenders Association. We thank you for being part of our family.
			@endif
			<p class="">
				<center class="text-primary "><i><b><u>Our Bio <i class="fas fa-info-circle"></i></u></b></i></center>
			<i style="color:{{$user->profile->theme_color}};font-weight: bold;">
				@if($user->profile->about_us!="")
				"{{$user->profile->about_us}}"
				@endif
			</i>
			
			</p>
			<div class=" w-full p-2 rounded" style="background-image: linear-gradient(to bottom right,{{$user->profile->theme_color}},white);">
				<span class="Text-dark"><u><b>Find us on:</b></u></span>
				<div class=" w-full p-1 d-flex justify-content-between" style="cursor: pointer;flex-wrap: wrap">
					<div class="">
						<small class="pcont" ><p style="color:black;"><i class="fas fa-envelope mr-1"></i>{{$user->email}}</p></small>
						@if($user->profile->location!="")
						<small class="pcont"><p style="color:black;"><i class="fas fa-map-marker-alt mr-1"></i>{{$user->profile->location}}</p></small>
						@endif
						@if($user->profile->phone_number!="")
						<small class="pcont"><p style="color:black;"><i class="fas fa-phone mr-1"></i>{{$user->profile->phone_number}}</p></small>
						@endif
						
					</div>
					<div class="">
						@if($user->profile->instagram!="")
						<small class="pcont "><p style="color:black;"><i class="fab fa-instagram mr-1"></i>{{$user->profile->instagram}}</p></small>
						@endif
						@if($user->profile->twitter!="")
						<small class="pcont "><p style="color:black;"><i class="fab fa-twitter mr-1"></i>{{$user->profile->twitter}}</p></small>
						@endif
						@if($user->profile->whatsapp!="")
						<small class="pcont"><p style="color:black;"><i class="fab fa-whatsapp mr-1"></i>{{$user->profile->whatsapp}}</p></small>
						@endif
						
					</div>
				</div>

			</div>
			@endif
			@if(auth()->user()->id==$user->id)
			<div class="w-full d-flex justify-content-around p-3" style="flex-wrap: wrap;">
				<button id="theme_button" class="text-light btn mr-3 mt-2" style="background-color: {{$user->profile->theme_color}};">Change theme color</button>
				@if(auth()->user()->role=='applicant')
				<button id="profile_button" class="text-light btn  mt-2" style="background-color: {{$user->profile->theme_color}};">Update profile</button>
				@endif
				
				
			</div>
			@endif
		
		</div>
		</div>
	</div>
</div>
<script type="text/javascript">

	$(document).ready(function(){
		$('#uname').css('color','#28a745');
		//$('#ppic').css('border','1px solid #28a745');
		//$('#div5').addClass('active-div'); remember to remove active on other pages!

		$('#theme_button').click(function(){
			$('#pwrapper').hide();
			$('#theme_form').show();

		});
		$('#close_theme_form').click(function(){
			$('#pwrapper').show();
			$('#theme_form').hide();

		});

		$('#profile_button').click(function(){
			$('#pwrapper').hide();
			$('#update_profile_form').css('display','block');

		});
		$('#close_update_profile_form').click(function(){
			$('#pwrapper').show();
			$('#update_profile_form').css('display','none');

		});
	});

</script>
@endsection