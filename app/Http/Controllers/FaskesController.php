<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\model\Faskes;

class FaskesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       
        //
        $data = Faskes::orderby('id','DESC')->paginate(200);
        //dd($data);
        return view('faskes.index', ['data' => $data, 'no' => '0', 'title' => 'Data Faskes', 'subtitle' => 'List Faskes']);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $data = Faskes::create($request->all());
        //  return $request->all();
        return redirect('/faskes')->with('sukses', 'Data Berhasil di input');
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
        $data = Faskes::find($id);
        dd($data);
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
        $data = Faskes::find($id);
       // dd($data);
        return view('faskes.edit', ['data' => $data, 'title' => 'Edit Faskes', 'subtitle' => 'Form Faskes']);
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
        $data = Faskes::find($id);
        $data->update($request->all());

        return redirect('/faskes')->with('sukses', 'Data Berhasil di update');
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
