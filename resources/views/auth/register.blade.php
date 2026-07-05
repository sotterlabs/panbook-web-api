@extends('layouts.header')

@section('title','Registro')

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
            <img  id="logo" width="50%" src="{{asset('images/logo.png')}}">
            <h6 class="blue-text  center">Registrate con nosotros! te damos dos semanas gratis</h6 class="blue-text text-lighten-3 center">

            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div>
                    <x-jet-label for="name" value="{{ __('Nombre') }}" />
                    <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                </div>
                <div>
                    <x-jet-label for="apellidos" value="{{ __('Apellidos') }}" />
                    <x-jet-input id="apelldidos" class="block mt-1 w-full" type="text" name="apellidos" :value="old('apellidos')" required autofocus autocomplete="apellidos" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="email" value="{{ __('Email') }}" />
                    <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
                </div>
                <div class="mt-4">
                    <x-jet-label for="password" value="{{ __('Password') }}" />
                    <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
                </div>
                <div class="mt-4">
                    <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                    <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
                </div>
                <div class="col s12">
                    <p>
                        <label>
                            <input type="checkbox" required/>
                            <span>Acepto los <a target="_blank" href="{{asset('pdf/terminos_y_condiciones.pdf')}}">Términos y condiciones</a> de la contratación de este servicio</span>
                        </label>
                    </p>
                </div>

                <div class="flex items-center justify-end mt-4">
                    <div class="col s12">
                        <br><br>
                        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                        {{ __('Ya estas registrado?') }}
                        </a>
                    </div>

                    <button class="btn waves-effect blue darken-4 right" type="submit" name="action" id="boton">{{ __('Registrarse') }}
                            <i class="material-icons right">send</i>                            
                        </button><br><br><br><br><br>
                </div>
            </form>
        </div>
        <div class="col s4 blue darken-4" style="height:100%">
        </div>
    </div>
    

</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1/jquery.min.js"></script>
@endsection