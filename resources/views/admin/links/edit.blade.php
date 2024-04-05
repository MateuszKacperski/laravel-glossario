@extends('layouts.app')

@section('title', 'Modifica il link')

@section('content')
    <h1>Modifica il link</h1>

    <form action="{{ route('admin.links.update', $link->id) }}" method="POST">
        @csrf
        @method('PATCH')
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome del link</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @elseif(old('name', '')) is-valid  @enderror"
                        value="{{ old('name', $link->name) }}" id="name" placeholder="W3 School">
                    @error('name')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>

            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="url" class="form-label">Url del link</label>
                    <input type="text"
                        class="form-control @error('url') is-invalid @elseif(old('url', '')) is-valid  @enderror"
                        name="url" id="url" value="{{ old('url', $link->url) }}"
                        placeholder="https://www.w3schools.com/">
                        @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-end gap-3">
                <button class="btn btn-primary" type="button">Torna indietro</button>
                <button class="btn btn-success"><i class="fa-solid fa-floppy-disk me-2"></i>Salva</button>
            </div>
        </div>
    </form>

@endsection
