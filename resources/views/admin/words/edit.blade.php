@extends('layouts.app')

@section('title', "Modifica $word->term")

@section('content')
    <h1>Modifica la parola</h1>


    @include('includes.words.form')


@endsection


@section('scripts')
@vite('resources/js/slug.js')
@endsection
