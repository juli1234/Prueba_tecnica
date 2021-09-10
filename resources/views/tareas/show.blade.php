@extends('layouts.app')

@section('content')
@section('buttons')
<a href="{{route('tareas.index')}}" class="btn btn-primary mr-2">
    <-- Volver </a> @endsection <article class="contenido-tarea">
       
        <h1 class="text-center mb-4">{{$tarea->Nombre}}</h1>
        <div class="tarea-meta">
            <p>
                <h2 class="text-dark">Fecha de inicio</h2>
                <span id="inicio" class="font-weight-bold text-primary">{{$tarea->fecha_inicio}}</span>
            </p>
            <p>
                <h2 class="text-dark">Fecha de inicio</h2>
                <span id="fin" class="font-weight-bold text-primary">{{$tarea->fecha_fin}}</span>
            </p>
            <p>
                <h2 class="text-dark">Estado</h2>
                <span id="estado" class="font-weight-bold text-primary">{{$tarea->estado}}</span>
            </p>
            </article>

            @endsection