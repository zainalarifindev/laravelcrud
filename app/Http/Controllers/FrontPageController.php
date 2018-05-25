<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aduan;

class FrontPageController extends Controller
{
       public function index(){
        $data_Aduan  = Aduan::all();
        return view('frontpage.index')->with('data_Aduan',$data_Aduan);
    }

    
    public function show($id){
        $Aduan = Aduan::find($id);
        return view('frontpage.show')->with('Aduan', $Aduan);
        
    }
}
