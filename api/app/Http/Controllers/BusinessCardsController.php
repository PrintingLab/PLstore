<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BusinessCardsController extends Controller
{

  public function StandardBusiness($id_product){
    $consulta= DB::table('productos')->where('id_productos',$id_product)->get();
    $consulta_minprice=DB::select("CALL  select_attr_for_id($id_product)");
    foreach ($consulta_minprice as $key ) {
      $especificacion=$key->id_especificaciones;
      $Rattr1=$key->attr1;
      $Rattr2=$key->attr2;
      $Rattr3=$key->attr3;
      $Rattr4=$key->attr4;
      $Rattr5=$key->attr5;
      $Rattr6=$key->attr6;
      $Rattr10=$key->attr10;
      $Rattr11=$key->attr11;
      $Rattr12=$key->attr12;
    }
    return view('business-cards',['producto'=>$consulta,'especificacion'=>$especificacion,'attr1'=>$Rattr1,'attr2'=>$Rattr2,'attr3'=>$Rattr3,'attr4'=>$Rattr4,'attr5'=>$Rattr5,'attr6'=>$Rattr6,'attr10'=>$Rattr10,'attr11'=>$Rattr11,'attr12'=>$Rattr12]);
  }

  public function attr1($id_product){
    $consulta_attr1=DB::select("CALL consulta_attr1_inicial($id_product)");
    return response()->json($consulta_attr1);
  }

  public function attr2( $id_product,$at1){
    $consulta_attr2=DB::select("SELECT DISTINCT(attr2) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$at1'");
    return response()->json($consulta_attr2);
  }

  public function attr3(Request $request){
    $id_product = $request->idp;
    $attr1 = $request->atr1;
    $attr2 = $request->atr2;
    $consulta_attr3=DB::select("SELECT DISTINCT(attr3) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2'");
    return response()->json($consulta_attr3);
  }

  public function attr4(Request $request){
    $id_product = $request->idp;
    $attr1 = $request->atr1;
    $attr2 = $request->atr2;
    $attr3 = $request->atr3;
    $consulta_attr4=DB::select("SELECT DISTINCT(attr4) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'");
    return response()->json($consulta_attr4);
  }

  public function attr5(Request $request){
    $id_product = $request->idp;
    $attr1 = $request->atr1;
    $attr2 = $request->atr2;
    $attr3 = $request->atr3;
    $attr4 = $request->atr4;
    $consulta_attr5=DB::select("SELECT DISTINCT(attr5) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4'");
    return response()->json($consulta_attr5);
  }

  public function attr10(Request $request){
    $id_product = $request->idp;
    $attr1 = $request->atr1;
    $attr2 = $request->atr2;
    $attr3 = $request->atr3;
    $attr4 = $request->atr4;
    $attr5 = $request->atr5;
    $consulta_attr10=DB::select("SELECT DISTINCT(attr10) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5'");
    return response()->json($consulta_attr10);
  }

  public function attr11(Request $request){
    $id_product = $request->idp;
    $attr1 = $request->atr1;
    $attr2 = $request->atr2;
    $attr3 = $request->atr3;
    $attr4 = $request->atr4;
    $attr5 = $request->atr5;
    $attr10 = $request->atr10;
    $consulta_attr11=DB::select("SELECT DISTINCT(attr11)  FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr10=$attr10");
    return response()->json($consulta_attr11);
  }

  public function size_business_cards($id_product,$at1){
    $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr1,attr2,attr3,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones
      JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$at1' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$at1')
      GROUP by especificaciones.id_especificaciones=1");
      return response()->json($consulta_all_min);
    }

    public function papertype_business_cards($id_product,$at1,$at2){
      $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr3,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$at1' AND attr2='$at2' AND
        attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$at1' AND attr2='$at2')GROUP by especificaciones.id_especificaciones=1");
        return response()->json($consulta_all_min);
      }

      public function color_business_cards($id_product,$at1,$at2){
        $consulta_all_min=DB::select("SELECT DISTINCT(attr6) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$at1' AND attr2='$at2'");
        return response()->json($consulta_all_min);
      }

      public function edgecolor_change_businesscards(Request $request,$id_product,$attr1,$attr2,$attr3,$attr4,$attr5,$attr6,$attr10,$attr11){
        $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos='$id_product' and attr1='$attr1' and attr2='$attr2'
          and attr3='$attr3' and attr4='$attr4' and attr5='$attr5' and attr6='$attr6' and attr10='$attr10' and attr11='$attr11' ");
          return response()->json($consulta_all_min);
        }

        public function printedside_business_cards(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
        //  $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr3,attr4,attr5,attr6,attr10,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'");
        $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND
          attr3='$attr3' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3')GROUP by especificaciones.id_especificaciones=1");
          return response()->json($consulta_all_min);
        }
        public function printedside_business_cards_color(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
          $attr6 = $request->atr6;
        //  $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr3,attr4,attr5,attr6,attr10,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'  AND attr6='$attr6'");
         $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND
          attr3='$attr3' AND attr6='$attr6' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr6='$attr6')
          GROUP by especificaciones.id_especificaciones=1");
          return response()->json($consulta_all_min);
        }
        public function coating_business_cards(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
          $attr4 = $request->atr4;
        //  $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr3,attr4,attr5,attr6,attr10,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4'");
        $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND
         attr3='$attr3' AND attr4='$attr4' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4')
         GROUP by especificaciones.id_especificaciones=1");
          return response()->json($consulta_all_min);
        }

        public function corners_business_cards(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
          $attr4 = $request->atr4;
          $attr5 = $request->atr5;
          //$consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr3,attr4,attr5,attr6,attr10,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5'");
          $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND
           attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4'
           AND attr5='$attr5') GROUP by especificaciones.id_especificaciones=1");
          return response()->json($consulta_all_min);
        }

        public function quantity_business_cards(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
          $attr4 = $request->atr4;
          $attr5 = $request->atr5;
          $attr10 = $request->atr10;
          //$consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr10='$attr10'");
          $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND
           attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5'  AND attr10='$attr10' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'
            AND attr4='$attr4' AND attr5='$attr5' AND attr10='$attr10') GROUP by especificaciones.id_especificaciones=1");
          return response()->json($consulta_all_min);
        }

        public function quantity_business_cards_color(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
          $attr4 = $request->atr4;
          $attr5 = $request->atr5;
          $attr6 = $request->atr6;
          $attr10 = $request->atr10;
          //$consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr6='$attr6' AND attr10='$attr10'");
          $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones,attr4,attr5,attr6,attr10,attr11, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND
           attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr6='$attr6' AND attr10='$attr10' AND attr12=(SELECT MIN(attr12) FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones=especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'
            AND attr4='$attr4' AND attr5='$attr5' AND attr6='$attr6' AND attr10='$attr10') GROUP by especificaciones.id_especificaciones=1");
          return response()->json($consulta_all_min);
        }

        public function printingtime_business_cards(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
          $attr4 = $request->atr4;
          $attr5 = $request->atr5;
          $attr6 = $request->atr6;
          $attr10 = $request->atr10;
          $attr11 = $request->atr11;
          $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr6='$attr6' AND attr10='$attr10' AND attr11='$attr11'");
          return response()->json($consulta_all_min);
        }

        public function printingtime_business_cards_color(Request $request){
          $id_product = $request->idp;
          $attr1 = $request->atr1;
          $attr2 = $request->atr2;
          $attr3 = $request->atr3;
          $attr4 = $request->atr4;
          $attr5 = $request->atr5;
          $attr10 = $request->atr10;
          $attr11 = $request->atr11;
          $consulta_all_min=DB::select("SELECT especificaciones.id_especificaciones, attr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr10='$attr10' AND attr11='$attr11'");
          return response()->json($consulta_all_min);
        }

