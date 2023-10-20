@php
    use App\models\User;
@endphp

@extends('layout')

@section('title', "Ajouter un personal")

@section('content')
    <div class="wrapper">
        <div class="main-panel">
	    	@include('partials.header')

            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12 col-md-7">
                            <div class="card">
                                <div class="header">
                                    <h4 class="title">@yield('title')</h4>
                                </div>
                                <div class="content">
                                    <form  action="{{ route('admin.personal.forms.store', $personal) }}" method="post">

                                        @csrf
                                        @method("POST")

                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'nom', 'name' => 'name', 'placeholder' => 'Entrez le nom du personnel'])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'prenom', 'name' => 'subname', 'placeholder' => 'Entrez le prenom du personnel'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Adresse email', 'name' => 'email', 'type' => 'email', 'placeholder' => 'Entrez l\'email du personnel'])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Mot de passe', 'name' => 'password', 'type' => 'password', 'placeholder' => 'Entrez le mot de passe du personnel'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Téléphone', 'name' => 'phone', 'placeholder' => 'Téléphone du personnel'])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Ville', 'name' => 'city', 'placeholder' => 'Ville du personnel'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="role">Role</label>
                                                <select name="role" id="role" class="form-control form-select border-input select">
                                                    <option value="">Selectionner le role</option>
                                                    <option value="Admin" {{ old('role') === 'Admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="Secretaire" {{ old('role') === 'Secretaire' ? 'selected' : '' }}>Secretaire</option>
                                                    {{-- <option value="User" {{ old('role') === 'User' ? 'selected' : '' }}>User</option> --}}
                                                </select>
                                                @error('role')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn-fill btn-wd addUser" style="width: 30%">
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
        </div>
    </div>
@endsection
