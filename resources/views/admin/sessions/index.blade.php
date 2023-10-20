@extends('layout')

@php
    use Carbon\Carbon;
@endphp
@section('title', 'Sessions')

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
              <a href="{{ route('admin.sessions.forms.create') }}" class="btn-fill btn-wd addUser">ajouter</a>
              <table id="myTable" class="display">
                <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Date de debut</th>
                      <th>Date de fin</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($sessions as $session)
                      <tr>
                          <td>{{ $session->name }}</td>
                          <td>{{ Carbon::parse($session->start_date)->format('D, d/m/Y') }}</td>
                          <td>{{ Carbon::parse($session->end_date)->format('D, d/m/Y') }}</td>
                          <td>
                              <button style="background: rgb(44, 130, 241); border: none; border-radius: 5px; width: 35%;"><a class="dropdown-item" href="{{ route('admin.sessions.forms.edit', $session) }}"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-solid ti-pencil"></i></a></button>
                              <button class="openModal" data-id="{{$session->id}}" style="background: rgb(230, 18, 18); border: none; border-radius: 5px; width: 35%;"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-sharp fa-solid ti-trash"></i></button>
                                <div class="modal myModal">
                                    <div class="modal-content">
                                        <span class="close"><i class="fa-sharp fa-solid ti-close"></i></span>
                                        <h2>Voullez Vraiment Supprimer cette session ?</h2>
                                        <form action="{{ route('admin.sessions.forms.destroy', $session) }}" method="post">

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
