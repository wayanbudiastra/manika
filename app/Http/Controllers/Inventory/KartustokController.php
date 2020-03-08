<?php

namespace App\Http\Controllers\inventory;

    use Illuminate\Http\Request;
    use App\model\MasterData\ProdukKatagori;
    use App\User;
    use App\model\MasterData\ProdukItem;
    use App\model\MasterData\SatuanKecil;
    use App\model\MasterData\SatuanBesar;
    use App\model\Inventory\Kartustok;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Pembayaran\KasRequest;
    use App\model\MasterData\Suplier;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;
    use PDF;

class KartustokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get();
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get();
        $produkkatagori = ProdukKatagori::where('aktif','=','Y')->get();
        $row = ProdukItem::orderBy('id', 'desc')->paginate(100);
        
        return view('inventory.kartustok.index')->with([
            'data'     => $row,
            'satuanbesar' => $satuanbesar,
            'satuankecil' => $satuankecil,
            'produkkatagori' => $produkkatagori,
            'title'    => 'Data Kartustok',
            'subtitle' => 'List Kartustok',
            'no'       => '0',
        ]);
    }

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
        return view('inventory.kartustok.index')->with([
                'data'     => $data,
                'satuanbesar' => $satuanbesar,
                'satuankecil' => $satuankecil,
                'produkkatagori' => $produkkatagori,
                'title'    => 'Data Kartustok',
                'subtitle' => 'List Kartustok',
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
        $idx = Crypt::decrypt($id);
        $data = ProdukItem::findOrFail($idx);
        $kartustok = KartuStok::where('produk_item_id', $data->id)->orderBy('id', 'desc')->paginate(100);
        $maping = $data->getProdukSuplierAttribute();
        // dd($kartustok);

        // dd($maping); exit;
        return view('inventory.kartustok.edit')->with([
             'data' => $data,
             'kartustok' => $kartustok,
             'maping' => $maping,
             'title'    => 'Data Kartustok',
             'subtitle' => 'List Kartustok',
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
        //
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

    public function printview($id, Request $request)
    {
        $idx = Crypt::decrypt($id);
        $dari_tgl = \Carbon\Carbon::parse($request->dari_tgl)->format('Y-m-d');
        $sampai_tgl = \Carbon\Carbon::parse($request->sampai_tgl)->format('Y-m-d');

        $data = ProdukItem::findOrFail($idx);
        // dd($data);
        $kartustok = KartuStok::where('produk_item_id', $data->id)
                ->whereBetween('created_at', [$dari_tgl, $sampai_tgl])
                ->orderby('created_at','ASC')
                ->get();

        // dd($kartustok);

        if ($kartustok->isEmpty()) {
            return back()->with('error','Data Tidak Ditemukan!');
        }

        $pdf = PDF::loadview('inventory.kartustok.printprev',[
            'data'=>$data,
            'kartustok'=>$kartustok,
            'dari_tgl' => $dari_tgl, 
            'sampai_tgl' => $sampai_tgl,
            'title' => 'Kartu Stok',
            'no'=> '0',
        ]);
        return $pdf->setPaper('A4', 'potrait')->stream();
    }

}
