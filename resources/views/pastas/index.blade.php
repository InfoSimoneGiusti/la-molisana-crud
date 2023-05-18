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
                    <form class="form_delete_pasta" action="{{route('pastas.destroy', ['pasta' => $pasta->id])}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this?')" class="btn btn-danger">Elimina</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>






<div class="modal fade" id="confirmModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Conferma eliminazione</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            Confermi di voler eliminare l'elemento selezionato?
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-danger">Conferma eliminazione</button>
        </div>
        </div>
    </div>
</div>




@endsection
