@extends('layouts.app')

@section('content')
@section('buttons')
<a href="{{route('tareas.index')}}" class="btn btn-primary mr-2">
    <-- Volver </a> @endsection <h2 class="text-center mb-5"> Crear nueva tarea </h2>

        <div class="row justify-content-center mt-5">

            <div class="col-md-8">
                <form method="POST" action="{{route('tareas.store')}}">
                    @csrf
                    <div class="form group">
                        <label for="Nombre">
                            Nombre de la tarea
                        </label>
                        <input type="text" name="Nombre" class="form-control @error('Nombre') is-invalid @enderror"
                            id="Nombre" placeholder="Nombre de la tarea" value={{old('Nombre')}}>
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
                            placeholder="Fecha inicio" value={{old('fecha_inicio')}}>
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
                        <input type="date" name="fecha_fin" class="form-control @error('fecha_fin') is-invalid @enderror"
                            id="fecha_fin" placeholder="Fecha fin" value={{old('fecha_fin')}}>
                        @error('fecha_fin')
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{$message}}</strong>
                        </span>
                        @enderror
                        <br>

                    </div>

                    <div class="from-group">
                        <label for="estado">Estado</label>

                        <select name="estado" class="form-control @error('estado') is-invalid @enderror" id="estado">
                            <option value="">
                                --SELECCIONE--
                            </option>
                            <option  value="INICIADA">
                                INICIADA
                            </option>
                            <option value="EN PROCESO">
                                EN PROCESO
                            </option>
                            <option value="CANCELADA">
                                CANCELADA
                            </option>
                            <option value="COMPLETADA">
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