@extends('layout')

@section('title', 'Trades')

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
              <a href="{{ route('user.trade.forms.create') }}" class="btn-fill btn-wd addUser">ajouter</a>
              <table id="myTable" class="display">
                <thead>
                    <tr>
                      <th>Image</th>
                      <th>Symbol</th>
                      <th>Type</th>
                      <th>Entry_Point</th>
                      <th>Exit_sl</th>
                      <th>Exit_tp</th>
                      <th>Raison_ent</th>
                      <th>Raison_exit</th>
                      <th>Result</th>
                      <th>Montant</th>
                      <th>Lot_size</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                      @foreach ($trades as $trade)
                      <tr>
                          <td>
                            <img id="user-thumbnail" style="border-radius: 50%; width: 40px; height: 40px;" src="{{ $trade->imageUrl() }}" alt="Image du trade" class="">
                            <div id="image-modal" style="display: none;">
                                <img id="full-image" src="" alt="Image en entier">
                                <button onclick="closeModal()">Fermer</button>
                            </div>
                          </td>
                          <td>{{ $trade->symbol }}</td>
                          <td>{{ $trade->type }}</td>
                          {{-- <td>{{ \Crypt::decrypt($user->password) }}</td> --}}
                          <td>{{ $trade->entry_point }}</td>
                          <td>{{ $trade->exit_sl }}</td>
                          <td>{{ $trade->exit_tp }}</td>
                          <td>{{ $trade->raison_ent }}</td>
                          <td>{{ $trade->raison_exit }}</td>
                          <td>{{ $trade->result }}</td>
                          <td>{{ number_format($trade->montant, thousands_separator: ' ') }}</td>
                          <td>{{ $trade->lot_size }}</td>
                          <td>
                              <button style="background: rgb(44, 130, 241); border: none; border-radius: 5px; width: 35%;"><a class="dropdown-item" href="{{ route('user.trade.forms.edit', $trade) }}"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-solid ti-pencil"></i></a></button>
                              <button class="openModal" data-id="{{$trade->id}}" style="background: rgb(230, 18, 18); border: none; border-radius: 5px; width: 35%;"><i style="color: rgb(243, 243, 243); font-size: 20px;" class="fa-sharp fa-solid ti-trash"></i></button>
                                <div class="modal myModal">
                                    <div class="modal-content">
                                        <span class="close"><i class="fa-sharp fa-solid ti-close"></i></span>
                                        <h2>Voullez Vraiment Supprimer ce trade ?</h2>
                                        <form action="{{ route('user.trade.forms.destroy', $trade) }}" method="post">

                                            @csrf

                                            @method("DELETE")

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
