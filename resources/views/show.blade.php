@extends('layouts.app')

@section('title', $task->title)

@section('content')

<div class="mb-4">
    <a class="link" href="{{ route('tasks.index') }}">
        ← Go back to the task list!
    </a>
</div>

<p class="mb-4 text-slate-700">{{ $task->description }}</p>

@if($task->long_description)
    <p class="mb-4 text-slate-700">{{ $task->long_description }}</p>
@endif

<p class="mb-4 text-sm text-slate-500">Created {{ $task->created_at->diffForHumans() }} •
    Updated {{ $task->updated_at->diffForHumans() }} </p>


<P class="mb-4">
    @if($task->completed)
        <span class="font-medium text-green-500">Completed</span>
    @else
        <span class="font medium text-red-500">Not Completed</span>

    @endif
</P>

<div class="flex gap-2">
    <button>
        <a href="{{ route('tasks.edit', ['task' => $task->id]) }}"
            class="btn">Edit</a>
    </button>

    <form
        action="{{ route('tasks.toggle', ['task' => $task]) }}"
        method="POST">
        @csrf
        @method('PUT')
        <button class="btn" type="submit">
            Mark as
            {{ $task->completed ? 'Not Completed' : 'Completed ' }}
        </button>
    </form>

    <form
        action="{{ route('tasks.destroy', ['task' => $task->id]) }}"
        method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn">Delete</button>
    </form>
</div>


@endsection
