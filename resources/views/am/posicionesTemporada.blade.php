@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
  <h4>{{$name}}</h4>
  <a class="nav-link" href="/am/torneo/{{$id}}/posiciones">Regresar</a>
  <div class="container">
    <table class="table">
    <thead>
      <tr>
        <th scope="col">POSICIONES {{$name}}</th>
      </tr>
      <tr>
        <th scope="col">{{strtoupper($temporada)}}</th>
      </tr>
      <tr>
        <th scope="col">Equipo</th>
        <th scope="col">JJ</th>
        <th scope="col">JG</th>
        <th scope="col">JE</th>
        <th scope="col">JP</th>
        <th scope="col">GF</th>
        <th scope="col">GC</th>
        <th scope="col">DIFF</th>
        <th scope="col">PTS</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($season->team_standings as $team)
        <tr>
          <td>{{$team->team->name}}</td>
          <td>{{$team->played}}</td>
          <td>{{$team->win}}</td>
          <td>{{$team->draw}}</td>
          <td>{{$team->loss}}</td>
          <td>{{$team->goals_for}}</td>
          <td>{{$team->goals_against}}</td>
          <td>{{$team->goal_diff}}</td>
          <td>{{$team->points}}</td>
        </tr>
      @endforeach
    </tbody>
  </table>
  </div>
@endsection
