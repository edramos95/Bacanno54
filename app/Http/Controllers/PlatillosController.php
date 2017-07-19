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

class PlatillosController extends Controller
{
    public function registrar(){
    	$platillo=Platillo::all();
    	return view('/registrarPlatillos', compact('platillo'));
    }

    public function consultar(){
    	$platillo=Platillo::all();

    	return view('/consultarPlatillos', compact('platillo'));
    }

    public function guardar(Request $datos){
    	$platillo=new Platillo();
    	$platillo->nombre=$datos->input('nombre');
    	$platillo->descripcion=$datos->input('descripcion');
    	$platillo->precio=$datos->input('precio');
    	$platillo->save();
    	flash('¡El platillo fue guardado exitosamente!')->success();
    	return redirect('/registrarPlatillos');
    }

    public function editar($id){
    	$platillo=DB::table('platillo')
    	->where('id', '=', $id)
    	->select('platillo.*')
    	->first();
    	return view('/editarPlatillo', compact('platillo'));
    }

    public function actualizar($id, Request $datos){
    	$platillo=Platillo::find($id);
    	$platillo->nombre=$datos->input('nombre');
    	$platillo->descripcion=$datos->input('descripcion');
    	$platillo->precio=$datos->input('precio');
    	$platillo->save();

    	return redirect('/consultarPlatillos');
    }

    public function eliminar($id){
        $platillo=Platillo::find($id);
        $platillo->delete();
        flash('¡El platillo ha sido eliminado con exito!')->warning();
        return redirect('/consultarPlatillos');
    }

    public function pdf(){
    	$platillo=Platillo::all();
    	$vista=view('platillosPDF', compact('platillo'));
    	$pdf=\App::make('dompdf.wrapper');
    	$pdf->loadHTML($vista);
    	$pdf->setpaper('letter');
    	return $pdf->stream('ListadoPlatillos.pdf');
    }
}
