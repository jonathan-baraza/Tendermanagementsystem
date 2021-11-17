<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1.0">
	<x-links/>
	<title>@yield('title')</title>
	<style type="text/css">
	
	.nav-item:hover{
		border-color: green !important;
	}
	.nav-item:hover .nav-link{
		color:green !important;
	}
	
		
	</style>
</head>
<body style="background-color: #f1f3f4;">
	<main style="min-height: 600px !important">
<nav id="top" class="navbar navbar-expand-md text-dark" style="background-color: white;box-shadow:  0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
  <!-- Brand -->
  <a class="navbar-brand d-flex align-items-center pl-3" href="/home">
  	<img style="height: 50px;width: 50px;" src="/storage/images/250px-Coat_of_arms_of_Kenya_(Official).png">
  	<span class="ml-3 text-dark" style="font-weight: bold;font-family: arial;font-size: 25px;">Tender Management System</span>
  </a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler border border-dark" type="button" data-toggle="collapse" data-target="#collapsibleNavbar" style="background-color: #dadada;">
    <span class="navbar-toggler-icon">
    </span>
  </button>

  <!-- Navbar links -->
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav ml-auto pr-2" style="margin-right: 100px;">
      <li id="" class="nav-item mr-3" style="display: flex;flex-direction: column;justify-content: space-between;align-items: flex-start;">
        <a class="nav-link text-dark" href="/home" id="home"><i class="fas fa-business-time mr-2"></i>Tenders</a>
      </li>

      <li id="" class="nav-item mr-3" style="display: flex;flex-direction: column;justify-content: space-between;align-items: flex-start;">
        <a class="nav-link text-dark" href="{{route('about')}}" id="about"><i class="fas fa-info-circle mr-2"></i>About</a>
      </li>
      <li id="" class="nav-item mr-3" style="display: flex;flex-direction: column;justify-content: space-between;align-items: flex-start;">
        <a class="nav-link text-dark" href="" id="contracts"><i class="ify fas fa-file-contract mr-2"></i>Contracts</a>
      	</li>


    @auth
    	@if(auth()->user()->status=='active')
    	@if(auth()->user()->role=='officer')
    		<li id="" class="nav-item mr-3" style="display: flex;flex-direction: column;justify-content: space-between;align-items: flex-start;">
        	<a class="nav-link text-dark" href="{{route('addTenderForm')}}" id="login">
        		<i class="ify fa fa-briefcase mr-2"></i>Manage Tenders</a>
     		</li>
    	@endif
    	@if(auth()->user()->role=='admin')
    		<li id="" class="nav-item mr-3" style="display: flex;flex-direction: column;justify-content: space-between;align-items: flex-start;">
        	<a class="nav-link text-dark" href="{{route('manageUsers')}}" id="login">
        		<i class="ify fa fa-user-shield mr-2"></i>Manage Users</a>
     		</li>
    	@endif
      	@if(auth()->user()->role=='applicant')
      	<li class="nav-item dropdown">
	      <a class="nav-link text-dark dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	      	<i class="ify fa fa-shield-alt mr-2"></i>Manage Account
	      </a>
	      <div class="dropdown-menu">
	        <a class="dropdown-item border-bottom pb-2 pl-2 pr-2" href="}"><i class="ify fas fa-briefcase mr-2"></i>My Tenders</a>
	        <a class="dropdown-item pl-2 pr-2" href=""><i class="ify fas fa-file-contract mr-2"></i>My Contracts</a>
	      </div>
	    </li>
	    @endif

      	<li class="nav-item dropdown">
	      <a class="nav-link text-dark dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	      	<img style="height: 30px;width:30px;border-radius: 15px;" src="/storage/{{auth()->user()->profile->photo}}">
	       {{auth()->user()->name}}
	      </a>
	      <div class="dropdown-menu">
	        <a class="dropdown-item border-bottom pb-2 pl-2 pr-2" href="{{route('profilePage',['id'=>auth()->user()->id])}}"><i class="ify fas fa-user mr-2"></i>My profile</a>
	        <a class="dropdown-item pl-2 pr-2" href="/logout"><i class="ify fas fa-sign-out mr-2"></i>Logout</a>
	      </div>
	    </li>
	    @else
	    
	    <li class="nav-item dropdown">
	      <a class="nav-link text-dark dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
	      	<i class="text-danger fa fa-ban mr-1"></i>
	       
	      	<span class="text-danger"><b>You have been deactivated</b></span>
	      </a>
	      <div class="dropdown-menu">
	        <a class="dropdown-item pl-2 pr-2" href="/logout"><i class="ify fas fa-sign-out mr-2"></i>Logout</a>
	      </div>
	    </li>
     	@endif
   		
  
    @else

   		 <li id="li6" class="nav-item mr-3" style="display: flex;flex-direction: column;justify-content: space-between;align-items: flex-start;">
        	<a class="nav-link text-dark" href="/register" id="login">
        		<i class="ify fa fa-user-plus mr-2"></i>Create account</a>
        
     	</li>

   		<li id="li6" class="nav-item mr-3" style="display: flex;flex-direction: column;justify-content: space-between;align-items: flex-start;">
        	<a class="nav-link text-dark" href="/login" id="login">
        		<i class="ify fas fa-key mr-2"></i>Login</a>
        
     	</li>
    @endif
     	
      
    </ul>
  </div>
