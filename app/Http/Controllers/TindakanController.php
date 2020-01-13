<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Tindakan;
use App\model\Katagoritindakan;
use Illuminate\Support\Facades\Crypt;

class TindakanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $katagori = Katagoritindakan::all();
        $data = Tindakan::orderby('id','DESC')->paginate(15);
       // dd($katagori);
       return view('tindakan.index',['data'=>$data,
       'katagori'=> $katagori,
       'no' => '0',
       'title' => 
       'Data Jasa/Tindakan', 
       'subtitle' => 'List Jasa/Tindakan']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        try {
            // try code
            $data =   Tindakan::create($request->all());
            	//return $request->all();
           // dd($request);
            return redirect('/tindakan')->with('sukses', 'Data Berhasil di input');
        } catch (\Exception $e) {
            // catch code
            return redirect('/tindakan')->with('gagal', 'Terjadi kesalahan.. '.$e);
        }
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
        //
        $idx = Crypt::decrypt($id);
        $data = Tindakan::find($idx);
         $katagori = Katagoritindakan::all();
       // dd($data);
        return view('tindakan/edit', ['katagori'=>$katagori, 'data' => $data, 'title' => 'Edit Tindakan/Jasa', 'subtitle' => 'Form Tindakan/Jasa']);//
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
        //
        $data = Tindakan::find($id);
        $data->update($request->all());

        return redirect('/tindakan')->with('sukses', 'Data Berhasil di update');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
