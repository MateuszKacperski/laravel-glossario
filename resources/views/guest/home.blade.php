@extends('layouts.app')
@section('title', 'home')
@section('content')
<header>
    <h1>Parole</h1>
    <h3>Scopri le definizioni delle parole</h3>
</header>

@forelse ($words as $word)
<div class="card my-5">
    <div class="card-header d-flex align-items-center justify-content-between">
        <h4 class="card-title">
            {{$word->term}}
        </h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col">
                <h6 class="card-subtitle mb-2 text-body-secondary">{{$word->definition}}</h6>
            </div>
        </div>
            
     </div>
</div>
@empty
    <h3>Non ci sono parole</h3>
@endforelse

@endsection

