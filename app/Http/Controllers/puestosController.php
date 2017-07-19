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

class puestosController extends Controller
{
    public function registrar(){
    	$puesto=Puesto::all();
    	return view('/registrarPuestos', compact('puesto'));
    }

    public function consultar(){
    	$puesto=Puesto::all();

    	return view('/consultarPuestos', compact('puesto'));
    }

    public function guardar(Request $datos){
    	$puesto=new Puesto();
    	$puesto->descripcion=$datos->input('descripcion');
    	$puesto->save();
    	flash('¡El puesto fue registrado exitosamente!')->success();
    	return redirect('/registrarPuestos');
    }

    public function editar($id){
    	$puesto=DB::table('puesto')
    	->where('id', '=', $id)
    	->select('puesto.*')
    	->first();
    	return view('/editarPuesto', compact('puesto'));
    }

    public function actualizar($id, Request $datos){
    	$puesto=Puesto::find($id);
    	$puesto->descripcion=$datos->input('descripcion');
    	$puesto->save();
    	flash('El puesto ha sido actualizado con exito')->success();

    	return redirect('/consultarPuestos');
    }

    public function eliminar($id){
        $puesto=Puesto::find($id);
        $puesto->delete();
        flash('¡El puesto ha sido eliminado con exito!')->warning();
        return redirect('/consultarPuestos');
    }

    public function pdf(){
    	$puesto=Puesto::all();
    	$vista=view('puestoPDF', compact('puesto'));
    	$pdf=\App::make('dompdf.wrapper');
    	$pdf->loadHTML($vista);
    	$pdf->setpaper('letter');
    	return $pdf->stream('ListadoPuestos.pdf');
    }
}