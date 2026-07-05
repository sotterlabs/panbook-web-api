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
                <h3 class="black-text center">¿Olvidaste tu contraseña?</h3>
                <h6 class="black-text center">Ingresa tu Email para que te podamos ayudar</h6>
                <form style="padding-left: 30px; padding-right: 30px;" method="POST" action="{{ route('login') }}">
                    <br>
                    @csrf
                    <div class="block">
                        <x-jet-label for="email" value="{{ __('Email') }}" />
                        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                    </div>

                    <div class="center">
                        <button type="submit" class="blue darken-4 btn white-text">
                        {{ __('Enviar al correo') }}
                        </button>
                    </div>
                </form>
            </div>

            <div class="col s4 blue darken-4" style="height:100%"></div>
        </div>           
</body>

@endsection