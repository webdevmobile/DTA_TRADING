@extends('auth.layout_auth')

@section('title', 'Statut est Inactif')

@section('content')

        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5 col-md-7">
                        <div class="card contentLogin">
                            {{-- <div class="logoLogin"> --}}
                                <img src="{{ asset('img/DTALOGO.png') }}" alt="logo" class="logoLogin">
                            {{-- </div> --}}
                            <div class="header">
                                <h4 style="color: rgb(230, 67, 67);" class="title text-center">Votre @yield('title')</h4>
                            </div>
                            <div class="content">
                                <h3 style="text-align: center; color: rgb(124, 123, 123);">Veillez Contacter l'administrateur car vous n'est pas encore actif pour trader</h3>
                                <a style="font-size: 20px; color: rgb(27, 141, 218); text-decoration: underline;" href="{{ route('auth.login') }}">Connexion</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
