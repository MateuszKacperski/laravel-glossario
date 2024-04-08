@extends('layouts.app')

@section('title', 'Parole')

@section('content')

    <header>
        <h1 class="text-center my-4">Parole</h1>

    </header>

    <table class="table table-dark table-striped cointainer">
        <thead>
            <tr>
                <th scope="col">Id</th>
                <th scope="col">Parola</th>
                <th scope="col">Tags</th>
                <th scope="col">Links</th>
                <th scope="col">Definizione</th>
                <th scope="col">Creata il</th>
                <th scope="col">Modificata il</th>
                <th>
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.words.create') }}" class="btn btn-sm btn-success"><i
                                class="fas fa-plus me-2"></i>Nuove Parole</a>
                </th>
                </div>
            </tr>
        </thead>
        <tbody>
            @forelse($words as $word)
                <tr>
                    <th scope="row">{{ $word->id }}</th>
                    <td>{{ $word->term }}</td>
                    
                    <td>
                    @if($word->tags)
                    @forelse ($word->tags as $tag)
                         <span class="badge rounded-pill" style="background-color: {{$tag->color}}">{{ $tag->label }}</span> 
                         @empty
                         Nessun tag
                         @endforelse
                         @endif
                    </td>
                    <td>
                    @forelse ($word->links as $link)
                    <div>
                        <a href="{{$link->url}}">{{ $link->name }}</a>
                    </div>
                    @empty
                        Nessun link
                    @endforelse
                    </td>
                    
                    <td>{{ $word->getAbstract() }}</td>
                    <td>{{ $word->getDate($word->created_at) }}</td>
                    <td>{{ $word->getDate($word->updated_at) }}</td>
                    <td>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="{{ route('admin.words.show', $word) }}" class="btn btn-sm btn-primary"><i
                                    class="fas fa-eye"></i></a>

                            <a href="{{ route('admin.words.edit', $word) }}" class="btn btn-sm btn-warning"> <i
                                    class="fas fa-pencil"></i></a>
                            <form action="{{ route('admin.words.destroy', $word) }}" method="POST" class="delete-form">
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
                    <td colspan="8">
                        <h3 class="text-center mt-4">Non ci sono parole</h3>
                    </td>
                </tr>

            @endforelse
        </tbody>
    </table>
@endsection
