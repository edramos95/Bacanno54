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

class puestostrabajadoresController extends Controller
{
    public function pdf($id){

		$puesto=Puesto::find($id);

        $lista=DB::table('puestotrabajador')
        ->join('puesto', 'puesto.id', '=', 'puestotrabajador.id_puesto')
        ->where('puestotrabajador.id_trabajador', '=', $id)
        ->pluck('puesto.id');


        $puestosAsignados=DB::table('puesto')
        ->WhereIn('puesto.id', $lista)
        ->join('puestotrabajador', 'puesto.id', '=', 'puestotrabajador.id_puesto')
        ->where('puestotrabajador.id_trabajador', '=', $id)
        ->select('puesto.descripcion', 'puesto.id')
        ->get();

        $vista=view('puestotrabajadorPDF', compact('puesto', 'puestosAsignados'));
        $pdf=\App::make('dompdf.wrapper');
    	$pdf->loadHTML($vista);
    	$pdf->setpaper('letter');
    	return $pdf->stream('ListadoPuestosTrabajadores.pdf');
	}
}
