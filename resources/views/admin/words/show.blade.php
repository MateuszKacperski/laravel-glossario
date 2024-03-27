@extends('layouts.app')
@section('title','Dettagli parola')
@section('content')
<div class="card">
    <div class="card-body">
      <h5 class="card-title">{{$word->term}}</h5>
      <h6 class="card-subtitle mb-2 text-body-secondary">{{$word->slug}}</h6>
      <p class="card-text">{{$word->definition}}</p>
      <a href="{{route('admin.words.index')}}" class="card-link">Torna alla lista delle parole</a>
    </div>
  </div>
  @endsection