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

class bebidasController extends Controller
{
     public function registrar(){
    	$bebida=Bebida::all();
    	return view('/registrarBebidas', compact('bebida'));
    }

    public function consultar(){
    	$bebida=Bebida::all();

    	return view('/consultarBebidas', compact('bebida'));
    }

    public function guardar(Request $datos){
    	$bebida=new Bebida();
    	$bebida->nombre=$datos->input('nombre');
    	$bebida->descripcion=$datos->input('descripcion');
    	$bebida->precio=$datos->input('precio');
    	$bebida->save();
    	flash('¡La bebida fue guardada exitosamente!')->success();
    	return redirect('/registrarBebidas');
    }

    public function editar($id){
    	$bebida=DB::table('bebida')
    	->where('id', '=', $id)
    	->select('bebida.*')
    	->first();
    	return view('/editarBebida', compact('bebida'));
    }

    public function actualizar($id, Request $datos){
    	$bebida=Bebida::find($id);
    	$bebida->nombre=$datos->input('nombre');
    	$bebida->descripcion=$datos->input('descripcion');
    	$bebida->precio=$datos->input('precio');
    	$bebida->save();

    	return redirect('/consultarBebidas');
    }

    public function eliminar($id){
        $bebida=Bebida::find($id);
        $bebida->delete();
        flash('¡La bebida ha sido eliminada con exito!')->warning();
        return redirect('/consultarBebidas');
    }

    public function pdf(){
    	$bebida=Bebida::all();
    	$vista=view('bebidasPDF', compact('bebida'));
    	$pdf=\App::make('dompdf.wrapper');
    	$pdf->loadHTML($vista);
    	$pdf->setpaper('letter');
    	return $pdf->stream('ListadoBebidas.pdf');
    }
}
