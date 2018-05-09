@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
  @foreach ($jornadas as $jornada)
    @foreach ($jornada as $partido)
      @if ($partido->tournament_round->type == 'group')
        {{$partido->scheduled}}--{{$partido->tournament_round->group}}--{{$partido->competitors[0]->name}}
        VS {{$partido->competitors[1]->name}}
      @else
        {{$partido->scheduled}}--{{$partido->tournament_round->name}}--{{$partido->competitors[0]->name}} 
        VS {{$partido->competitors[1]->name}}
      @endif
    @endforeach
  @endforeach
@endsection
