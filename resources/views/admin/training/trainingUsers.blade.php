@extends('layout')

@section('title', 'users')

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
                  <div class="row">
                    <div class="col-md-12">
                        <h3 style="background: rgb(44, 130, 241); padding: 15px; margin-bottom: 50px; border-radius: 10px; color: rgb(240, 235, 235);">Liste des Etudiants effectuant une formation en <span style="color: rgb(142, 247, 229); font-weight: 700; font-size: 30px;">{{ $training->name }}</span></h3>
                    </div>
                  </div>
              <table id="myTable" class="display">
                <thead>
                    <tr>
                      <th>Nom de L'etudaint</th>
                      <th>Prenom</th>
                      <th>Email</th>
                      <th>Telephone</th>
                      <th>Statut</th>
                      <th>Pays</th>
                      <th>Ville</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($trainingUsers as $trainingUser)
                      <tr>
                          <td>{{ $trainingUser->name }}</td>
                          <td>{{ $trainingUser->subname }}</td>
                          <td>{{ $trainingUser->email }}</td>
                          {{-- <td>{{ \Crypt::decrypt($user->password) }}</td> --}}
                          <td>{{ $trainingUser->phone }}</td>
                          @if(strtolower($trainingUser->statut) == 'actif')
                            <td class="badge" style="background: rgb(6, 204, 138); margin: 5px 0 0 10px; border: none;">{{ $trainingUser->statut }}</td>
                          @elseif (strtolower($trainingUser->statut) == 'inactif')
                            <td class="badge" style="background: rgb(241, 3, 54); margin: 5px 0 0 10px; border: none;">{{ $trainingUser->statut }}</td>
                          @endif
                          <td>{{ $trainingUser->country }}</td>
                          <td>{{ $trainingUser->city }}</td>
                        </tr>
                      @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
