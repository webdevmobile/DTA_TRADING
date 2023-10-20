@extends('layout')

@section('title', "Ajouter une session")

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
                                    <form  action="{{ route('admin.sessions.forms.store') }}" method="post">

                                        @csrf
                                        @method("POST")

                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('shared.input', ['label' => 'Nom de la session', 'name' => 'name', 'placeholder' => 'Entrez le nom de la formation'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('shared.input', ['label' => 'Date de debut de la session', 'name' => 'start_date', 'type' => 'date'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('shared.input', ['label' => 'Date de fin de la session', 'name' => 'end_date', 'type' => 'date'])
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
