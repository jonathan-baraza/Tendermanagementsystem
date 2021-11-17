<!DOCTYPE html>
<html>
<head>
    <x-links/>
    <title>Registration Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        *{
            margin:0px;
            padding:0px;

        }
    </style>
</head>
<body class="p-3" style="background-image: url('storage/images/Nairobi-Night-skyline-1-reduced.jpg');background-repeat: no-repeat;background-position: center;background-size: cover;display: flex;justify-content: center;align-items: center;flex-direction: column;">
<form method="POST" action="{{ route('register') }}" class="col-sm-5 bg-light p-5 mt-3 rounded">
    <center><b style="">THE TENDER MANAGEMENT SYSTEM.</b></center>
    <center>
        <img  src="storage/images/250px-Coat_of_arms_of_Kenya_(Official).png" class=" mt-1" style="height: 100px;width: 100px;">
    </center>
        
            @csrf
            <center><div class="mt-3" style="font-weight: bolder;">Applicant registration <i class="fas fa-hand-receiving ml-2"></i></div></center>
            <x-jet-validation-errors class="mb-3 text-danger" />
            <input type="hidden" name="role" value="applicant">
            <input type="hidden" name="status" value="active">
            <div class="mt-3 form-group" >
               <i class="fa fa-user "></i> <x-jet-label style="" for="name" value="{{ __('Name') }}" />
                <x-jet-input id="name" class="form-control block  w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-3 form-group" >
                <i class="fa fa-envelope mr-1"></i><x-jet-label style="" for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control block  w-full" type="email" name="email" :value="old('email')" required />
            </div>
            <div class="mt-3 form-group" >
                <i class="fa fa-id-card mr-1"></i><x-jet-label style="" for="national_id" value="{{ __('National ID') }}"/>
                <x-jet-input id="national_id" class="form-control block  w-full" type="string" name="national_id" required />
            </div>

            <div class="mt-3 form-group" >
                <i class="fa fa-lock mr-1"></i><x-jet-label style="" for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control block  w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-3 form-group" >
                <i class="fa fa-lock mr-1"></i><x-jet-label style="" for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-jet-input id="password_confirmation" class="form-control block  w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-jet-button class="ml-4 btn btn-success float-right">
                    {{ __('Register') }}
                </x-jet-button>
            </div>
        </form>
   
</body>
</html>
  

       

        