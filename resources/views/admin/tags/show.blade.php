@extends('layouts.app')

@section('title', "Tags $tag->label")

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>{{ $tag->label }}</h1>
    </div>
    <hr>
    <div class="row">
        <div class="col d-flex align-items-center gap-3">
            <strong>
                Colore:
            </strong>
            @if (Str::startsWith($tag->color, '#'))
                <div class="rounded display-color" style="background-color: {{ $tag->color }}"></div>
            @else
                <div class="rounded display-color bg-{{ $tag->color }}"></div>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col-4"><strong>Creato il:</strong> {{ $tag->getDate($tag->created_at, 'd-m-Y') }} </div>
        <div class="col-4"><strong>Modificato il:</strong> {{ $tag->getDate($tag->updated_at, 'd-m-Y') }}</div>
        <div class="col-4">
            <div class="d-flex justify-content-end gap-3">
                <a href="{{ route('admin.tags.index') }}" class="btn btn-primary"><i
                        class="fa-solid fa-arrow-left me-2"></i>Torna indietro</a>
                <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning"><i
                        class="fa-solid fa-pen me-3"></i>Modifica</a>
                <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="delete-form"
                    data-tag="{{ $tag->label }}">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="fa-regular fa-trash-can me-2"></i>Elimina</button>
                </form>

            </div>
        </div>
    </div>


@endsection



@section('scripts')
    @vite('resources/js/slug.js')
@endsection
