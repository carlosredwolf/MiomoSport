@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
  <h4>{{session('nombreTorneo')}}</h4>
  <a class="nav-link" href="/eu/torneo/{{$id}}">Regresar</a>
  <div class="container">
  @foreach ($jornadas as $jornada)
    <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">
        @if ($jornada[0]->tournament_round->type == 'group')
          Jornada  {{$jornada[0]->tournament_round->number}}
        @else
          Fase Final
        @endif
      </th>
    </tr>
    <tr>
      <th scope="col">
        @if ($jornada[0]->tournament_round->type == 'group')
          @if ($category == 'sr:category:393')
            Grupo
          @else
            Jornada
          @endif
        @else
          Ronda
        @endif
      </th>
      <th scope="col">Local</th>
      <th scope="col">Visitante</th>
      <th scope="col">Estadio</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($jornada as $partido)
      <tr>
        <th scope="row">
          @if ($partido->tournament_round->type == 'group')
            @if ($category == 'sr:category:393')
              {{$partido->tournament_round->group}}
            @else
              {{$partido->tournament_round->number}}
            @endif
          @else
            {{$partido->tournament_round->name}}
          @endif
        </th>
        <td>{{$partido->competitors[0]->name}}</td>
        <td>{{$partido->competitors[1]->name}}</td>
        <td>{{$partido->venue->name}}</td>
      </tr>
    @endforeach
  </tbody>
</table>
  @endforeach
  </div>
@endsection
