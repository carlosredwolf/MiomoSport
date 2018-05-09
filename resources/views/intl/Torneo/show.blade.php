@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
  <h4>{{$name}}</h4>
  <a class="nav-link" href="/intl">Regresar</a>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="/intl/torneo/{{$id}}/equipos">Equipos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/intl/torneo/{{$id}}/posiciones">Posiciones</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/intl/torneo/{{$id}}/partidos">Partidos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Resultados</a>
      </li>
    </ul>
  </div>
</nav>
@endsection
