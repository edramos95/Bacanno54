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

class clientesController extends Controller
{
    public function registrar(){
    	$cliente=Cliente::all();
    	return view('/registrarClientes', compact('cliente'));
    }

    public function consultar(){
    	$cliente=Cliente::all();

    	return view('/consultarClientes', compact('cliente'));
    }

    public function guardar(Request $datos){
    	$cliente=new Cliente();
    	$cliente->nombre=$datos->input('nombre');
    	$cliente->fecha_nacimiento=$datos->input('fecha_nacimiento');
        $cliente->sexo=$datos->input('sexo');
    	$cliente->direccion=$datos->input('direccion');
    	$cliente->correo=$datos->input('correo');
    	$cliente->telefono=$datos->input('telefono');
    	$cliente->estado_civil=$datos->input('estado_civil');
    	$cliente->hijos=$datos->input('hijos');
    	$cliente->save();
    	flash('¡El Cliente fue registrado exitosamente!')->success();
    	return redirect('/registrarClientes');
    }

    public function editar($id){
    	$cliente=DB::table('cliente')
    	->where('id', '=', $id)
    	->select('cliente.*')
    	->first();
    	return view('/editarCliente', compact('cliente'));
    }

    public function actualizar($id, Request $datos){
    	$cliente=Cliente::find($id);
    	$cliente->nombre=$datos->input('nombre');
        $cliente->sexo=$datos->input('sexo');
    	$cliente->direccion=$datos->input('direccion');
    	$cliente->correo=$datos->input('correo');
    	$cliente->telefono=$datos->input('telefono');
    	$cliente->estado_civil=$datos->input('estado_civil');
    	$cliente->save();
    	flash('El cliente ha sido actualizado con exito')->success();

    	return redirect('/consultarClientes');
    }

    public function eliminar($id){
        $cliente=Cliente::find($id);
        $cliente->delete();
        flash('¡El cliente ha sido eliminado con exito!')->warning();
        return redirect('/consultarClientes');
    }

    public function pdf(){
    	$cliente=Cliente::all();
    	$vista=view('ClientePDF', compact('cliente'));
    	$pdf=\App::make('dompdf.wrapper');
    	$pdf->loadHTML($vista);
    	$pdf->setpaper('letter');
    	return $pdf->stream('ListadoCliente.pdf');
    }
}