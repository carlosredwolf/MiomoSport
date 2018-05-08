@extends('layouts.index')
@section('title', 'Nido del Pajaro')
@section('navegador')
  <ul class="nav nav-tabs">
  <li class="nav-item">
    <a class="nav-link active" href="intl">Internacional</a>
  </li>
  <li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle disabled" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">Europa</a>
    <div class="dropdown-menu">
      <a class="dropdown-item" href="#">Action</a>
      <a class="dropdown-item" href="#">Another action</a>
      <a class="dropdown-item" href="#">Something else here</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Separated link</a>
    </div>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#">America</a>
  </li>
</ul>
@endsection
@section('content')

@endsection
