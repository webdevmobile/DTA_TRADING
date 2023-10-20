@extends('layout')

@section('title', "Modifier un utilisateur")

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
                                    <form  action="{{ route('admin.users.forms.update', $user) }}" method="post">

                                        @csrf
                                        @method($user->id ? "PATCH" : "POST")

                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'nom', 'name' => 'name', 'placeholder' => 'Entrez le nom de l\'utilisateur', 'value' => $user->name])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'prenom', 'name' => 'subname', 'placeholder' => 'Entrez le prenom de l\'utilisateur', 'value' => $user->subname])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Téléphone', 'name' => 'phone', 'placeholder' => 'Téléphone de  l\'utilisateur', 'value' => $user->phone])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Pays', 'name' => 'country', 'placeholder' => 'Pays de  l\'utilisateur', 'value' => $user->country])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Ville', 'name' => 'city', 'placeholder' => 'Ville de  l\'utilisateur', 'value' => $user->city])
                                            </div>
                                            <div class="col-md-6">
                                                <label for="statut">Statut</label>
                                                <select name="statut" id="statut" class="form-control form-select border-input select">
                                                    <option value="Actif" {{ old('statut', $user->statut) === 'Actif' ? 'selected' : '' }}>Actif</option>
                                                    <option value="Inactif" {{ old('statut', $user->statut) === 'Inactif' ? 'selected' : '' }}>Inactif</option>
                                                </select>
                                                @error('statut')
                                                    <div class="invalid-feedback">
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                {{-- @include('shared.select', ['label' => 'Session de formation', 'name' => 'sessions[]', 'datas' => $sessions, 'value' => $user->sessions()->pluck('id'), 'multiple' => true]) --}}
                                                @include('shared.select', ['label' => 'Formations', 'name' => 'trainings', 'datas' => $trainings, 'multiple' => true])
                                            </div>
                                            <div class="col-md-6">
                                                <label for="session">Session de formation</label>
                                                <select name="session_id" id="session" class="form-control form-select border-input select">
                                                    <option value="">Selectionner la session</option>
                                                    @foreach ($sessions as $session)
                                                        <option @selected(old('session_id', $user->session_id) == $session->id) value="{{ $session->id }}">{{ $session->name }}</option>
                                                        {{-- <option @selected(old('category_id', $user->category_id) == $category->id) value="{{ $data->id }}">{{ $data->name }}</option> --}}
                                                    @endforeach
                                                </select>
                                                @error('session_id')
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
