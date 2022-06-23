<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LogController extends Controller
{
    public function index(){
        return view('login1');

    }
    public function check(Request $request){
            if($request->name=="nodirbek" && $request->parol=="12345678"){

                return redirect()->route('product.index');
            }else{
                return redirect()->back()->withErrors('xato');
            }
    }
}
