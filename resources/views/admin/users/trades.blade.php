@php
    use Carbon\Carbon;
@endphp
@extends('layout')

@section('title', 'Trades de l\'utilisateur ' .$user->name)

@section('content')
<div class="wrapper">
    <div class="main-panel">
        @include('partials.header')
        <br>
        {{-- @if (session('success'))
            <div class="btn btn-success btn-fill successBtn">
                {{ session('success') }}
            </div>
        @endif --}}
        <div class="row profilUser">
            <div class="col-lg-3 col-md-12">
                <div class="card card-user">
                    <div class="image">
                        @if ($user->avatar)
                        <div class="avatarProfile" style="background: none; border: none;">
                            <img style="border-radius: 50%; width: 150px; height: 150px;" src="{{ asset($user->avatarUrl()) }}" alt="{{ $user->name }}'s Profile Image" class="img-fluid">
                        </div>
                        @else
                            <div class="avatarProfile">
                                <img style="border-radius: 50%; width: 150px; height: 150px;" src="https://ui-avatars.com/api/?background=0D8ABC&color=fff&name={{ $user->name .' '. $user->subname }}" alt="">
                            </div>
                        @endif
                    </div>
                    <div class="content"><br><br><br>
                        <div class="author">
                            <h4 class="title">{{$user->name}}<br />
                             <a href="#"><small>{{$user->subname}}</small></a>
                          </h4>
                        </div>
                        <p class="description text-center">
                            {{$user->phone}}
                        </p>
                        <p class="description text-center">
                            {{$user->country}}
                        </p>
                    </div>
                    <hr>
                    <div class="text-center">
                        <div class="row">
                            <div class="col-md-6">
                                <h5 class="text-center" style="font-size: 15px; font-weight: 700; color: rgb(122, 122, 122);">Statut<br />
                                    @if (strtolower($user->statut) == 'actif')
                                        <small class="badge" style="font-size: 15px; background: rgb(6, 204, 138); border: none;">{{ $user->statut }}
                                    @elseif (strtolower($user->statut) == 'inactif')
                                        <small class="badge" style="background: rgb(241, 3, 54); font-size: 15px; border: none;">{{ $user->statut }}
                                    @endif
                                    </small>
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <h5 class="text-center" style="font-size: 15px; font-weight: 700; color: rgb(122, 122, 122);">Trades<br /><small style="font-size: 15px; color: rgb(19, 88, 216); font-weight: 700;">{{ $trades->count() }}</small></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="card">
                    <div class="header">
                        <h4 class="title">@yield('title')</h4>
                    </div>
                    <div class="content">
                        <table id="myTable" class="display">
                            <thead>
                                <tr>
                                  <th>Image</th>
                                  <th>Symbol</th>
                                  <th>Type</th>
                                  <th>Entry_Point</th>
                                  <th>Exit_sl</th>
                                  <th>Exit_tp</th>
                                  <th>Date</th>
                                  <th>Voir</th>
                                </tr>
                              </thead>
                              <tbody>
                                  @foreach ($trades as $trade)
                                  <tr>
                                      <td><img style="border-radius: 50%; width: 40px; height: 40px;" src="{{ $trade->imageUrl() }}" alt="Image du trade" class=""></td>
                                      <td>{{ $trade->symbol }}</td>
                                      <td>{{ $trade->type }}</td>
                                      {{-- <td>{{ \Crypt::decrypt($user->password) }}</td> --}}
                                      <td>{{ $trade->entry_point }}</td>
                                      <td>{{ $trade->exit_sl }}</td>
                                      <td>{{ $trade->exit_tp }}</td>
                                      <td style="font-size: 12px;">Posté le: {{ Carbon::parse($trade->created_at)->format('D, d/m/Y H:i:s') }}</td>
                                      <td>
                                        <button class="openModal" data-id="{{$trade->id}}" style="background: none; border: none; border-radius: 5px; width: 35%;"><i style="color: rgb(44, 130, 241);" class="fa-solid ti-eye"></i></button>
                                          <div class="modal myModal">
                                              <div class="modal-content" style="width: 100%; transform: scale(1);">
                                                  <span class="close"><i class="fa-sharp fa-solid ti-close"></i></span>
                                                  <h2>Trade de {{ $user->name .' '. $user->subname }}</h2>
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
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                          <tr>
                                                              <td><img style="border-radius: 50%; width: 40px; height: 40px;" src="{{ $trade->imageUrl() }}" alt="Image du trade"></td>
                                                              <td>{{ $trade->symbol }}</td>
                                                              <td>{{ $trade->type }}</td>
                                                              {{-- <td>{{ \Crypt::decrypt($user->password) }}</td> --}}
                                                              <td>{{ $trade->entry_point }}</td>
                                                              <td>{{ $trade->exit_sl }}</td>
                                                              <td>{{ $trade->exit_tp }}</td>
                                                              <td>{{ $trade->raison_ent }}</td>
                                                              <td>{{ $trade->raison_exit }}</td>
                                                              <td>{{ $trade->result }}</td>
                                                              <td>{{ $trade->montant }}</td>
                                                              <td>{{ $trade->lot_size }}</td>
                                                              {{-- <td style="font-size: 12px;">Posté le: {{ Carbon::parse($trade->created_at)->format('D, d/m/Y H:i:s') }}</td> --}}
                                                            </tr>
                                                      </tbody>
                                                </table>
                                              </div>
                                          </div>
                                    </td>
                                      {{-- <td>{{ $trade->result }}</td>
                                      <td>{{ number_format($trade->montant, thousands_separator: ' ') }}</td>
                                      <td>{{ $trade->lot_size }}</td> --}}
                                      {{-- <td style="font-size: 12px;">Posté le: {{ Carbon::parse($trade->created_at)->format('D, d/m/Y H:i:s') }}</td> --}}
                                    </tr>
                                  @endforeach
                              </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    </div>
</div>
@endsection
