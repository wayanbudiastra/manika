<?php

namespace App\Http\Controllers\MasterData;

    use App\model\MasterData\ProdukItem;
     use App\model\MasterData\Produk_item_Suplier;
    use App\model\MasterData\Suplier;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\ProdukItemRequest;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class ProdukSuplierMappingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(Suplier $suplier)
    {
        $this->suplier = $suplier;
    }

    public function index()
    {
        //
         //
        $row    = $this->suplier->orderBy('id', 'desc')->paginate(100);

        //dd($row);
            return view('masterData.produkitem_suplier_maping.index')->with([
                'data'     => $row,
                'title'    => 'Data Suplier',
                'subtitle' => 'List Suplier',
                'no'       => '0',
            ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $id = $request->all();
        Produk_item_Suplier::create($request->all());
        //$data = ['status'=> true];
        return redirect('/suplier_maping');
       
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
        //ambil id produk yang sudah di maping
        $produk = Produk_item_Suplier::select('produk_item_id')->where('suplier_id',$id)->get()->toArray();
        //data yang tambil adalah produk yang belum di maaping
        $data = ProdukItem::select('id','nama_item')->whereNotIn('id',$produk)->get()->toArray();

        //dd($data);
        $find = $this->suplier->find($id);
        return view('masterData.produkitem_suplier_maping.edit')->with([
            'data'     => $find,
            'produk'=> $data,
            'title'    => 'Maping Suplier',
            'subtitle' => 'Form Suplier',

        ]);
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
         //$id = ;
        $data = Produk_item_Suplier::create($request->all());
        //$data = ['status'=> true];
        dd($data);
        //return $id;
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
