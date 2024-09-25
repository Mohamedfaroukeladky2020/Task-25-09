@extends('layouts.app')

@section('title', 'Categories')

@section('content')
    <h1>Categories</h1>
    <a class="btn btn-primary" href="{{ route('categories.create') }}">Add New Category</a>

    <ul class="list-group mt-4">
        @foreach ($categories as $category)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $category->name }}
                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-sm btn-warning">Edit</a>
            </li>
        @endforeach
    </ul>
@endsection
