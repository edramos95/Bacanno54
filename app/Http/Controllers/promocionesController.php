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

class promocionesController extends Controller
{
    public function registrar(){
    	$promocion=Promocion::all();
    	return view('/registrarPromociones', compact('promocion'));
    }

    public function consultar(){
    	$promocion=Promocion::all();

    	return view('/consultarPromociones', compact('promocion'));
    }

    public function guardar(Request $datos){
    	$promocion=new Promocion();
    	$promocion->descripcion=$datos->input('descripcion');
    	$promocion->fecha_inicio=$datos->input('fecha_inicio');
    	$promocion->fecha_fin=$datos->input('fecha_fin');
    	$promocion->save();
    	flash('¡La promocion fue guardada exitosamente!')->success();
    	return redirect('/registrarPromociones');
    }

    public function editar($id){
    	$promocion=DB::table('promocion')
    	->where('id', '=', $id)
    	->select('promocion.*')
    	->first();
    	return view('/editarPromocion', compact('promocion'));
    }

    public function actualizar($id, Request $datos){
    	$promocion=Promocion::find($id);
    	$promocion->descripcion=$datos->input('descripcion');
    	$promocion->fecha_inicio=$datos->input('fecha_inicio');
    	$promocion->fecha_fin=$datos->input('fecha_fin');
    	$promocion->save();

    	return redirect('/consultarPromociones');
    }

    public function eliminar($id){
        $promocion=Promocion::find($id);
        $promocion->delete();
        flash('¡La promocion ha sido eliminada con exito!')->warning();
        return redirect('/consultarPromociones');
    }

    public function pdf(){
    	$promocion=Promocion::all();
    	$vista=view('promocionPDF', compact('promocion'));
    	$pdf=\App::make('dompdf.wrapper');
    	$pdf->loadHTML($vista);
    	$pdf->setpaper('letter');
    	return $pdf->stream('ListadoPromociones.pdf');
    }
}