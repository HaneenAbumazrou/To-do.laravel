@extends('layouts.admin')

@section('content')
<div class="container">
    <h1>Manage Tasks</h1>

    <a href="{{ route('admin.tasks.index') }}" class="btn btn-primary mb-3">Add New Task</a>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($tasks as $task)
            <tr>
                <td>{{ $task->title }}</td>
                <td>{{ $task->completed ? 'Completed' : 'Pending' }}</td>
                <td>
                    <a href="{{ route('admin.tasks.edit', $task->id) }}" class="btn btn-info btn-sm">Edit</a>

                    <form action="{{ route('admin.tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
