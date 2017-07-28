<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Video;
class StorageController extends Controller
{
    public function index()
   {
      return \View::make('formulario/new');
   }

     public function video()
   {
      return View('formulario/video');
   }

    public function apilistavideo(){
         return Video::All();
    }
    

   public function save(Request $request)
    {
 
    try
      {
       $file = $request->file('file');
       $nombre = $file->getClientOriginalName();
       \Storage::disk('local')->put($nombre,  \File::get($file));
       $nueva=new Video;
       $nueva->nombre=$nombre;
       $nueva->direccion='/storage/'.$nombre;
       $nueva->contador='0';
       $nueva->save();
           return redirect('formulario');
        }catch(Exception $e){
            return ['error'=>$e];
 
        }
 }
} 
