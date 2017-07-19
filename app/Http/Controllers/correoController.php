<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cliente;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Mail;
use Storage;


class correoController extends Controller{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crear()
    {

        return view("form_mail");
        

    }

     public function enviar(Request $request){
    
    $pathToFile="";
    $containfile=false; 
    if($request->hasFile('file') ){
       $containfile=true; 
       $file = $request->file('file');
       $nombre=$file->getClientOriginalName();
       $pathToFile= storage_path('app') ."/". $nombre;
    }

    $clientes = Cliente::all();


    $destinatario;

    foreach ($clientes as $c) {
        if ($c->sexo==0){
            $destinatario = $c->correo;
        }
        elseif ($c->sexo==1){
            $destinatario = $c->correo;
        }
        elseif ($c->sexo==2){
            $destinatario = $c->correo;
        }
    }

   // $destinatario=$request->input("destinatario");
    $asunto=$request->input("asunto");
    $contenido=$request->input("contenido_mail");
   
    $data = array('contenido' => $contenido);
    $r= Mail::send('plantilla_correo', $data, function ($message) use ($asunto, $destinatario, $containfile, $pathToFile) {
        $message->from('edramos1995@gmail.com', 'Bacanno 54');
        $message->to($destinatario)->subject($asunto);
       if($containfile){
        $message->attach($pathToFile);
        }

    });
        
    if($r){   
             if($containfile){ Storage::disk('local')->delete($nombre); }        
            return view("msj_correcto")->with("msj","Correo Enviado correctamente");   
    }
    else
    {            
         return view("msj_rechazado")->with("msj","Correo enviado correctamente");  
    }

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function enviar_correo(){
        $cliente=Cliente::all();

        foreach ($cliente as $c){
            if($c->sexo==0){
                Mail::send('emails.reminder', ['cliente' => $cliente], function($m) use ($cliente){
                    $m->from('','Bacanno 54');

                    $m->to($cliente->correo, $cliente->nombre)->subject('Tus clientes');
                });
            }
            elseif($c->sexo==1){
                Mail::send('emails.reminder', ['cliente' => $cliente], function($m) use ($cliente){
                    $m->from('','Bacanno 54');

                    $m->to($cliente->correo, $cliente->nombre)->subject('Tus clientes');
                });
            }
            elseif($c->sexo==2){
                Mail::send('emails.reminder', ['cliente' => $cliente], function($m) use ($cliente){
                    $m->from('','Bacanno 54');

                    $m->to($cliente->correo, $cliente->nombre)->subject('Tus clientes');
                });
            }
        }
    }

    public function store(Request $request)
    {
        if($request->hasFile('file') ){ 
         
        $file = $request->file('file');
        $extension = $file->getClientOriginalExtension();
        $nombre=$file->getClientOriginalName();
        $r= Storage::disk('local')->put($nombre,  \File::get($file));
       

         } 
         else{

            return "no";
         } 

        if($r){
            return $nombre ;
        }
        else
        {
            return "Error, vuelva a intentarlo";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}