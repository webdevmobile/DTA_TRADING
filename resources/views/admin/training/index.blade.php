@extends('layout')

@section('title', 'Formations')

@section('content')
    <div class="wrapper">
        <div class="main-panel">

    		@include('partials.header')

            <div class="content">
                {{-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Library</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                  </nav> --}}
                @if (session('success'))
                  <div class="btn btn-success btn-fill successBtn">
                      {{ session('success') }}
                  </div>
              @endif
              <a href="{{ route('admin.training.forms.create') }}" class="btn-fill btn-wd addUser">ajouter</a>
              <table id="myTable" class="display">
                <thead>
                    <tr>
                      <th>Nom de la formation</th>
                      <th>Session de la formation</th>
                      <th>Nombre d'Etudiants</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($trainings as $training)
                      <tr>
                          <td>{{ $training->name }}</td>
                          {{-- @dd($training->session) --}}
                          <td>{{ $training->session?->name }}</td>
                          <td>
                            <button style="background: rgb(44, 130, 241); border: none; border-radius: 50%; width: 15%;" class="btn btn-sm btn-primary btn-icon"><a href="{{ route('admin.training.trainingUsers', $training) }}" style="color: white;">{{ $training->users()->where('role', 'user')->count() }}</a></button>
                          </td>
                          <td>
                            @can('update', $training)
                                <button style="background: rgb(44, 130, 241); border: none; border-radius: 5px; width: 35%;"><a class="dropdown-item" href="{{ route('admin.training.forms.edit', $training) }}"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-solid ti-pencil"></i></a></button>
                            @endcan
                              <button class="openModal" data-id="{{$training->id}}" style="background: rgb(230, 18, 18); border: none; border-radius: 5px; width: 35%;"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-sharp fa-solid ti-trash"></i></button>
                                <div class="modal myModal">
                                    <div class="modal-content">
                                        <span class="close"><i class="fa-sharp fa-solid ti-close"></i></span>
                                        <h2>Voullez Vraiment Supprimer cette formation ?</h2>
                                        <form action="{{ route('admin.training.forms.destroy', $training) }}" method="post">

                                            @csrf

                                            @method("DELETE")
                                            {{-- @dump($user) --}}

                                            <button type="submit"><i class="fa-sharp fa-solid ti-trash"></i>Supprimer</button>
                                        </form>
                                    </div>
                                </div>
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