//car
public function quantity_business_cards_car(Request $request){
  $id_product = $request->idp;
  $attr1 = $request->atr1;
  $attr2 = $request->atr2;
  $attr3 = $request->atr3;
  $attr4 = $request->atr4;
  $attr5 = $request->atr5;
  $attr10 = $request->atr10;
  $consulta_11=DB::select("SELECT especificaciones.id_especificaciones,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'
  AND attr4='$attr4' AND attr5='$attr5' AND attr10='$attr10'");
  $select_11=DB::select("SELECT DISTINCT(attr11)  FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr10=$attr10");
  return response()->json( array($consulta_11,$select_11));
}

public function quantity_business_cards_car2(Request $request){
  $id_product = $request->idp;
  $attr1 = $request->atr1;
  $attr2 = $request->atr2;
  $attr3 = $request->atr3;
  $attr4 = $request->atr4;
  $attr5 = $request->atr5;
  $attr6 = $request->atr6;
  $attr10 = $request->atr10;
  $consulta_11=DB::select("SELECT especificaciones.id_especificaciones,attr11, MIN(attr12) as atr12 FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos= especixproduct.id_productos WHERE especixproduct.id_productos=$id_product and attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3'
  AND attr4='$attr4' AND attr5='$attr5' AND attr6='$attr6' AND attr10='$attr10'");
  $select_11=DB::select("SELECT DISTINCT(attr11)  FROM especificaciones JOIN especixproduct ON especixproduct.id_especificaciones= especificaciones.id_especificaciones JOIN productos on productos.id_productos=especixproduct.id_productos WHERE productos.id_productos=$id_product AND attr1='$attr1' AND attr2='$attr2' AND attr3='$attr3' AND attr4='$attr4' AND attr5='$attr5' AND attr6='$attr6' AND attr10=$attr10");
  return response()->json( array($consulta_11,$select_11));
}

      }
