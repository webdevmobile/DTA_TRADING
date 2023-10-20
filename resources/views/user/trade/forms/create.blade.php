@extends('layout')

@section('title', "Ajouter un trade")

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
                                    <form  action="{{ route('user.trade.forms.store') }}" method="post" enctype="multipart/form-data">

                                        @csrf
                                        @method($trade->id ? "PATCH" : "POST")

                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Symbol', 'name' => 'symbol', 'placeholder' => 'Entrez le symbole du trade'])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Type', 'name' => 'type', 'placeholder' => 'Entrez le type du trade'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Exit_sl', 'name' => 'exit_sl', 'placeholder' => 'Entrez exit_sl du trade'])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Exit_tp', 'name' => 'exit_tp', 'placeholder' => 'Entrez le exit_tp du trade'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Entry_point', 'name' => 'entry_point', 'placeholder' => 'Entrez le entry_point du trade'])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.textarea', ['label' => 'Raison_ent', 'name' => 'raison_ent', 'placeholder' => 'Raison_ent du trade'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.textarea', ['label' => 'Raison_exit', 'name' => 'raison_exit', 'placeholder' => 'Raison_exit du trade'])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Result', 'name' => 'result', 'placeholder' => 'Entrez le result du trade'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Montant', 'name' => 'montant', 'placeholder' => 'Entrez le montant du trade'])
                                            </div>
                                            <div class="col-md-6">
                                                @include('shared.input', ['label' => 'Lot_size', 'name' => 'lot_size', 'placeholder' => 'Entrez le lot_size du trade'])
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="fileLabel" for="customFileInput">Selectionner une image du trade</label>
                                                    <input type="file" class="form-control border-input" name="image" placeholder="" value="" id="customFileInput">
                                                </div>
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
