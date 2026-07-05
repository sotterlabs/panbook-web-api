@extends('layouts.header')

@section('title', 'Login')

@section('content')
<style type="text/css">
    #logo{
        display: block;
        margin: auto;
        padding: auto;
    }
</style>
<body>
        
        <div class="row">
            <div class="col s4 blue darken-4" style="height:100%">
            </div>

            <div class="col s4">
                <br><br><br><br>
                <img  id="logo" width="50%" src="{{asset('images/logo.png')}}">
                <form style="padding-left: 30px; padding-right: 30px;" method="POST" action="{{ route('login') }}">
                    <br>
                    @csrf
                    <div>
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>
                    <div class="mt-4">
                        <x-jet-label for="password" value="{{ __('Password') }}" />
                        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                    </div>
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <x-jet-checkbox id="remember_me" name="remember" />
                            <span class="ml-2 text-sm text-gray-600">{{ __('Recordar cuenta') }}</span>
                        </label>
                    </div>
                    <div class="flex items-center justify-end mt-4">
                        @if (Route::has('password.request'))
                            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                            {{ __('Olvidaste tu contraseña?') }}
                            </a>
                        @endif
                        <button class="btn waves-effect blue darken-4 right" type="submit" name="action" id="boton">{{ __('Log in') }}
                            <i class="material-icons right">send</i>                            
                        </button><br><br><br><br><br>
                        
                    </div>
                </form>
            </div>

            <div class="col s4 blue darken-4" style="height:100%"></div>
            </div>           
        </div>
</body>

@endsection