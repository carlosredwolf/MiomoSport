@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
  <h4>{{session('nombreTorneo')}}</h4>
  <a class="nav-link" href="/eu/torneo/{{$id}}">Regresar</a>
  <div class="container">
    @if (count($result)>0)
      <table class="table table-hover">
      <thead>
        <tr>
          @if ($category == 'sr:category:393')
            <th scope="col">Grupo / Ronda</th>
          @else
            <th scope="col">Jornada</th>
          @endif
          <th scope="col">Local</th>
          <th scope="col">Resultado</th>
          <th scope="col">Visitante</th>
          <th scope="col">Estadio</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($result as $resultado)
          <tr>
            <th scope="row">
              @if ($resultado->sport_event->tournament_round->type == 'group')
                @if ($category == 'sr:category:393')
                  {{$resultado->sport_event->tournament_round->group}}
                @else
                  {{$resultado->sport_event->tournament_round->number}}
                @endif
              @else
                {{$resultado->sport_event->tournament_round->name}}
              @endif
            </th>
            <td>{{$resultado->sport_event->competitors[0]->name}}</td>
            @if (isset($resultado->sport_event_status->home_score))
                <td>{{$resultado->sport_event_status->home_score}} - {{$resultado->sport_event_status->away_score}}</td>
            @else
                <td>{{$resultado->sport_event_status->status}}</td>
            @endif
            <td>{{$resultado->sport_event->competitors[1]->name}}</td>
            <td>{{$resultado->sport_event->venue->name}}</td>
            {{-- <td>{{$resultado->sport_event->venue->name}}</td> --}}
          </tr>
        @endforeach
      </tbody>
    </table>
    @else
      <h1>AUN NO HAY RESULTADOS PARA ESTE EVENTO</HAY></h1>
    @endif
  </div>
@endsection
