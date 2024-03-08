@extends('admin.layout')

@section('content')
    <h1>Hola {{ Auth::user()->name }}</h1>
    <a href="{{ url('admin/user') }}" class="btn btn-success">Usuarios</a>
    <a href="{{ url('admin/degree') }}" class="btn btn-success">Grados</a>
    <a href="{{ url('admin/task') }}" class="btn btn-success">Tareas</a>
    <a href="{{ url('admin/student') }}" class="btn btn-success">Estudiante</a>
    <a href="{{ url('admin/report') }}" class="btn btn-success">Reportes</a>
@endsection
