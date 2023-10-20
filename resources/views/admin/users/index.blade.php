@php
    use App\models\User;
@endphp
@extends('layout')

@section('title', 'Utilisateurs')

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
              <a href="{{ route('admin.users.forms.create') }}" class="btn-fill btn-wd addUser">ajouter</a>
              <table id="myTable" class="display">
                <thead>
                    <tr>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Email</th>
                      <th>Telephone</th>
                      <th>Statut</th>
                      <th>Pays</th>
                      <th>Ville</th>
                      @can('view', $user?? new User())
                        <th>Trades</th>
                      @endcan
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($users as $user)
                      <tr>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->subname }}</td>
                          <td>{{ $user->email }}</td>
                          {{-- <td>{{ \Crypt::decrypt($user->password) }}</td> --}}
                          <td>{{ $user->phone }}</td>
                          @if(strtolower($user->statut) == 'actif')
                            <td class="badge" style="background: rgb(6, 204, 138); margin: 15px 0 0 10px; border: none;">{{ $user->statut }}</td>
                          @elseif (strtolower($user->statut) == 'inactif')
                            <td class="badge" style="background: rgb(241, 3, 54); margin: 15px 0 0 10px; border: none;">{{ $user->statut }}</td>
                          @endif
                          <td>{{ $user->country }}</td>
                          <td>{{ $user->city }}</td>
                          @can('view', $user)
                            <td>
                              <div class="">
                                  <a href="{{ route('admin.users.trade', $user) }}"><button class="btn btn-sm btn-primary btn-icon btnTrade">{{ $user->trades->count() }}</button></a>
                              </div>
                            </td>
                          @endcan
                          <td style="display: flex; width: 100%; justify-content: space-evenly;">
                              <button style="background: rgb(44, 130, 241); border: none; border-radius: 5px; width: 30%;"><a class="dropdown-item" href="{{ route('admin.users.forms.edit', $user) }}"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-solid ti-pencil"></i></a></button>
                              @can('delete', $user)
                                <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">

                                    @csrf

                                    @method('DELETE')
                                    <button data-id="" style="background: rgb(230, 18, 18); border: none; border-radius: 5px; width: 100%;"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-sharp fa-solid ti-trash"></i></button>

                                </form>
                                {{-- <div class="modal myModal">
                                    <div class="modal-content">
                                        <span class="close"><i class="fa-sharp fa-solid ti-close"></i></span>
                                        <h2>Voullez Vraiment Supprimer cet utilisateur ?</h2>
                                        <form action="{{ route('admin.users.destroy', $user->id) }}" method="post">

                                            @csrf

                                            @method('DELETE')
                                            @dump($user->id)

                                            <button type="submit"><i class="fa-sharp fa-solid ti-trash"></i>Supprimer</button>
                                        </form>
                                    </div>
                                </div> --}}
                              @endcan
                          </td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
