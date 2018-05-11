@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
    <h1>TORNEOS
      @if ($branch == 'intl')
        INTERNACIONALES
      @elseif ($branch == 'eu')
        EUROPEOS
      @elseif ($branch == 'am')
        AMERICANOS
      @endif
    </h1>
    <a class="nav-link" href="/">Regresar</a>
    <ul class="list-group">
    @foreach ($result as $torneo)
      @if ($branch == 'am')
        @if ($torneo->category->id == 'sr:category:393' || $torneo->category->id == 'sr:category:12')
          <li class="list-group-item"><a href="{{$branch}}/torneo/{{$torneo->id}}">{{$torneo->name}} @if ($torneo->category->id != 'sr:category:393')
            {{$torneo->category->name}}
        @endif</a></li>
        @endif
      @else
        <li class="list-group-item"><a href="{{$branch}}/torneo/{{$torneo->id}}">{{$torneo->name}}</a></li>
      @endif
    @endforeach
    </ul>
@endsection
