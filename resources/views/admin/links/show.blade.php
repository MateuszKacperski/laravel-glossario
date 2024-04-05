@extends('layouts.app')
@section('title', 'Dettagli link')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    <h5 class="card-title">{{ $link->name }}</h5>           
                </div>               
                <p class="card-text">{{ $link->url }}</p>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.links.index', $link) }}" class="card-link btn btn-info">Torna alla lista</a>
                    <div class="d-flex gap-3">
                        <form id="delete-form" action="{{ route('admin.links.destroy', $link) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fas fa-trash-can me-2"></i>Elimina</button>
                        </form>
                        <a class="btn btn-warning" href="{{ route('admin.links.edit', $link) }}"><i
                                class="fas fa-pencil me-2"></i>Modifica</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
