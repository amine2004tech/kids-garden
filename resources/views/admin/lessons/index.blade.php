@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h2>gg you are admin</h2>
                    <h3>Lesson Management</h3>
                    <a href="{{ route('lessons.create') }}" class="btn btn-primary">Create New Lesson</a>
                </div>

                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Difficulty</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($lessons as $lesson)
                                <tr>
                                    <td>{{ $lesson->title }}</td>
                                    <td>{{ $lesson->category }}</td>
                                    <td>{{ $lesson->difficulty_level }}</td>
                                    <td>{{ $lesson->is_active ? 'Active' : 'Inactive' }}</td>
                                    <td>
                                        <a href="{{ route('lessons.edit', $lesson) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('lessons.destroy', $lesson) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to delete this lesson?')">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 