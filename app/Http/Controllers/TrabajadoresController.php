<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Platillo;
use App\Bebida;
use App\Cliente;
use App\Promocion;
use App\Puesto;
use App\PuestoTrabajador;
use App\Trabajador;
use DB;

class TrabajadoresController extends Controller
{
    public function registrar(){
        $puesto=Puesto::all();
        return view('registrarTrabajadores', compact('puesto'));
    }

    public function consultar(){
    	
        $trabajador=DB::table('trabajador')
        ->join('puesto', 'trabajador.id_puesto', '=', 'puesto.id')
        ->select('trabajador.*', 'puesto.descripcion')
        ->get();

    	return view('/consultarTrabajadores', compact('trabajador'));
    }

    public function guardar(Request $datos){
    	$trabajador=new Trabajador();
    	$trabajador->nombre=$datos->input('nombre');
    	$trabajador->fecha_nacimiento=$datos->input('fecha_nacimiento');
    	$trabajador->direccion=$datos->input('direccion');
    	$trabajador->correo=$datos->input('correo');
    	$trabajador->telefono=$datos->input('telefono');
    	$trabajador->estado=$datos->input('estado');
        $trabajador->id_puesto=$datos->input('descripcion');
    	$trabajador->save();
    	flash('¡El Trabajador fue registrado exitosamente!')->success();
    	return redirect('/registrarTrabajadores');
    }

    public function editar($id){
    	$trabajador=DB::table('trabajador')
    	->where('trabajador.id', '=', $id)
        ->join('puesto', 'puesto.id', '=', 'trabajador.id_puesto')
        ->select('trabajador.*', 'puesto.descripcion')
    	->first();

        $puesto=Puesto::all();

    	return view('/editarTrabajador', compact('trabajador'), compact('puesto'));
    }

    public function actualizar($id, Request $datos){
    	$trabajador=Trabajador::find($id);
    	$trabajador->nombre=$datos->input('nombre');
    	$trabajador->direccion=$datos->input('direccion');
    	$trabajador->correo=$datos->input('correo');
    	$trabajador->telefono=$datos->input('telefono');
    	$trabajador->estado=$datos->input('estado');
        $trabajador->id_puesto=$datos->input('descripcion');
    	$trabajador->save();
    	flash('El trabajador ha sido actualizado con exito')->success();

    	return redirect('/consultarTrabajadores');
    }

    public function eliminar($id){
        $trabajador=Trabajador::find($id);
        $trabajador->delete();
        flash('¡El trabajador ha sido eliminado con exito!')->warning();
        return redirect('/consultarTrabajadores');
    }

    public function pdf(){
    	$trabajador=Trabajador::all();
    	$vista=view('trabajadorPDF', compact('trabajador'));
    	$pdf=\App::make('dompdf.wrapper');
    	$pdf->loadHTML($vista);
    	$pdf->setpaper('letter');
    	return $pdf->stream('ListadoTrabajador.pdf');
    }

    public function asignarPuesto($id){
        $trabajador=Trabajador::find($id);
        $lista=DB::table('puestotrabajador')
        ->join('puesto', 'puesto.id', '=', 'puestotrabajador.id_puesto')
        ->where('puestotrabajador.id_trabajador', '=', $id)
        ->pluck('puesto.id');

        $puestosNoAsignados=DB::table('puesto')
        ->WhereNotIn('puesto.id', $lista)
        ->select('puesto.descripcion', 'puesto.id')
        ->get();

        $puestosAsignados=DB::table('puesto')
        ->WhereIn('puesto.id', $lista)
        ->join('puestotrabajador', 'puesto.id', 'puestotrabajador.id_puesto')
        ->where('puestotrabajador.id_trabajador', '=', $id)
        ->select('puesto.descripcion', 'puesto.id')
        ->get();

        return view('/asignarPuesto', compact('puestosNoAsignados', 'puestosAsignados'));
    }
}