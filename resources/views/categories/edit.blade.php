@extends('layouts.base')

@section('content')
    <a href="/categories">Retour aux catégories</a>
    <h1>Modifier {{ $category->name }}</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0 list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/categories/{{ $category->id }}" method="post">
        @csrf @method('put')
        <input type="text" name="name" placeholder="Nom..." class="form-control"
               value="{{ old('name', $category->name) }}">
        <!-- <input type="text" name="email" placeholder="Email..."> -->

        <button class="btn btn-primary mt-3">Modifier</button>
    </form>
@endsection
