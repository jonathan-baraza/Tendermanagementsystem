<!DOCTYPE html>
<html>
<head>
    <x-links/>
    <title>Login Page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style type="text/css">
        *{
            margin:0px;
            padding:0px;
        }
    </style>
</head>
<body class="p-3" style="background-image: url('storage/images/Muturi-Kanini-2-reduced-1.jpg');background-repeat: no-repeat;background-position: center;background-size: cover;display: flex;justify-content: center;align-items: center;flex-direction: column;">

        <form method="POST" action="{{ route('login') }}" class="col-sm-5 bg-light p-5 mt-3 rounded">
            <center><b style="">THE TENDER MANAGEMENT SYSTEM.</b></center>
            <center>
                <img  src="storage/images/250px-Coat_of_arms_of_Kenya_(Official).png" class=" mt-1" style="height: 100px;width: 100px;">
            </center>
           <center class="mt-2"><span><b>Login Here</b></span></center>

        <x-jet-validation-errors class="mb-3 text-danger" />
            @csrf

            <div class="4mt- from-group">
                <i class="fa fa-envelope mr-1"></i><x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="form-control block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4 from-group">
                <i class="fa fa-lock mr-1"></i><x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="form-control block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <input id="remember_me" type="checkbox" class="form-checkbox" name="remember">
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4 btn btn-success">
                    {{ __('Login') }}
                </x-jet-button>
            </div>
            <br>
            <small>You dont have an account? <a href="/register"><i class="text-primary">Go back and create account</i></a></small>
        </form>
</body>
 </html>