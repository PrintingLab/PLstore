<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CouponesController extends Controller
{

  public function consult(Request $request){

    $code_cuopons =$request->codigo;




    return response()->json($code_cuopons);



  }


}
