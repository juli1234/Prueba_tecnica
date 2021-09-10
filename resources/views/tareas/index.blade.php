@extends('layouts.app')

@section('content')
@section('buttons')
<a href="{{route('tareas.create')}}" class="btn btn-primary mr-2">
    Crear tarea
</a>
@endsection

<h2 class="text-center mb-5"> Administracion de tareas </h2>


<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">Nombre</th>
                <th scole="col">Fecha inicio</th>
                <th scole="col">Fecha fin</th>
                <th scole="col">Estado</th>
                <th scole="col">Acciones</th>
            </tr>
        </thead>

        <tbody>
            @foreach($tareas as $tarea)


            <tr>
                <td>{{$tarea->Nombre}}</td>
                <td>{{$tarea->fecha_inicio}}</td>
                <td>{{$tarea->fecha_fin}}</td>
                <td>{{$tarea->estado}}</td>
                <td>
                    <form action="{{route('tareas.destroy', ['tarea' => $tarea->id] )}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" class="btn btn-danger mr-1 d-block w-100 mb-2 " value="Borrar &times;">

                    </form>
                    <a href="{{route('tareas.edit', ['tarea' => $tarea->id] )}}" class="btn btn-dark mr-1 d-block mb-2">Modificar</a>
                    <a href="{{route('tareas.show', ['tarea' => $tarea->id] )}}"
                        class="btn btn-success mr-1 d-block">Consultar</a>

                </td>

            </tr>
            @endforeach
        </tbody>


    </table>
</div>

<h1 class="text-center mb-5"> Reporte </h1>

<div class="col-md-10 mx-auto bg-white p-3">
    <table class="table">
        <thead class="bg-primary text-light">
            <tr>
                <th scole="col">TOTAL INICIADAS</th>
                <th scole="col">TOTAL EN PROCESO</th>
                <th scole="col">TOTAL CANCELADAS</th>
                <th scole="col">TOTAL COMPLETADAS</th>
               
            </tr>
        </thead>

        <tbody>
          


            <tr>
                <td>{{$iniciados}}</td>
                <td>{{$proceso}}</td>
                <td>{{$canceladas}}</td>
                <td>{{$completadas}}</td>
              

            </tr>
        
        </tbody>


    </table>
</div>


@endsection