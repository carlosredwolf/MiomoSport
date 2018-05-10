@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('navegador')
  <h4>{{$name}}</h4>
  <a class="nav-link" href="/am/torneo/{{$id}}">Regresar</a>
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link" href="/am/torneo/{{$id}}/posiciones/{{$temporada = 'apertura'}}">Apertura</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="/am/torneo/{{$id}}/posiciones/{{$temporada = 'clausura'}}">Clausura</a>
  </li>
</ul>
@endsection
@section('content')
  
@endsection
