<?php

namespace App\Http\Controllers;

use App\Tarea;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TareaController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tareas = Auth::user()->tareas;
       
        $iniciados = DB::table('tareas')->where('estado','=','INICIADA')->count('estado');
        $proceso = DB::table('tareas')->where('estado','=','EN PROCESO')->count('estado');
        $canceladas = DB::table('tareas')->where('estado','=','CANCELADA')->count('estado');
        $completadas = DB::table('tareas')->where('estado','=','COMPLETADA')->count('estado');
       
        
       
        return view('tareas.index',compact('tareas','iniciados','proceso','canceladas','completadas')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tareas.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'Nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'estado' => 'required'
        ]);


       
        auth()->user()->tareas()->create([
            'Nombre' => $data['Nombre'],
            'fecha_inicio' => $data['fecha_inicio'],
            'fecha_fin' => $data['fecha_fin'],
            'estado' => $data['estado']

        ]);
        return redirect()->action('TareaController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function show(Tarea $tarea)
    {

      
      
        return view('tareas.show', compact('tarea','contar'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarea $tarea)
    {
        return view('tareas.edit', compact('tarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarea $tarea)
    {
        $this->authorize('update', $tarea);

        $data = request()->validate([
            'Nombre' => 'required',
            'fecha_inicio' => 'required',
            'fecha_fin' => 'required',
            'estado' => 'required'
        ]);

        $tarea->Nombre = $data['Nombre'];
        $tarea->fecha_inicio = $data['fecha_inicio'];
        $tarea->fecha_fin = $data['fecha_fin'];
        $tarea->estado = $data['estado'];


        $tarea->save();

        return redirect()->action('TareaController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarea  $tarea
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarea $tarea)
    {
        $this->authorize('delete', $tarea);
        $tarea->delete();

        return redirect()->action('TareaController@index');
    }

 
}
