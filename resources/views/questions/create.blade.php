@extends('layouts.app')

@section('title', 'Create Question')

@section('content')
    <h1>Create Question for {{ $category->name }}</h1>

    <form action="{{ route('questions.store', $category->id) }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="question" class="form-label">Question</label>
            <input type="text" class="form-control" id="question" name="question" required>
        </div>

        <div class="mb-3">
            <label for="type" class="form-label">Question Type</label>
            <select class="form-select" id="type" name="type" required>
                <option value="text">Text</option>
                <option value="date">Date</option>
                <option value="select">Select</option>
            </select>
        </div>

        <div class="form-check mb-3">
            <input type="checkbox" class="form-check-input" id="is_required" name="is_required">
            <label class="form-check-label" for="is_required">Is this question required?</label>
        </div>

        <button type="submit" class="btn btn-primary">Create Question</button>
    </form>
@endsection
