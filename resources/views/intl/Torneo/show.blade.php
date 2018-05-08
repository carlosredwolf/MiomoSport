@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
  <h4>{{$responseData['season']['name']}}</h4>
  <a class="nav-link" href="/intl">Regresar</a>
  <nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="intl/torneo/{{$responseData['tournament']['id']}}/equipos" role="tab" aria-controls="nav-home" aria-selected="true">Equipo</a>
    <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Posiciones</a>
    <a class="nav-item nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Partidos</a>
  </div>
</nav>
@endsection
