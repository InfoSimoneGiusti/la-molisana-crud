@extends('layouts.app')

@section('page-title')
    Crea un nuovo formato di pasta
@endsection

@section('content')

    <form method="POST" action="{{route('pastas.store')}}">

        @csrf

        <div class="mb-3">
            <label for="src" class="form-label">Url dell'immagine:</label>
            <input type="text" class="form-control" id="src" name="src">
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>

        <div class="mb-3">
            <label for="kind" class="form-label">Tipo di pasta:</label>
            <input type="text" class="form-control" id="kind" name="kind">
        </div>

        <div class="mb-3">
            <label for="cooking_time" class="form-label">Tempo di cottura:</label>
            <input type="text" class="form-control" id="cooking_time" name="cooking_time">
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Peso</label>
            <input type="text" class="form-control" id="weight" name="weight">
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control" id="description" name="description"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

@endsection
