@extends('layout')

@section('title', 'Personnels')

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
              <a href="{{ route('admin.personal.forms.create') }}" class="btn-fill btn-wd addUser">ajouter</a>
              <table id="myTable" class="display">
                <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Email</th>
                      <th>Telephone</th>
                      <th>Role</th>
                      <th>Ville</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($personals as $personal)
                      <tr>
                          <td>{{ $personal->name }}</td>
                          <td>{{ $personal->subname }}</td>
                          <td>{{ $personal->email }}</td>
                          {{-- <td>{{ \Crypt::decrypt($user->password) }}</td> --}}
                          <td>{{ $personal->phone }}</td>
                          <td class="badge" style="background: rgb(6, 204, 138); margin: 15px 0 0 10px; border: none;">{{ $personal->role }}</td>
                          <td>{{ $personal->city }}</td>
                          <td>
                              <button style="background: rgb(44, 130, 241); border: none; border-radius: 5px; width: 35%;"><a class="dropdown-item" href="{{ route('admin.personal.forms.edit', $personal) }}"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-solid ti-pencil"></i></a></button>
                              <button class="openModal" data-id="{{$personal}}" style="background: rgb(230, 18, 18); border: none; border-radius: 5px; width: 35%;"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-sharp fa-solid ti-trash"></i></button>
                                <div class="modal myModal">
                                    <div class="modal-content">
                                        <span class="close"><i class="fa-sharp fa-solid ti-close"></i></span>
                                        <h2>Voullez Vraiment Supprimer ce personnel ?</h2>
                                        <form action="{{ route('admin.personal.forms.destroy', $personal) }}" method="post">

                                            @csrf

                                            @method("DELETE")
                                            @dump($personal)

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
