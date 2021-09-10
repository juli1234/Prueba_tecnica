@extends('layouts.app')

@section('content')
@section('buttons')
<a href="{{route('tareas.index')}}" class="btn btn-primary mr-2">
    <-- Volver </a> @endsection <h2 class="text-center mb-5"> Crear nueva tarea </h2>

        <div class="row justify-content-center mt-5">

            <div class="col-md-8">
                <form method="POST" action="{{route('tareas.update', ['tarea' => $tarea])}}">
                    @csrf
                    @method('PUT')
                    <div class="form group">
                        <label for="Nombre">
                            Nombre de la tarea
                        </label>
                        <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror"
                            id="Nombre" placeholder="Nombre de la tarea" value="{{$tarea->Nombre}}">
                        @error('Nombre')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror

                        <br>
                    </div>

                    <div class="form group">
                        <label for="fecha_inicio">
                            Fecha inicio
                        </label>
                        <input type="date" name="fecha_inicio"
                            class="form-control @error('fecha_inicio') is-invalid @enderror" id="fecha_inicio"
                            placeholder="Fecha inicio" value="{{$tarea->fecha_inicio}}">
                        @error('fecha_inicio')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <br>

                    </div>

                    <div class="form group">
                        <label for="fecha_fin">
                            Fecha fin
                        </label>
                        <input type="date" name="fecha_fin"
                            class="form-control @error('fecha_fin') is-invalid @enderror" id="fecha_fin"
                            placeholder="Fecha fin" value="{{$tarea->fecha_fin}}">
                        @error('fecha_fin')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <br>

                    </div>

                    <div class="from-group">
                        <label for="estado">Estado</label>

                        <select name="estado" class="form-control @error('estado') is-invalid @enderror" id="estado"
                            @if($tarea->estado=='COMPLETADA')
                            disabled
                            @endif>


                            <option value="">
                                --SELECCIONE--
                            </option>
                            <option value="INICIADA" {{$tarea->estado=='INICIADA' ? 'selected':''}}>
                                INICIADA
                            </option>
                            <option value="EN PROCESO" {{$tarea->estado=='EN PROCESO' ? 'selected':''}}>
                                EN PROCESO
                            </option>
                            <option value="CANCELADA" {{$tarea->estado=='CANCELADA' ? 'selected':''}}>
                                CANCELADA
                            </option>
                            <option value="COMPLETADA" {{$tarea->estado=='COMPLETADA' ? 'selected':''}}>
                                COMPLETADA
                            </option>


                        </select>
                        @error('estado')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <br>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Guardar">
                    </div>
                </form>
            </div>
        </div>



        @endsection