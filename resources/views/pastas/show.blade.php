@extends('layouts.app')

@section('page-title')
    Pasta: {{$pasta->title}}
@endsection

@section('content')
    <img src="{{$pasta->src}}" class="img-fluid" alt="{{$pasta->title}}">
    <h1>{{$pasta->title}}</h1>
    <h4>Tipologia: {{$pasta->kind}}</h4>
    <h4>Tempo di cottura: {{$pasta->cooking_time}}</h4>
    <h4>Peso: {{$pasta->weight}}</h4>
    <p>{!!$pasta->description!!}</p>

    <a href="{{route('pastas.index')}}" class="btn btn-secondary">Torna alla lista</a>
@endsection
