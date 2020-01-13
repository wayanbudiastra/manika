<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Lokasi;
use App\User;

class LokasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Lokasi::orderby('id', 'DESC')->paginate(10);;
        //dd($data);
        return view('lokasi.index', ['data' => $data, 'no' => '0', 'title' => 'Data lokasi', 'subtitle' => 'List lokasi']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = Lokasi::create($request->all());
        //  return $request->all();
        return redirect('/lokasi')->with('sukses', 'Data Berhasil di input');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        $data = lokasi::find($id);
        //dd($data);
        return view('lokasi.edit', ['data' => $data, 'title' => 'Edit Lokasi', 'subtitle' => 'Form Lokasi']);
    
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
        $data = Lokasi::find($id);
        $data->update($request->all());

        return redirect('/lokasi')->with('sukses', 'Data Berhasil di update');
    }

    public function pilih(){
        $user_id = auth()->user()->id;
        $user_nama = auth()->user()->name;

        $data = User::find($user_id);
       // dd($data);
       //echo $user_nama;

        return view('pilihlokasi',['data'=>$data,'nama'=>$user_nama]);
       
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
