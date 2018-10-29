<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CalendarsController extends Controller
{
     public function Home(){
       $consulta= DB::table('productos')->where('id_productos',7)->get();
       $consulta_minprice=DB::select("CALL select_attr_for_id(7)");

       foreach ($consulta_minprice as $key ) {
         $especificacion=$key->id_especificaciones;
         $Rattr1=$key->attr1;
         $Rattr2=$key->attr2;
         $Rattr3=$key->attr3;
         $Rattr4=$key->attr4;
         $Rattr5=$key->attr5;
         $Rattr6=$key->attr6;
         $Rattr7=$key->attr7;
         $Rattr10=$key->attr10;
         $Rattr11=$key->attr11;
         $Rattr12=$key->attr12;
       }

       return view('calendars',['producto'=>$consulta,'especificacion'=>$especificacion,'attr1'=>$Rattr1,'attr2'=>$Rattr2,'attr3'=>$Rattr3,'attr4'=>$Rattr4,'attr5'=>$Rattr5,'attr6'=>$Rattr6,'attr7'=>$Rattr7,'attr10'=>$Rattr10,'attr11'=>$Rattr11,'attr12'=>$Rattr12]);
    }
}
