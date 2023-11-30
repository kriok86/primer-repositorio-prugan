@extends('adminlte::page')
@section('title', 'CFP N°20')

@section('content_header')
    <h1>Panel de Calificaciones</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <th>ID</th>
                    <th>NOMBRE</th>
                    <th>CALIFICACION</th>
                    <th colspan="2"></th>
                </thead>
                <tbody>
                   
                </tbody>
            </table>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop