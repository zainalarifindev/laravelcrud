<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
class KategoriController extends Controller
{
     public function __construct(){
        $this->middleware('auth');
    }
    
    function index(){
    	$data_Kategori=Kategori::all();
    	return view('kategori.index')->with('data_Kategori',$data_Kategori);
    }
    function create(){
        
    	return view('kategori.create');
    }
    function store(Request $request){
    	$Kategori =new Kategori();
    	$Kategori->nama = $request->nama;
    	$Kategori->keterangan = $request->keterangan;
    	$Kategori->save();
    	$request->session()->flash('status','data_telah tersimpan');
    	return redirect()->action('KategoriController@index');
    }
    function show($id){

    }
    function edit($id){
    	$Kategori=Kategori::find($id);
    	return view('kategori.edit')->with('Kategori',$Kategori);
    }
    function update(Request $request,$id){
    	$Kategori=Kategori::find($id);
    	$Kategori->nama = $request->nama;
    	$Kategori->keterangan = $request->keterangan;
    	$Kategori->save();
    	$request->session()->flash('status','data_telah tersimpan');
    	return redirect()->action('KategoriController@index');
    }
    function destroy($id, Request $request){
    	 $Kategori = Kategori::find($id);
        if($Kategori->Aduan->count()){
            return redirect()->action('KategoriController@index')->with('danger','Masih terdapat Aduan terkait kategori '.$Kategori->nama);        
        }else{
            $Kategori->delete();
            return redirect()->action('KategoriController@index')->with('status','Data Berhasil dihapus');
        }

    }
}
