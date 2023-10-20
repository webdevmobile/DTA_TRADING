@extends('auth.layout_auth')

@section('title', 'Connexion')

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
                                <h4 class="title text-center">@yield('title')</h4>
                            </div>
                            <div class="content">
                                <form  action="{{ route('auth.login') }}" method="post">

                                    @csrf

                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('shared.input', ['label' => 'Email', 'name' => 'email', 'type' => 'email', 'placeholder' => 'Entrez votre email'])
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('shared.input', ['label' => 'Mot de passe', 'name' => 'password', 'type' => 'password', 'placeholder' => 'Entrez votre mot de passe'])
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn-fill btn-wd addUser">
                                            @yield('title')
                                        </button>
                                    </div>
                                    <div class="clearfix"></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
