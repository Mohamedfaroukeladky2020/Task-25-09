@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
    <h1>Create Product</h1>
    <form action="{{ route('products.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Product Name">
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <select id="category" class="form-select" name="category_id">
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div id="questions"></div>

        <button type="submit" class="btn btn-success">Save Product</button>
    </form>

    <script>
        document.getElementById('category').addEventListener('change', function() {
            var categoryId = this.value;

            fetch(`/categories/${categoryId}/questions`)
                .then(response => response.json())
                .then(questions => {
                    var questionHtml = '';

                    questions.forEach(function(question) {
                        questionHtml += `<label class="form-label">${question.question}</label>`;
                        if (question.type === 'text') {
                            questionHtml += `<input type="text" class="form-control mb-3" name="questions[${question.id}]">`;
                        }
                        // Add more question types as needed...
                    });

                    document.getElementById('questions').innerHTML = questionHtml;
                });
        });
    </script>
@endsection
