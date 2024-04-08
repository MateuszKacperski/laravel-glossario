@if ($word->exists)
    <form action="{{ route('admin.words.update', $word->id) }}" method="POST">
        @method('PUT')
    @else
        <form action="{{ route('admin.words.store') }}" method="POST">
@endif

@csrf
<div class="row my-4">
    <div class="col-6">
        <div class="mb-3">
            <label for="term" class="form-label ">Termine</label>
            <input type="text"
                class="form-control @error('term') is-invalid @elseif(old('term', '')) is-valid @enderror"
                name="term" id="term" placeholder="Coalishing null Operator"
                value="{{ old('term', $word->term) }}">
            @error('term')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-6">
        <div class="mb-3">
            <label for="slug" class="form-label">Slug</label>
            <input type="text" class="form-control" id="slug" value="{{ old('term', $word->slug) }}" disabled>
        </div>
    </div>
    <div class="col-12">

        <div class="mb-3">
            <label for="definition" class="form-label">Definizione</label>
            <textarea class="form-control @error('definition') is-invalid @elseif(old('definition', '')) is-valid @enderror"
                placeholder="Definizione del termine" id="definition" rows="5" name="definition">{{ old('definition', $word->definition) }}</textarea>
            @error('definition')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>

    <div class="col-12">
        <div class="mb-3">

            @foreach ($tags as $tag)
                <div class="form-check form-check-inline @error('tags') is-invalid @enderror">
                    <input class="form-check-input" name="tags[]" type="checkbox" id="tag-{{ $tag->id }}"
                        value="{{ $tag->id }}" @if (in_array($tag->id, old('tags', $previous_tags ?? []))) checked @endif>
                    <label class="form-check-label" for="tag-{{ $tag->id }}">{{ $tag->label }}</label>
                </div>
            @endforeach
            @error('tags')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
    </div>
    <div class="col-12">
        <div class="mb-3">
            @forelse ($word->links as $link)
                <label for="link-name-{{ $link->id }}" class="form-label">Titolo</label>
                <input type="text" class="form-control" name="title"
                    id="link-name-{{ $link->id }}" value="{{ old("link-$link->id", $link->name) }}">
                <label for="link-{{ $link->id }}" class="form-label">Url</label>
                <input type="text" class="form-control" name="link"
                    id="link{{ $link->id }}" value="{{ old("link-$link->id", $link->url) }}">

            @empty
                <p>
                    <button class="btn btn-primary" type="button" data-bs-toggle="collapse"
                        data-bs-target="#collapseWidthExample" aria-expanded="false"
                        aria-controls="collapseWidthExample">
                        Aggiungi Link
                    </button>
                </p>
                <div style="min-height: 120px;">
                    <div class="collapse collapse-horizontal" id="collapseWidthExample">

                        <label class="form-label" for="name">Titolo del link</label>
                        <input type="text" name="title" id="name" class="form-control"
                            placeholder="W3 School">
                        <label class="form-label" for="link">Url del link</label>
                        <input type="text" name="link" id="link" class="form-control"
                            placeholder="https://www.w3schools.com/html/">
                    </div>
                </div>
            @endforelse

        </div>
    </div>
    <div class="col-12 d-flex justify-content-end">
        <div class="mb-3 d-flex gap-3">
            <a href="{{ route('admin.words.index') }}" class="btn btn-secondary">Torna indietro</a>
            @if ($word->exists)
                <button class="btn btn-success"><i class="fa-solid fa-floppy-disk me-2"></i>Salva </button>
            @else
                <button class="btn btn-success"><i class="fa-solid fa-plus me-2"></i>Crea </button>
            @endif
        </div>
    </div>

</div>
</form>
