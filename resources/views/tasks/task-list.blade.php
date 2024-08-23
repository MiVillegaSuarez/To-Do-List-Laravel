@extends('dashboard')
@section('content-list')
    <div class="container-fluid">
        <div class="row">
            <div class="col-6">
                <a href="{{ route('task.create') }}" class="btn btn-primary">Agregar una tarea</a>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container-fluid">
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach ($tasks as $task)
                <div class="col">
                    <div class="card h-100">
                        <div class="card-header bg-transparent">{{ $task->title }}</div>
                        <div class="card-body">
                            <p class="card-text">{{ $task->details }}</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3">
                                    <form action="{{ route('task.delete', ['id' => $task->id]) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </div>
                                <div class="col-6">
                                    <a href="{{ route('task.edit', ['id' => $task->id]) }}"
                                        class="btn btn-warning">Editar</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <small class="text-body-secondary">{{ date('d - m - Y', strtotime($task->created_at)) }}</small>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
