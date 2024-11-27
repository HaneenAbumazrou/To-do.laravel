<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
{
    $tasks = auth()->user()->tasks;
    return view('tasks.index', compact('tasks'));
}

public function create()
{
    return view('tasks.create');
}

public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
    ]);

    auth()->user()->tasks()->create([
        'title' => $request->title,
        'description' => $request->description,
    ]);

    return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
}

public function edit(Task $task)
{
    $this->authorize('update', $task);
    return view('tasks.edit', compact('task'));
}

public function update(Request $request, Task $task)
{
    $this->authorize('update', $task);

    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'completed' => 'boolean',
    ]);

    $task->update($request->all());

    return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
}

public function destroy(Task $task)
{
    $this->authorize('delete', $task);

    $task->delete();

    return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
}

public function markAsCompleted($id)
{
    $task = Task::findOrFail($id);
    $task->completed = true; // Or toggle with !$task->completed if you want
    $task->save();

    return redirect()->route('tasks.index')->with('success', 'Task marked as completed.');
}


}
