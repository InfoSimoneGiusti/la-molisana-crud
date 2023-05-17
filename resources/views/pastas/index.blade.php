@extends('layouts.app')

@section('page-title', 'Lista dei formati di pasta')

@section('content')

<a href="{{route('pastas.create')}}" class="btn btn-primary">Crea nuovo formato di pasta</a>

<table class="table table-striped">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Titolo</th>
        <th scope="col">Peso</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($pastas as $pasta)
            <tr>
                <td scope="row">{{$pasta->id}}</td>
                <td>{{$pasta->title}}</td>
                <td>{{$pasta->weight}}</td>
                <td class="d-flex">
                    <a class="btn btn-primary me-2" href="{{route('pastas.show', ['pasta' => $pasta->id])}}">Vedi</a>
                    <a class="btn btn-warning me-2" href="{{route('pastas.edit', ['pasta' => $pasta->id])}}">Modifica</a>

                    <form action="{{route('pastas.destroy', ['pasta' => $pasta->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Elimina</button>
                    </form>

                </td>
            </tr>
        @endforeach
    </tbody>
  </table>


@endsection
