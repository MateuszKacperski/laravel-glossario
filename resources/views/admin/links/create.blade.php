@extends('layouts.app')

@section('title', 'Crea un nuovo link')

@section('content')
    <h1>Crea un nuovo link</h1>

    <form action="{{ route('admin.links.store') }}" method="POST">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome del link</label>
                    <input type="text" name="name"
                        class="form-control @error('name') is-invalid @elseif(old('name', '')) is-valid  @enderror"
                        value="{{ old('name') }}" id="name" placeholder="W3 School">
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
                        name="url" id="url" value="{{ old('url') }}" placeholder="https://www.w3schools.com/">
                    @error('url')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
            </div>
            <div class="col d-flex align-items-center justify-content-end gap-3">
                <a class="btn btn-primary" type="button" href="{{ route('admin.links.index') }}">Torna indietro</a>
                <button class="btn btn-success"><i class="fa-solid fa-floppy-disk me-2"></i>Crea</button>
            </div>
        </div>
    </form>

@endsection
