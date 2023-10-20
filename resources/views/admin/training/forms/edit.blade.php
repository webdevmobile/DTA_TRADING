@extends('layout')

@section('title', "Modifier une formation")

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
                                    <form  action="{{ route('admin.training.forms.update', $training) }}" method="post">

                                        @csrf
                                        @method($training->id ? "PATCH" : "POST")

                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('shared.input', ['label' => 'Nom de la formation', 'name' => 'name', 'value' => $training->name])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <label for="session">Session de formation</label>
                                                <select name="session_id" id="session" class="form-control form-select border-input select">
                                                    <option value="">Selectionner la session</option>
                                                    @foreach ($sessions as $session)
                                                        <option @selected(old('session_id', $training->session_id) == $session->id) value="{{ $session->id }}">{{ $session->name }}</option>
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
