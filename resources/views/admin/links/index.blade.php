@extends('layouts.app')

@section('title', 'Link')

@section('content')

    <header>
        <h1 class="text-center my-4">Link</h1>

    </header>

    <table class="table table-dark table-striped cointainer">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Url</th>
                <th scope="col">Creata il</th>
                <th scope="col">Modificata il</th>
                <th>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.links.create') }}" class="btn btn-sm btn-success"><i
                                class="fas fa-plus me-2"></i>Nuovi link</a>
                </th>
                </div>
            </tr>
        </thead>
        <tbody>
            @forelse($links as $link)
                <tr>
                    <th scope="row">{{ $link->id }}</th>
                    <td>{{ $link->name }}</td>
                    <td>{{ $link->url }}</td>
                    <td>{{ $link->getDate($link->created_at) }}</td>
                    <td>{{ $link->getDate($link->updated_at) }}</td>
                    <td>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.links.show', $link) }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-eye"></i></a>

                            <a href="{{ route('admin.links.edit', $link) }}" class="btn btn-sm btn-warning"> <i
                                    class="fas fa-pencil"></i></a>
                            <form action="{{ route('admin.links.destroy', $link) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger"><i
                                        class="fas fa-trash-can"></i></button>
                            </form>
                    </td>
                </tr>
                </div>

            @empty

                <tr>
                    <td colspan="5">
                        <h3 class="text-center mt-4">Non ci sono parole</h3>
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>
@endsection