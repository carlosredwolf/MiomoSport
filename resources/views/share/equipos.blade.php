@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
  <h4>{{$name}}</h4>
  <a class="nav-link" href="/intl/torneo/{{$id}}">Regresar</a>
  <div class="container">
    @foreach ($groups as $group)
      <table class="table">
      <thead>
        <tr>
          <th scope="col">GRUPO {{$group->name}}</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($group->teams as $team)
          <tr>
            <td>{{$team->name}}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @endforeach
  </div>
@endsection
