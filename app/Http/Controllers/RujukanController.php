<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Rujukan;

class RujukanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Rujukan::orderby('id', 'DESC')->paginate(10);;
        //dd($data);
        return view('rujukan.index',['data'=> $data ,'no' => '0', 'title' => 'Data Rujukan', 'subtitle' => 'List Rujukan']);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = Rujukan::create($request->all());
        //  return $request->all();
        return redirect('/rujukan')->with('sukses', 'Data Berhasil di input');
   
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
        $data = Rujukan::find($id);
       // dd($data);

        return view('rujukan.edit',['data'=> $data, 'title' => 'Edit Rujukan', 'subtitle' => 'Form Rujukan']);
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
        $data = Rujukan::find($id);
        $data->update($request->all());

        return redirect('/rujukan')->with('sukses', 'Data Berhasil di update');
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
