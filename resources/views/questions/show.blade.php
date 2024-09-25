

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="container">
    <h1>Question Details</h1>

    <div class="card">
        <div class="card-body">
            <h5 class="card-title">{{ $question->question }}</h5>
            <p class="card-text">Type: {{ $question->type }}</p>
            <p class="card-text">Required: {{ $question->is_required ? 'Yes' : 'No' }}</p>
        </div>
    </div>

    <a href="{{ route('questions.index', ['categoryId' => $question->category_id]) }}" class="btn btn-secondary">Back to Questions</a>
</div>
@endsection
