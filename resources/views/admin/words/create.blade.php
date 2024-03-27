@extends('layouts.app')

@section('title', "Crea una nuova parola")

@section('content')
    <h1>Crea una nuova parola</h1>


    @include('includes.words.form')


@endsection



@section('scripts')
@vite('resources/js/slug.js')
@endsection
