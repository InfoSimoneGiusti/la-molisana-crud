@extends('layouts.app')

@section('page-title')
    Crea un nuovo formato di pasta
@endsection

@section('content')

    <form method="POST" action="{{route('pastas.update', ['pasta' => $pasta->id])}}">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="src" class="form-label">Url dell'immagine:</label>
            <input type="text" class="form-control @error('src') is-invalid @enderror" id="src" name="src" value="{{ old('src', $pasta->src) }}">
            @error('src')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $pasta->title)}}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kind" class="form-label">Tipo di pasta:</label>

            <select name="kind" class="form-control @error('kind') is-invalid @enderror" id="kind">
                <option @selected (old('kind', $pasta->kind) == 'corta') value="corta">Corta</option>
                <option @selected (old('kind', $pasta->kind) == 'lunga') value="lunga">Lunga</option>
                <option @selected (old('kind', $pasta->kind) == 'lunghissima') value="lunghissima">Lunghissima</option>
            </select>

            @error('kind')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cooking_time" class="form-label">Tempo di cottura:</label>
            <input type="text" class="form-control @error('cooking_time') is-invalid @enderror" id="cooking_time" name="cooking_time" value="{{old('cooking_time', $pasta->cooking_time)}}">
            @error('cooking_time')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Peso</label>
            <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{old('weight', $pasta->weight)}}">
            @error('weight')
            <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description', $pasta->description)}}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

@endsection
