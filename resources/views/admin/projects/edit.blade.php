@extends('layouts.admin')

@section('content')
    <div class="edit">
        <h1>Edit Project</h1>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ route('admin.projects.update', $project) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $project->name }}">
            </div>
            <div class="mb-3">
                <label for="date_start" class="form-label">Date start</label>
                <input type="date" name="date_start" class="form-control @error('date_start') is-invalid @enderror" id="date_start"
                    value="{{ $project->date_start }}">
            </div>
            <div class="mb-3">
                <label for="image" class="form-label fw-bolder">Image:</label>
                <input
                type="file"
                name="image"
                class="form-control @error('image') is-invalid @enderror"
                id="image"
                value="{{ old('image', $project->image) }}">
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
                @if ($project)
                <div class="thumb w-25 mb-4">
                    <label for="imagePreview" class="form-label d-block fw-bolder">Image preview</label>
                    <img id="imagePreview" src="{{ asset('storage/' . $project->image) }}" class="img-fluid @error('name') is-invalid @enderror" alt="">
                    <p><strong>Name Photo:</strong> {{ $project->image_original_name }}</p>
                </div>
            @else
                <div class="thumb w-25 mb-4">
                    <label for="imagePreview" class="form-label d-block fw-bolder">Image preview</label>
                    <img id="imagePreview" src="{{ asset('storage/'. old('image')) }}" class="img-fluid @error('name') is-invalid @enderror" alt="">
                    <p><strong>Name Photo:</strong><p> {{ $project->image_original_name }}</p></p>
                </div>
            @endif
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="3" name="description">{{ $project->description }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Edit</button>
            <a href="{{ route('admin.projects.index') }}" type="submit" class="btn btn-secondary">Abort</a>
        </form>
    </div>

    <script>
        function conto(maxLength) {
            let c = document.getElementById('description').value;
            document.getElementById('char-count').innerHTML = maxLength - c.length;
        }

        document.getElementById('image').addEventListener('change', function() {
        const preview = document.getElementById('imagePreview');
        const fileInput = this;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    });
    </script>

    @endsection


@section('title')
| Edit
@endsection
