@extends('adminlte::page')
@section('title', 'CFP N°20')

@section('content_header')
    <h1>Crear nuevo docente</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
       {!! Form::open(['route'=>'admin.users.store', 'autocomplete'=>'off']) !!}
        <div class="for-group">
            {!! Form::label('name', 'Nombre y Apellido:') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el nombre del docente...']) !!}
            
            @error('name')
                <small class="text-danger">
                    <strong>{{$message}}</strong>
                </small>
            @enderror
        </div>
        <div class="for-group">
            {!! Form::label('name', 'Email:') !!}
            {!! Form::text('name', null, ['class'=>'form-control', 'placeholder'=>'Ingrese el correo del docente...']) !!}
            
            @error('name')
                <small class="text-danger">
                    <strong>{{$message}}</strong>
                </small>
            @enderror
        </div>
        <div class="for-group">
            {!! Form::label('category_id', 'Categoria') !!}
            {!! Form::select('category_id', $categories , null, ['class'=>'form-control']) !!}
        </div>

        {!! Form::submit('Crear Docente', ['class'=>'btn btn-primary mt-2']) !!}

       {!! Form::close() !!}
        
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop