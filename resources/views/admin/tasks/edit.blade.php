@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Edit Task</h1>

    <form action="{{ route('admin.tasks.update', $task->id) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="title">Title</label>
            <input type="text" name="title" class="form-control" value="{{ old('title', $task->title) }}" required>
        </div>

        <div class="form-group">
            <label for="completed">Status</label>
            <select name="completed" class="form-control">
                <option value="0" {{ !$task->completed ? 'selected' : '' }}>Pending</option>
                <option value="1" {{ $task->completed ? 'selected' : '' }}>Completed</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success mt-3">Update Task</button>
        <a href="{{ route('admin.tasks.index') }}" class="btn btn-secondary mt-3 ml-3">Back to Task List</a>
    </form>
</div>
@endsection
