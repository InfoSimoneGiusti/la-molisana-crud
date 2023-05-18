@extends('layouts.app')

@section('page-title')
    Crea un nuovo formato di pasta
@endsection

@section('content')

    <form method="POST" action="{{route('pastas.store')}}">

        @csrf

        <div class="mb-3">
            <label for="src" class="form-label">Url dell'immagine:</label>
            <input type="text" class="form-control @error('src') is-invalid @enderror" id="src" name="src" value="{{old('src')}}">
            @error('src')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="title" class="form-label">Titolo:</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title')}}">
            @error('title')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="kind" class="form-label">Tipo di pasta:</label>
            <input type="text" class="form-control @error('kind') is-invalid @enderror" id="kind" name="kind" value="{{old('kind')}}">
            @error('kind')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="cooking_time" class="form-label">Tempo di cottura:</label>
            <input type="text" class="form-control @error('cooking_time') is-invalid @enderror" id="cooking_time" name="cooking_time" value="{{old('cooking_time')}}">
            @error('cooking_time')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="weight" class="form-label">Peso</label>
            <input type="text" class="form-control @error('weight') is-invalid @enderror" id="weight" name="weight" value="{{old('weight')}}">
            @error('weight')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descrizione</label>
            <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
            @error('description')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Salva</button>
    </form>

@endsection
