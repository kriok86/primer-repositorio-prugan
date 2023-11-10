@extends('adminlte::page')
@section('title', 'CFP N°20')

@section('content_header')
<a class="btn btn-secondary btn-sm float-right" href="{{route('admin.users.create')}}">Crear Docente</a>    
<h1>Lista de Usuarios</h1>
    
@stop

@section('content')
    
    @livewire('admin.users-index') 
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop