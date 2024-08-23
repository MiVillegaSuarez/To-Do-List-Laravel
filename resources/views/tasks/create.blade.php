@extends('tasks.master')
@section('content-create')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-sm-0"></div>
            <div class="col-lg-8 col-sm-12">
                <form action="{{ route('task.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" placeholder="Titulo">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="details" placeholder="Detalles" rows="3"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Crear nueva tarea</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-sm-0"></div>
        </div>
    </div>
@endsection
