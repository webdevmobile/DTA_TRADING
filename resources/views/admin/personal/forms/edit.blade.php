@extends('layout')

@section('title', "Modifier un personnel")

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
                                    <form  action="{{ route('admin.personal.forms.update', $personal) }}" method="post">

                                        @csrf
                                        @method($personal->id ? "PATCH" : "POST")

                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'nom', 'name' => 'name', 'placeholder' => 'Entrez le nom de l\'utilisateur', 'value' => $personal->name])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'prenom', 'name' => 'subname', 'placeholder' => 'Entrez le prenom de l\'utilisateur', 'value' => $personal->subname])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Téléphone', 'name' => 'phone', 'placeholder' => 'Téléphone de  l\'utilisateur', 'value' => $personal->phone])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Ville', 'name' => 'city', 'placeholder' => 'Ville de  l\'utilisateur', 'value' => $personal->city])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="role">Role</label>
                                                <select name="role" id="role" class="form-control form-select border-input select">
                                                    <option value="Admin" {{ old('role', $personal->role) === 'Admin' ? 'selected' : '' }}>Admin</option>
                                                    <option value="Secretaire" {{ old('role', $personal->role) === 'Secretaire' ? 'selected' : '' }}>Secretaire</option>
                                                    {{-- @foreach ($sessions as $session)
                                                        <option @selected(old('session_id', $user->session_id) == $session->id) value="{{ $session->id }}">{{ $session->name }}</option>
                                                        {{-- <option @selected(old('category_id', $user->category_id) == $category->id) value="{{ $data->id }}">{{ $data->name }}</option> --}}
                                                    {{-- @endforeach  --}}
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
