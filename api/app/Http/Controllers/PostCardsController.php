<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostCardsController extends Controller
{

  public function Home(){
    $consulta= DB::table('productos')->where('id_productos',10)->get();
    $consulta_minprice=DB::select("CALL select_attr_for_id(10)");
    foreach ($consulta_minprice as $key ) {
      $especificacion=$key->id_especificaciones;
      $Rattr1=$key->attr1;
      $Rattr2=$key->attr2;
      $Rattr3=$key->attr3;
      $Rattr4=$key->attr4;
      $Rattr5=$key->attr5;
      $Rattr10=$key->attr10;
      $Rattr11=$key->attr11;
      $Rattr12=$key->attr12;
    }
    return view('postcards',['producto'=>$consulta,'especificacion'=>$especificacion,'attr1'=>$Rattr1,'attr2'=>$Rattr2,'attr3'=>$Rattr3,'attr4'=>$Rattr4,'attr5'=>$Rattr5,'attr10'=>$Rattr10,'attr11'=>$Rattr11,'attr12'=>$Rattr12]);
  }

  public function attr1(){
    $consulta_attr1=DB::select("CALL consulta_attr1_inicial(10)");
    return response()->json($consulta_attr1);
  }

  public function attr2($at1){
    $consulta_attr2=DB::select('CALL consulta_attr2_inicial(?,?)',[10,$at1]);
    return response()->json($consulta_attr2);

  }

  public function attr3($at1,$at2){
    $consulta_attr3=DB::select('CALL consulta_attr3_inicial(?,?,?)',[10,$at1,$at2]);
    return response()->json($consulta_attr3);
  }

  public function attr4(Request $request){
    $at1 = $request->atr1;
    $at2 = $request->atr2;
    $at3 = $request->atr3;
    $consulta_attr4=DB::select('CALL consulta_attr4_inicial(?,?,?,?)',[10,$at1,$at2,$at3]);
    return response()->json($consulta_attr4);
  }

  public function attr5(Request $request){
    $at1 = $request->atr1;
    $at2 = $request->atr2;
    $at3 = $request->atr3;
    $at4 = $request->atr4;
    $consulta_attr5=DB::select("SELECT DISTINCT(attr5) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND attr3='$at3' AND attr4='$at4'");
    return response()->json($consulta_attr5);
  }

  public function attr10(Request $request){
    $at1 = $request->atr1;
    $at2 = $request->atr2;
    $at3 = $request->atr3;
    $at4 = $request->atr4;
    $consulta_attr10=DB::select("SELECT DISTINCT(attr10) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND attr3='$at3' AND attr4='$at4'");
    return response()->json($consulta_attr10);
  }

  public function attr10_5(Request $request){
    $at1 = $request->atr1;
    $at2 = $request->atr2;
    $at3 = $request->atr3;
    $at4 = $request->atr4;
    $at5 = $request->atr5;
    $consulta_attr10=DB::select("SELECT DISTINCT(attr10) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND attr3='$at3' AND attr4='$at4' AND attr5='$at5'  ORDER by attr10");
    return response()->json($consulta_attr10);
  }

  public function attr11(Request $request){
    $at1 = $request->atr1;
    $at2 = $request->atr2;
    $at3 = $request->atr3;
    $at4 = $request->atr4;
    $at10 = $request->atr10;
    $consulta_attr11=DB::select("SELECT DISTINCT(attr11) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND attr3='$at3' AND attr4='$at4' AND attr10='$at10'");
    return response()->json($consulta_attr11);
  }

  public function attr11_5(Request $request){
    $at1 = $request->atr1;
    $at2 = $request->atr2;
    $at3 = $request->atr3;
    $at4 = $request->atr4;
    $at5 = $request->atr5;
    $at10 = $request->atr10;
    $consulta_attr11=DB::select("SELECT DISTINCT(attr11) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND attr3='$at3' AND attr4='$at4' AND attr5='$at5' AND attr10='$at10'");
    return response()->json($consulta_attr11);
  }

  public function postcardsattr1($attr1){
    $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr1,attr2,attr3,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
    JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$attr1' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$attr1')
    GROUP by especificaciones.id_especificaciones=1");
    return response()->json($consulta_all_min);
  }

  public function postcardsattr2(Request $Request,$attr1,$attr2){
    $consultaattr2=DB::select("SELECT especificaciones.id_especificaciones,attr3,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$attr1' AND attr2='$attr2' AND
    attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$attr1' AND attr2='$attr2')GROUP by especificaciones.id_especificaciones=1");
    return response()->json($consultaattr2);
  }

  public function postcardsattr3(Request $Request,$attr1,$attr2,$attr3){
  $consultaattr3=DB::select("SELECT especificaciones.id_especificaciones,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$attr1' AND attr2='$attr2' AND
  attr3='$attr3' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3')GROUP by especificaciones.id_especificaciones=1");
  return response()->json($consultaattr3);
  }

  public function postcardsattr4(Request $request){
    $at1 = $request->atr1;
    $at2 = $request->atr2;
    $at3 = $request->atr3;
    $at4 = $request->atr4;
    $consultaattr4=DB::select("SELECT especificaciones.id_especificaciones,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND
    attr3='$at3' AND attr4='$at4' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$at1' AND attr2='$at2' AND attr3='$at3' AND attr4='$at4')
    GROUP by especificaciones.id_especificaciones=1");
    return response()->json($consultaattr4);
  }

    public function postcardsattr5(Request $request){
      $at1 = $request->atr1;
      $at2 = $request->atr2;
      $at3 = $request->atr3;
      $at4 = $request->atr4;
      $at5 = $request->atr5;
      $consultaattr5=DB::select("SELECT especificaciones.id_especificaciones,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND
      attr3='$at3' AND attr4='$at4' AND attr5='$at5' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$at1' AND attr2='$at2' AND attr3='$at3'
      AND attr4='$at4' AND attr5='$at5' ) GROUP by especificaciones.id_especificaciones=1");
      return response()->json($consultaattr5);
    }

    public function postcardsattr10(Request $request){
      $at1 = $request->atr1;
      $at2 = $request->atr2;
      $at3 = $request->atr3;
      $at4 = $request->atr4;
      $at10 = $request->atr10;
      $consultaattr10=DB::select("SELECT especificaciones.id_especificaciones,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND
      attr3='$at3' AND attr4='$at4' AND attr10='$at10' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$at1' AND attr2='$at2' AND attr3='$at3'
      AND attr4='$at4' AND attr10='$at10') GROUP by especificaciones.id_especificaciones=1");
      return response()->json($consultaattr10);
    }

    public function postcardsattr10_5(Request $request){
      $at1 = $request->atr1;
      $at2 = $request->atr2;
      $at3 = $request->atr3;
      $at4 = $request->atr4;
      $at5 = $request->atr5;
      $at10 = $request->atr10;
      $consultaattr10=DB::select("SELECT especificaciones.id_especificaciones,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND
      attr3='$at3' AND attr4='$at4' AND attr5='$at5' AND attr10='$at10' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$at1' AND attr2='$at2' AND attr3='$at3'
      AND attr4='$at4' AND attr5='$at5' AND attr10='$at10') GROUP by especificaciones.id_especificaciones=1");
      return response()->json($consultaattr10);
    }

    public function postcardsattr11(Request $request){
      $at1 = $request->atr1;
      $at2 = $request->atr2;
      $at3 = $request->atr3;
      $at4 = $request->atr4;
      $at10 = $request->atr10;
      $at11 = $request->atr11;
      $consultaattr10=DB::select("SELECT especificaciones.id_especificaciones,attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND
      attr3='$at3' AND attr4='$at4' AND attr10='$at10' AND attr11='$at11'");
      return response()->json($consultaattr10);
    }

    public function postcardsattr11_5(Request $request){
      $at1 = $request->atr1;
      $at2 = $request->atr2;
      $at3 = $request->atr3;
      $at4 = $request->atr4;
      $at5 = $request->atr5;
      $at10 = $request->atr10;
      $at11 = $request->atr11;
      $consultaattr10=DB::select("SELECT especificaciones.id_especificaciones,attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$at1' AND attr2='$at2' AND
      attr3='$at3' AND attr4='$at4' AND attr5='$at5' AND attr10='$at10' AND attr11='$at11'");
      return response()->json($consultaattr10);
    }

    //Carro:

    public function quantity_car(Request $request){
      $attr1 = $request->atr1;
      $attr2 = $request->atr2;
      $attr3 = $request->atr3;
      $attr4 = $request->atr4;
      $attr10 = $request->atr10;
      $consulta_11=DB::select("SELECT especificaciones.id_especificaciones,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'
      AND attr4='$attr4' AND attr10='$attr10'");
      $select_11=DB::select("SELECT DISTINCT(attr11) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr10=$attr10");
      return response()->json( array($consulta_11,$select_11));
    }

    public function quantity_car5(Request $request){
      $attr1 = $request->atr1;
      $attr2 = $request->atr2;
      $attr3 = $request->atr3;
      $attr4 = $request->atr4;
      $attr5 = $request->atr5;
      $attr10 = $request->atr10;
      $consulta_11=DB::select("SELECT especificaciones.id_especificaciones,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=10 and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'
      AND attr4='$attr4' AND attr5='$attr5' AND attr10='$attr10'");
      $select_11=DB::select("SELECT DISTINCT(attr11) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=10 AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr10=$attr10");
      return response()->json( array($consulta_11,$select_11));
    }

}
