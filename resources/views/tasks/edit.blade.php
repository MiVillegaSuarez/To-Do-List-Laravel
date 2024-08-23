@extends('dashboard')
@section('content-update')
    <p>actualizar</p>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-2 col-sm-0"></div>
            <div class="col-lg-8 col-sm-12">
                <form action="{{ route('task.update', ['id' => $task->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <input type="text" name="title" class="form-control" value="{{$task->title}}">
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" name="details" rows="3">{{$task->details}}</textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" class="btn btn-primary">Actualizar tarea</button>
                    </div>
                </form>
            </div>
            <div class="col-lg-2 col-sm-0"></div>
        </div>
    </div>
@endsection
