<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }


    public function index()
    {
        $data_User=User::all();
        return view('user.index')->with('data_User',$data_User);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData =$request->validate([
        'name'=>'required|min:3|max:255',
        'email'=>'required|email',
        'password'=>'required|alpha_num|between:6,20}confirmed'
        ]);

        $User =new User();
        $User->name = $request->name;
        $User->email = $request->email;
        $User->password = Hash::make($request->password);
        $User->level = 0;
        $User->save();
        $request->session()->flash('status','data_telah tersimpan');
        return redirect()->action('UserController@index');
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
        $User=User::find($id);
        return view('user.edit')->with('User',$User);
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
        $User=User::find($id);
        $validatedData =$request->validate([
        'name'=>'required|min:3|max:255',
        'email'=>'required|email',
        'password'=>'sometimes|nullable|alpha_num|between:6,20|confirmed'
        ]);
        $User->name = $request->name;
        $User->email = $request->email;

        if(!empty($request->password)){
       
        $User->password = Hash::make($request->password);
        
        }

        $User->save();
        $request->session()->flash('status','data_telah tersimpan');
        return redirect()->action('UserController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        $User=User::find($id);

    if(\Auth::User()->id==$User->id){ //apakah user yang sedang login tidak bisa di hapus
        return redirect()->action('UserController@index')->with('status','Data Tidak Bisa dihapus karna sedang Login');
    }
    elseif($User->Aduan->count()){
        $request->session()->flash('status','Data didak bisa dihapus karena memiliki Aduan');
        return redirect()->action('UserController@index');
    }
    else{

        $User->delete();
        $request->session()->flash('status','Data_telah terhapus');
        return redirect()->action('UserController@index');
    }

    }
}
