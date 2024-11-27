<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task List</title>
</head>
<body>
    <h1>Your Tasks</h1>
    <a href="{{ route('tasks.create') }}">+ Add New Task</a>
    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong> - 
                {{ $task->completed ? 'Completed' : 'Pending' }}
                <a href="{{ route('tasks.edit', $task->id) }}">Edit</a>
                <form action="{{ route('tasks.destroy', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete this task?')">Delete</button>
                </form>
                <form action="{{ route('tasks.complete', $task->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('PATCH')
                    <button type="submit">Mark as Completed</button>
            </form>
            </li>
        @endforeach
    </ul>
    

</body>
</html>
