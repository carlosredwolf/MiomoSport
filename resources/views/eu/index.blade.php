@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
    <h1>TORNEOS EUROPEOS</h1>
    <a class="nav-link" href="/">Regresar</a>
    <ul class="list-group">
    @foreach ($result as $torneo)
      <li class="list-group-item"><a href="eu/torneo/{{$torneo->id}}">{{$torneo->name}}</a></li>
    @endforeach
    </ul>
@endsection
