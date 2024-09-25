

@extends('layouts.app') <!-- Assuming you have a layout file -->

@section('content')
<div class="container">
    <h1>Questions for {{ $category->name }}</h1> <!-- Display the category name -->

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('questions.create', ['categoryId' => $category->id]) }}" class="btn btn-primary">Add Question</a>

    <table class="table">
        <thead>
            <tr>
                <th>Question</th>
                <th>Type</th>
                <th>Required</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($questions as $question)
                <tr>
                    <td>{{ $question->question }}</td>
                    <td>{{ $question->type }}</td>
                    <td>{{ $question->is_required ? 'Yes' : 'No' }}</td>
                    <td>
                        <!-- Add actions like edit or delete -->
                        <a href="{{ route('questions.edit', ['questionId' => $question->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('questions.destroy', ['questionId' => $question->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    <td>
                        <a href="{{ route('questions.show', ['id' => $question->id]) }}" class="btn btn-info">View</a>
                        <a href="{{ route('questions.edit', ['questionId' => $question->id]) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('questions.destroy', ['questionId' => $question->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>

                </tr>
            @empty
                <tr>
                    <td colspan="4">No questions found for this category.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
