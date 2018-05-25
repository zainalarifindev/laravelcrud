<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Aduan;
use App\Kategori;
use Auth;
use File;
class AduanController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        $data_Aduan=Aduan::all();
        return view('aduan.index')->with('data_Aduan',$data_Aduan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data_Kategori=Kategori::all();
        return view('aduan.create')->with('data_Kategori',$data_Kategori);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        request()->validate([
            'judul'=>'required|min:5',
            'isi'=>'required|min:35',
            'gambar'=>'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.request()->gambar->getClientOriginalExtension();
        request()->gambar->move(public_path('images'),$imageName);



        $Aduan =new Aduan();
        $Aduan->judul = $request->judul;
        $Aduan->isi = $request->isi;
        $Aduan->kategori_id=$request->Kategori;
        $Aduan->user_id=Auth::User()->id;
        $Aduan->gambar = $imageName;
        $Aduan->save();
        $request->session()->flash('status','data_telah tersimpan');
        return redirect()->action('AduanController@index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Aduan=Aduan::find($id);
        $data_Kategori=Kategori::all();
        return view('aduan.edit')->with('Aduan',$Aduan)->with('data_Kategori',$data_Kategori);
        // 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'judul'=>'required|min:5',
            'isi'=>'required|min:10',
            'gambar'=>'sometimes|nullable|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        // $imageName = time().'.'.request()->gambar->getClientOriginalExtension();
        // request()->gambar->move(public_path('images'),$imageName);


        $Aduan=Aduan::find($id);
        $Aduan->judul = $request->judul;
        $Aduan->isi = $request->isi;
        $Aduan->kategori_id=$request->Kategori;
        $Aduan->user_id=Auth::User()->id;

        if(!empty($request->gambar)){
            File::delete(public_path("images/".$Aduan->gambar));
            $imageName=time().'.'.request()->gambar->getClientOriginalExtension();
            request()->gambar->move(public_path("images"),$imageName);
            $Aduan->gambar=$imageName;
        }

        $Aduan->save();
        $request->session()->flash('status','data_telah tersimpan');
        return redirect()->action('AduanController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,  Request $request)
    {
        $Aduan=Aduan::find($id);
        $Aduan->delete();
        $request->session()->flash('status','data_telah terhapus');
        return redirect()->action('AduanController@index');
    }
}
