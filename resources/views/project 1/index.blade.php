@extends('layoutss.app')

@section('title', 'The List of Tasks!')

@section('content')
<!-- @if(count($tasks)) -->

<div>
    <nav class="mb-4">
        <a class="link" href="{{ route('tasks.create',) }}">Add Task</a>
    </nav>
</div>


@forelse( $tasks as $task )
    <div>
        <a href="{{ route('tasks.show', ['task' => $task->id]) }}"
            @class(['line-through' => $task->completed])>
            {{ $task->title }}</a>
    </div>
@empty
    <div>There are no tasks!</div>
@endforelse


@if($tasks->count())
    <nav>{{ $tasks->links() }}</nav>
@endif

<!-- @endif -->
@endsection
