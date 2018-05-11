@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('container')
  <h4>{{$name}}</h4>
  <a class="nav-link" href="/am/torneo/{{$id}}">Regresar</a>
  <div class="container">
    @if ($category != 'sr:category:393' || $id == 'sr:tournament:480' || $id == 'sr:tournament:498')
      @foreach ($groups as $group)
        <table class="table">
          <thead>
            <tr>
              <th scope="col">EQUIPOS {{$name}}</th>
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
    @else
      @foreach ($groups as $group)
        <table class="table">
          <thead>
            <tr>
              @if (!empty($group->name))
                <th scope="col">GRUPO {{$group->name}}</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($group->teams as $team)
              <tr>
                <td>{{$team->name}}</td>
              </tr>
            @endforeach
              @endif
          </tbody>
        </table>
      @endforeach
    @endif
  </div>
@endsection