</nav>

	@yield('content')
</main>
<div style="width: 100%" class="bg-dark p-3">
	<div style="display: flex;padding-left: 10%;padding-right: 10%;justify-content: space-around;">

		<div class="text-light text-center" style="display: flex;flex-direction: column;flex-wrap: wrap;">
			<span style="text-decoration: underline;" class="text-success">Important Links</span>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">About us</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Our Administrators</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Contracts</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Supply tender</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Bid for tender</span></small>
		</div>
		<div class="text-light" style="display: flex;flex-direction: column;">
			<span class="text-success"></span>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;"></span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Contact us today</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Rules and regulations</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Gallery</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Department</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Account issues</span></small>
				
		</div>
		<div class="text-light" style="display: flex;flex-direction: column;">
			<span class="text-success"></span>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Privacy policy</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Terms of use</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Advertise</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Our partners</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Subscribe to our newsletters</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Vacancies</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Forein inquiries</span></small>
			<small class="mt-2"><span class="text-light  link-item" style="cursor: pointer;">Related websites</span></small>
				
		</div>
		<div class="text-light" style="display: flex;flex-direction: column;">
			<span style="text-decoration: underline;" class="text-success">Our info</span>
			<small class="mt-2">
				<span class="text-light  link-item" style="cursor: pointer;">
				<i class="fas fa-envelope mr-2"></i>Kenyatenders@gmail.com
				</span>
			</small>
			<small class="mt-2">
				<span class="text-light  link-item" style="cursor: pointer;">
					<i class="fas fa-phone mr-2"></i>+254700500800
				</span>
			</small>
			<small class="mt-2">
				<span class="text-light  link-item" style="cursor: pointer;">
					<i class="fab fa-whatsapp mr-2"></i>+254797641124
				</span>
			</small>
			<small class="mt-2">
				<span class="text-light  link-item" style="cursor: pointer;">
					<i class="fab fa-twitter mr-2"></i>@kenyatenders
				</span>
			</small>
			<small class="mt-2">
				<span class="text-light  link-item" style="cursor: pointer;">
					<i class="fab fa-instagram mr-2"></i>kenyatenders
				</span>
				</small>
			<small class="mt-2">
				<span class="text-light  link-item" style="cursor: pointer;">
					<i class="fas fa-map-marker-alt mr-2"></i>PO.BOX 32522-0100
				</span>
			</small>
			
			
		</div>
	</div>
	<br><br>
	<div class="mx-auto my-auto text-light text-center">
		<span class=""><img src="storage/images/250px-Coat_of_arms_of_Kenya_(Official).png" style="width: 2%;height: 2%;">
		<span>G.O.K<i class="fas fa-flag text-success ml-2"></i></span>
		
		<span>TenderManagementSystem.co.ke &copy;<small>All Rights Reserved.</small></span>
		<img src="storage/images/250px-Coat_of_arms_of_Kenya_(Official).png" style="width: 2%;height: 2%;"></span>
		<br>
		<a style="font-size: 20px !important;" href="#top" id="gototop" class="text-light">&Delta;<span class="ml-3" id="top_detail" style="display: none;">Go to the top</span></a>
	</div>
</div>

</body>
</html>