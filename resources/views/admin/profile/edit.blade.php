@extends('layout')

@section('title', 'Editez votre profil')

@section('content')
<div class="wrapper">
    <div class="main-panel">
        @include('partials.header')
        <br>
        @if (session('success'))
            <div class="btn btn-success btn-fill successBtn">
                {{ session('success') }}
            </div>
        @endif
        <div class="row profilUser">
            <div class="col-lg-4 col-md-5">
                <div class="card card-user">
                    <div class="image">
                        @if (auth()->user()->avatar)
                        <div class="avatarProfile" style="background: none; border: none;">
                            <img style="border-radius: 50%; width: 150px; height: 150px;" src="{{ asset(auth()->user()->avatarUrl()) }}" alt="{{ auth()->user()->name }}'s Profile Image" class="img-fluid">
                        </div>
                        @else
                            <div class="avatarProfile">
                                <img style="border-radius: 50%; width: 150px; height: 150px;" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ auth()->user()->name .' '. auth()->user()->subname }}" alt="">
                            </div>
                        @endif
                    </div>
                    <div class="content"><br><br><br>
                        <div class="author">
                            <h4 class="title">{{auth()->user()->name}}
                             <p href="#"><small>{{auth()->user()->subname}}</small></p>
                          </h4>
                        </div>
                        <p class="description text-center">
                            {{auth()->user()->phone}}
                        </p>
                        @if (strtolower(auth()->user()->role) === 'admin' || strtolower(auth()->user()->role) === 'secretaire')
                            <p class="description text-center">
                                {{auth()->user()->city}}
                            </p>
                        @endif
                        <p class="description text-center">
                            {{auth()->user()->country}}
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            @if (strtolower(auth()->user()->role) === 'secretaire')
                            <div class="col-md-6">
                                <h5 class="text-center" style="font-size: 15px; font-weight: 700; color: rgb(122, 122, 122);">Role<br />
                                    <small class="badge" style="background: rgb(6, 204, 138); font-size: 15px; border: none;">{{ auth()->user()->role }}</small>
                                </h5>
                            </div>
                            @endif
                            @if (strtolower(auth()->user()->role) === 'admin')
                                <div class="col-md-4">
                                    <h5 class="text-center" style="font-size: 15px; font-weight: 700; color: rgb(122, 122, 122);">Statut<br />
                                        @if (strtolower(auth()->user()->statut) === 'actif')
                                            <small class="badge" style="font-size: 15px; background: rgb(6, 204, 138); border: none;">{{ auth()->user()->statut }}</small>
                                        @elseif (strtolower(auth()->user()->statut) === 'inactif')
                                            <small class="badge" style="background: rgb(241, 3, 54); font-size: 15px; border: none;">{{ auth()->user()->statut }}</small>
                                        @endif
                                    </h5>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center" style="font-size: 15px; font-weight: 700; color: rgb(122, 122, 122);">Role<br />
                                        <small class="badge" style="font-size: 15px; background: rgb(6, 204, 138); border: none;">{{ auth()->user()->role }}</small>
                                    </h5>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center" style="font-size: 15px; font-weight: 700; color: rgb(122, 122, 122);">Trades<br />
                                        <small style="font-size: 15px; color: rgb(19, 88, 216); font-weight: 700;">{{ auth()->user()->trades()->count() }}</small>
                                    </h5>
                                </div>
                            @endif
                            @if (strtolower(auth()->user()->role) === 'user')
                                <div class="col-md-6">
                                    <h5 class="text-center" style="font-size: 15px; font-weight: 700; color: rgb(122, 122, 122);">Statut<br />
                                        @if (strtolower(auth()->user()->statut) == 'actif')
                                            <small class="badge" style="font-size: 15px; background: rgb(6, 204, 138); border: none;">{{ auth()->user()->statut }}
                                        @elseif (strtolower(auth()->user()->statut) == 'inactif')
                                            <small class="badge" style="background: rgb(241, 3, 54); font-size: 15px; border: none;">{{ auth()->user()->statut }}
                                        @endif
                                        </small>
                                    </h5>
                                </div>
                                <div class="col-md-6">
                                    <h5 class="text-center" style="font-size: 15px; font-weight: 700; color: rgb(122, 122, 122);">Trades<br /><small style="font-size: 15px; color: rgb(19, 88, 216); font-weight: 700;">{{ auth()->user()->trades()->count() }}</small></h5>
                                </div>
                            @endif
                        </div>
                        {{-- <div class="row">
                            <div class="col-md-10 col-md-offset-1">
                                <h5 class="text-center" style="color: rgb(44, 130, 241); font-size: 20px; font-weight: 700;">{{ auth()->user()->trades()->count() }}<br /><small>Trades</small></h5>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-7">
                <div class="card">
                    <div class="header">
                        <h4 class="title">@yield('title')</h4>
                    </div>
                    <div class="content">
                        <form action="{{ route('profile.update') }}" method="post" enctype="multipart/form-data">

                            @csrf
                            @method('PUT')

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="name">Nom</label>
                                        <input type="text" class="form-control border-input" id="name" name="name" disabled value="{{ old('name', auth()->user()->name) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="subname">Prenom</label>
                                        <input type="text" class="form-control border-input" placeholder="" value="{{ old('subname', auth()->user()->subname) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control border-input" placeholder="" value="{{ old('email', auth()->user()->email) }}">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Téléphone</label>
                                        <input type="text" class="form-control border-input" placeholder="" value="{{ old('phone', auth()->user()->phone) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                @if(strtolower(auth()->user()->role) === 'user')
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Pays</label>
                                            <input type="text" class="form-control border-input" placeholder="" value="{{ old('country', auth()->user()->country) }}" disabled>
                                        </div>
                                    </div>
                                @endif
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Ville</label>
                                        <input type="text" class="form-control border-input" placeholder="" value="{{ old('city', auth()->user()->city) }}" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label class="fileLabel" for="customFileInput">Selectionner une photo de profil</label>
                                        <input type="file" class="form-control border-input" name="avatar" placeholder="" value="" id="customFileInput">
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn-fill btn-wd addUser" style="width: 35%">Modifier Votre Profil</button>
                            </div>
                            {{-- <div class="clearfix"></div> --}}
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Changer mon mot de passe</h4>
                            </div>
                            <div class="content">
                                <form action="{{ route('password.update') }}" method="post">

                                    @csrf
                                    @method('POST')

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="current_password">Mot de passe actuel</label>
                                                <input type="password" class="form-control border-input" id="current_password" placeholder="Entrez votre mot de passe actuel" name="current_password">
                                                @error('current_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="new_password">Nouveau mot de passe</label>
                                                <input type="password" class="form-control border-input" id="new_password" name="new_password" placeholder="Entrez votre nouveau mot de passe">
                                                @error('new_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label for="confirm_new_password">Confirmez votre nouveau mot de passe</label>
                                                <input type="password" class="form-control border-input" id="confirm_new_password" name="confirm_new_password" placeholder="Confirmez votre mot de passe">
                                                @error('confirm_new_password')
                                                <div class="invalid-feedback">
                                                    {{ $message }}
                                                </div>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn-fill btn-wd addUser" style="width: 40%">changer mon de passe</button>
                                    </div>
                                    {{-- <div class="clearfix"></div> --}}
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
