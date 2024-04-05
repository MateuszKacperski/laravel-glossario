@extends('layouts.app')

@section('title', 'Tags')

@section('content')
    <h1>Tags</h1>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Tag</th>
                <th scope="col">Creato il:</th>
                <th scope="col">Modificato il:</th>
                <th>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.tags.create') }}" class="btn btn-success">
                            <i class="fa-solid fa-plus"></i>
                            Crea nuovo </a>
                    </div>
                </th>
            </tr>
        </thead>
        <tbody>
            @forelse ($tags as $tag)
                <tr>
                    <th scope="row">{{ $tag->id }}</th>
                    <td>
                        @if (Str::startsWith($tag->color, '#'))
                            <span class="badge badge-pill"
                                style="background-color: {{ $tag->color }}">{{ $tag->label }}</span>
                        @else
                            <span class="badge badge-pill text-bg-{{ $tag->color }}">{{ $tag->label }}</span>
                        @endif
                    </td>
                    <td>{{ $tag->getDate($tag->created_at) }}</td>
                    <td>{{ $tag->getDate($tag->updated_at) }}</td>
                    <td>
                        <div class="d-flex justify-content-end gap-3">
                            <a href="{{ route('admin.tags.show', $tag->id) }}" class="btn btn-primary"><i
                                    class="fa-regular fa-eye"></i></a>
                            <a href="{{ route('admin.tags.edit', $tag->id) }}" class="btn btn-warning"><i
                                    class="fa-solid fa-pen"></i></a>

                            <form action="{{ route('admin.tags.destroy', $tag->id) }}" method="POST" class="delete-form"
                                data-type="{{ $tag->label }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger"><i class="fa-regular fa-trash-can"></i></button>
                            </form>

                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Non ci sono tags da vedere</td>
                </tr>
            @endforelse

        </tbody>
    </table>


@endsection



@section('scripts')
    @vite('resources/js/slug.js')
@endsection
