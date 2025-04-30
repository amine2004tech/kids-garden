@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h2>gg you are admin</h2>
                    <h3>{{ isset($lesson) ? 'Edit Lesson' : 'Create New Lesson' }}</h3>
                </div>

                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ isset($lesson) ? route('lessons.update', $lesson) : route('lessons.store') }}">
                        @csrf
                        @if(isset($lesson))
                            @method('PUT')
                        @endif

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $lesson->title ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="description">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $lesson->description ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="category">Category</label>
                            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $lesson->category ?? '') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="difficulty_level">Difficulty Level (1-5)</label>
                            <input type="number" class="form-control" id="difficulty_level" name="difficulty_level" min="1" max="5" value="{{ old('difficulty_level', $lesson->difficulty_level ?? '1') }}" required>
                        </div>

                        <div class="form-group">
                            <label for="content">Content</label>
                            <textarea class="form-control" id="content" name="content" rows="10" required>{{ old('content', $lesson->content ?? '') }}</textarea>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $lesson->is_active ?? true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Active</label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Save</button>
                        <a href="{{ route('lessons.index') }}" class="btn btn-secondary">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 