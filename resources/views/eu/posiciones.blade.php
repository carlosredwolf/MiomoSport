@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
  <h4>{{$name}}</h4>
  <a class="nav-link" href="/eu/torneo/{{$id}}">Regresar</a>
  <div class="container">
    @foreach ($standings as $standing)
      @if ($standing->type  == 'total')
        @foreach ($standing->groups as $group)
          <table class="table">
          <thead>
            <tr>
              <th scope="col">GRUPO {{$group->name}}</th>
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
            @foreach ($group->team_standings as $team)
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
        @endforeach
      @endif
    @endforeach
  </div>
@endsection
