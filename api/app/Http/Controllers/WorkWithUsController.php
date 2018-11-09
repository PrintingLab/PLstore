<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Email_Work;
use Illuminate\Support\Facades\Mail;

class WorkWithUsController extends Controller
{

  public function home(){
    return view('work-with-us');
  }

  public function EnviarCorreo(Request $Request){
    $nombre= $Request->nombre;
    $telefono=$Request->telefono;
    $email=$Request->email;
    $comentario=$Request->comentario;
    $emailE='contacto@tienda.printinglab.com';
    $imagen=$Request->archivo;
    //dd($imagen);
    $select_option=$Request->Job;
    if ($imagen==null) {
      $ruta=('sin archivo');
      $datos= ['nombre' =>$nombre,
      'telefono'=>$telefono,
      'email' =>$email,
      'Options'=>$select_option,
      'comentario' =>$comentario,
      'ruta'=>$ruta
    ];
    Mail::to($emailE)->send(new Email_Work($datos));
    return view('work-with-us');
  }else {
    $imagen=$Request->file('archivo');
    $nombre_image=$imagen->getClientOriginalName();
    $nombre_imageF=rand(1,9999).'-'.date('H').'-'.date('d').'-'.date('F').'-'.date('Y').'-'.$email.$nombre_image;
    $imagen->move('img-mail/',$nombre_imageF);
    $rutaimg='img-mail/'.$nombre_imageF;
    $datos= ['nombre' =>$nombre,
    'telefono'=>$telefono,
    'email' =>$email,
    'Options'=>$select_option,
    'comentario' =>$comentario,
    'ruta'=>$rutaimg,
  ];
  Mail::to($emailE)->send(new Email_Work($datos));
  return view('work-with-us');
}

}

}
