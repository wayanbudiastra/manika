<?php

namespace App\Http\Controllers\MasterData;

    use  App\User;
    use App\model\MasterData\ProdukItem;
    use App\model\MasterData\Suplier;
    use App\model\MasterData\SatuanBesar;
    use App\model\MasterData\SatuanKecil;
    use App\model\MasterData\ProdukKatagori;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\ProdukItemRequest;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class ProdukItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    private $produkitem;

    public function __construct(ProdukItem $produkitem)
    {
        $this->produkitem = $produkitem;
    }


    public function index()
    {

        // $data = ProdukItem::max('kode');
        // //dd($data);

        // $kode = kode_item($data);
        // return $kode;
        //return $data->kode;
        //
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get();
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get();
        $produkkatagori = ProdukKatagori::where('aktif','=','Y')->get();
        $row    = $this->produkitem->orderBy('id', 'desc')->paginate(200);
        
            return view('masterData.produkitem.index')->with([
                'data'     => $row,
                'satuanbesar' => $satuanbesar,
                'satuankecil' => $satuankecil,
                'produkkatagori' => $produkkatagori,
                'title'    => 'Data Produk Item',
                'subtitle' => 'List Produk Item',
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
        try {
            $validator = Validator::make(request()->all(), [
                'nama_item' => 'required',
                'katagori_item_id'    => 'required|numeric',
                'satuan_besar_id' => 'required|numeric',
                'satuan_kecil_id' => 'required|numeric',
                'isi_satuan' => 'required|numeric',
                'harga_beli' => 'required|numeric',
                'harga_jual' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/produkitem')->with('gagal', '<p>' . $message->first('nama_item') . '</p>
                <p>' . $message->first('katagori_item_id') . '</p>
                <p>' . $message->first('satuan_besar_id') . '</p>
                <p>' . $message->first('satuan_kecil_id') . '</p>
                <p>' . $message->first('isi_satuan') . '</p>
                <p>' . $message->first('harga_beli') . '</p>
                <p>' . $message->first('harga_jual') . '</p>');
            }
            ProdukItem::create($request->all());

            return redirect('/produkitem')->with('sukses', 'Data Berhasil di input');

        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . ProdukItemController::class . ' method : create | ' . $e);

            return redirect('/produkitem')->with('gagal', 'Data Gagal di input');
        }        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table produk sesuai pencarian data
        $data = ProdukItem::where('kode', 'like', "%" . $cari . "%")->
        orWhere('nama_item', 'like', "%" . $cari . "%")->get();
        
        // mengirim data data ke view index
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get();
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get();
        $produkkatagori = ProdukKatagori::where('aktif','=','Y')->get();
        // $row    = $this->produkitem->where('kode', 'like', "%" . $cari . "%")->
        // orWhere('nama_item', 'like', "%" . $cari . "%")->get();

        //dd($produkkatagori);
        return view('masterData.produkitem.index')->with([
                'data'     => $data,
                'satuanbesar' => $satuanbesar,
                'satuankecil' => $satuankecil,
                'produkkatagori' => $produkkatagori,
                'title'    => 'Data Produk Item',
                'subtitle' => 'List Produk Item',
                'no'       => '0',
        ]);
    }

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
        $data = ProdukItem::find($id);
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get()->toArray();
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get()->toArray();
        $produkkatagori = ProdukKatagori::where('aktif','=','Y')->get()->toArray();
        $maping = $data->getProdukSuplierAttribute();
        $list_suplier = Suplier::pluck('nama_suplier','id'); 

        //dd($maping); exit;
        return view('masterData.produkitem.edit')->with([
             'data'     => $data,
             'maping' => $maping,
             'list_suplier' => $list_suplier,
             'satuanbesar' => $satuanbesar,
             'satuankecil' => $satuankecil,
             'produkkatagori' => $produkkatagori,
             'title'    => 'Data Produk Item',
             'subtitle' => 'List Produk Item',
             'no'       => '0',
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
    
        //$data = $request->input('produk_suplier');
       
        try {
            $validator = Validator::make(request()->all(), [
                'nama_item' => 'required',
                'katagori_item_id'    => 'required|numeric',
                'satuan_besar_id' => 'required|numeric',
                'satuan_kecil_id' => 'required|numeric',
                'isi_satuan' => 'required|numeric',
                'harga_beli' => 'required|numeric',
                'harga_jual' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/produkitem')->with('gagal', '<p>' . $message->first('nama_item') . '</p>
                <p>' . $message->first('katagori_item_id') . '</p>
                <p>' . $message->first('satuan_besar_id') . '</p>
                <p>' . $message->first('satuan_kecil_id') . '</p>
                <p>' . $message->first('isi_satuan') . '</p>
                <p>' . $message->first('harga_beli') . '</p>
                <p>' . $message->first('harga_jual') . '</p>');
            }
            $data = ProdukItem::find($id);
            $data->update($request->all());
            $data->suplier()->sync($request->input('produk_suplier'));

            return redirect('/produkitem')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . ProdukItemController::class . ' method : edit | ' . $e);

            return redirect('/produkitem')->with('gagal', 'Data Gagal di Edit');
        }        
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
