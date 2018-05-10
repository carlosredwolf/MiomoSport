@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('content')
    <h1>TORNEOS EUROPEOS</h1>
    <a class="nav-link" href="/">Regresar</a>
    <ul class="list-group">
    @foreach ($result as $torneo)
      @if ($torneo->category->id == 'sr:category:393' || $torneo->category->id == 'sr:category:12')
        <li class="list-group-item"><a href="am/torneo/{{$torneo->id}}">{{$torneo->name}} @if ($torneo->category->id != 'sr:category:393')
          {{$torneo->category->name}}
        @endif</a></li>
      @endif
    @endforeach
    </ul>
@endsection
