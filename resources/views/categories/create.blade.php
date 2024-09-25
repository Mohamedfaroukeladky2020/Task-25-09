@extends('layouts.app')

@section('title', 'Create Category')

@section('content')
    <h1>Create Category</h1>
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Category Name">
        </div>
        <button type="submit" class="btn btn-success">Save</button>
    </form>
@endsection
