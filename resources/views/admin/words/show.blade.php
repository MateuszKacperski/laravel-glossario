@extends('layouts.app')
@section('title', 'Dettagli parola')
@section('content')
    <div>
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">

                    <h5 class="card-title">{{ $word->term }}</h5>
                    <div>

                      @forelse ($word->tags as $tag)
                      <span class="badge rounded-pill"
                      style="background-color: {{ $tag->color }}">{{ $tag->label }}</span>
                      @empty
                      @endforelse
                    </div>
                </div>
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $word->slug }}</h6>
                <p class="card-text">{{ $word->definition }}</p>
                <div class="d-flex justify-content-between">
                    <a href="{{ route('admin.words.index', $word) }}" class="card-link btn btn-info">Torna alla lista</a>
                    <div class="d-flex gap-3">
                        <form id="delete-form" action="{{ route('admin.words.destroy', $word) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger"><i class="fas fa-trash-can me-2"></i>Elimina</button>
                        </form>
                        <a class="btn btn-warning" href="{{ route('admin.words.edit', $word) }}"><i
                                class="fas fa-pencil me-2"></i>Modifica</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    </div>
@endsection
