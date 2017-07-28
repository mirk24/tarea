<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Persona;

class personaController extends Controller
{
     public function inicio(){
        return view('persona/inicio');
    }

        public function apilistapersona(){
        return Persona::All();
    }

       public function apiborrarpersona($id){
        try{
        Persona::find($id)->delete();
        return ['estado'=>1];
        }catch(Exception $e)
        {
            return ['estado'=>0, 'error'=>$e];
        }
    }

     public function apicrearpersona(Request $reque){

        try{

            $nueva=new Persona;
            $nueva->Nombres=$reque->input('Nombres');
            $nueva->Ape_paterno=$reque->input('Ape_paterno');
            $nueva->save();
            return ['estado'=>1];
        }catch(Exception $e){
            return ['estado'=>0];
        }

        return "mala";
    }


    public function apigetpersona($id){
        try{
            //Musica::find($id);
            return Persona::find($id);
        }catch(Exception $e){
            
            return ['error'=>$e];
        }
    }
    public function  apieditarpersona(Request $reque){
        try{
            $edi=Persona::find($reque->input('id'));
            $edi->nombre=$reque->input('nombre');
            $edi->loggin=$reque->input('loggin');
            $edi->save();
            return ['estado'=>1];
        }catch(Exception $e){
            return ['estado'=>0,'error'=>$e];
        }

        
    }
}
