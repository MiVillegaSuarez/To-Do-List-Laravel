@extends('tasks.master')
@section('content-dashborad')
    @include('sweetalert::alert')

    @include('tasks.task-list')
    @yield('content-list')
@endsection
