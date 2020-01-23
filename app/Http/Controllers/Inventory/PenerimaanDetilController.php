<?php

namespace App\Http\Controllers\Inventory;

    use  App\User;
    use App\model\MasterData\ProdukItem;
    use App\model\MasterData\SatuanKecil;
    use App\model\MasterData\SatuanBesar;
    use App\model\Inventory\Penerimaan;
    use App\model\Inventory\Kartustok;
    use App\model\Inventory\Penerimaan_detil;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Pembayaran\KasRequest;
    use App\model\MasterData\Suplier;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;
    use PDF;

class PenerimaanDetilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    public function showmodalAddTransaksi($id)
    {
        //
        $idx = Crypt::decrypt($id);
        $satuankecil = SatuanKecil::where('aktif','=','Y')->get();
        $satuanbesar = SatuanBesar::where('aktif','=','Y')->get();

        return view('inventory.penerimaan_detil.add_transaksi')->with(['idx'=> $idx,
            'satuankecil'=>$satuankecil,
            'satuanbesar'=>$satuanbesar]);
    }

     public function ShowModalItemByAddTransaksi()
    {
        $produk = ProdukItem::where('aktif', '=', 'Y')->get();
       
        return view('inventory.penerimaan_detil.moda_pilih_item')->with([
            'data' => $produk,
            'no' => 0
        ]);
    }

    public function AddPenerimaanDetail(Request $request)
    {
        // $total = ($request->qty * $request->isi_satuan) * $request->harga_beli;
        // $data = [
        //         'penerimaan_id'=> $request->penerimaan_id,
        //         'nama_item'=> $request->nama_item,
        //         'produk_item_id'=> $request->kode,
        //         'satuan_kecil_id'=> $request->satuan_kecil_id,
        //         'satuan_besar_id'=> $request->satuan_besar_id,
        //         'isi_satuan'=> $request->isi_satuan,
        //         'qty'=> $request->qty,
        //         'harga_beli'=> $request->harga_beli,
        //         'subtotal'=> $total,
        //         'users_id'=> auth()->user()->id,
        //     ];

        //  //$data = $request->all();
        //  return response()->json(['data' => $data,
        //     ]);
        try {
            $validator = Validator::make(request()->all(), [
                'kode' => 'required',
                'penerimaan_id' => 'required',
                'satuan_besar_id' => 'required',
                'satuan_kecil_id' => 'required',
                'isi_satuan' => 'required|numeric',
                'qty' => 'required|numeric',
            ]);
            $attributeNames = array(
                'kode' => 'Produk Item',
                'penerimaan_id' => 'required',
                'satuan_kecil_id' => 'Satuan Kecil',
                'satuan_besar_id' => 'Satuan Besar',
                'isi_satuan' => 'Isi Per Satuan',
                'qty' => 'QTY',

            );
            $validator->setAttributeNames($attributeNames);

            if ($validator->fails()) {
                $message = $validator->errors();
                return   response()->json([
                    'success' => false,
                    'message' => '<p>' . $message->first('kode') . '</p>
                                    <p>' . $message->first('penerimaan_id') . '</p>
                                    <p>' . $message->first('satuan_besar_id') . '</p>
                                    <p>' . $message->first('satuan_kecil_id') . '</p>
                                    <p>' . $message->first('isi_satuan') . '</p>
                                    <p>' . $message->first('qty') . '</p>',
                ], 433);
            }
           
           //hitung sub total berdasarkan isi satuan di kali dengan qty
            $total = ($request->qty * $request->isi_satuan) * $request->harga_beli;
            $qty = $request->qty * $request->isi_satuan;
            Penerimaan_detil::create([
                'penerimaan_id'=> $request->penerimaan_id,
                'nama_item'=> $request->nama_item,
                'produk_item_id'=> $request->kode,
                'satuan_kecil_id'=> $request->satuan_kecil_id,
                'satuan_besar_id'=> $request->satuan_besar_id,
                'isi_satuan'=> $request->isi_satuan,
                'qty'=> $qty,
                'harga_beli'=> $request->harga_beli,
                'subtotal'=> $total,
                'users_id'=> auth()->user()->id,
            ]);

            return response()->json([
                'success' => true,

                'message' => "Data  Item Berhasil di input"
            ], 200);
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . PenerimaanDetilController::class . ' method : create | ' . $e);

            return response()->json([
                'success' => false,

                'message' => "Data Item Gagal di Input"
            ], 500);
        }

    }

    public function DeletePenerimaanDetail($id)
    {
        try {
           // $findPembayaranDetail = Penerimaan_detil::find($id);
           
            Penerimaan_detil::where('id',$id)->delete();

            return response()->json([
                'success' => true,

                'message' => "Data Berhasil di Hapus"
            ], 200);
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . PenerimaanDetilController::class . ' method : edit | ' . $e);

            return response()->json([
                'success' => false,

                'message' => "Data Gagal di Hapus"
            ], 500);
        }

    }

     public function Posting($id,Request $request)
    {
    
        try {
        
        //    
        $idx = Crypt::decrypt($id);
        $data = Penerimaan::find($idx);
        $detil = Penerimaan_detil::where('penerimaan_id','=',$idx)->get();

        //     $proses =  Penerimaan_detil::where('penerimaan_id',$data->id)->get();
        foreach ($detil as $k) {
                $findproduk = ProdukItem::where('id','=',$k->produk_item_id)->first();
                $stok_awal = $findproduk->stok;

                if($request->value=='Y'){
                $stok_akhir = $stok_awal + $k->qty; 
                $stok_keluar = 0;
                 $stok_masuk = $k->qty;
                }else{
                 $stok_akhir = $stok_awal - $k->qty; 
                 $stok_keluar = $k->qty;
                 $stok_masuk = 0;
                }
               
                //update data produk
                ProdukItem::where('id',$findproduk->id)
                ->update(['satuan_besar_id' => $k->satuan_besar_id,
                      'satuan_kecil_id' => $k->satuan_kecil_id,
                      'isi_satuan'=> $k->isi_satuan,
                      'stok'=>$stok_akhir]);
              //  ProdukItem::where('id',$k->produk_item_id)->update($produk);

         //        //input kartu stok
                $kartustok = new KartuStok;
                $kartustok->periode = GetPeriode();
                $kartustok->produk_item_id = $findproduk->id;
                $kartustok->stok_awal = $stok_awal;
                $kartustok->stok_masuk = $stok_masuk;
                $kartustok->stok_keluar = $stok_keluar;
                $kartustok->stok_akhir = $stok_akhir;
                 if($request->value=='Y'){
                     $kartustok->transaksi = "PENERIMAAN";
                     $kartustok->keterangan = "penerimaan barang dengan nomor ".$data->nomor_penerimaan;
                 }else{
                     $kartustok->transaksi = "CENCEL";
                     $kartustok->keterangan = "Cencel Posting penerimaan barang dengan nomor ".$data->nomor_penerimaan;
                 }
                
                 $kartustok->users_id = auth()->user()->id;
                $kartustok->save();
         //        # code...
          //  $produk[]= $k->produk_item_id;
          //  $no++;
          }

            Penerimaan_detil::where('penerimaan_id',$idx)->update([
                'aktif' =>$request->value
            ]);
            Penerimaan::where('id',$idx)->update([
                'aktif'=>'N']);
        

            return response()->json([
                'success' => true,

                'message' => "Data Berhasil di Posting"
            ], 200);
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . Penerimaan::class . ' method : posting | ' . $e);

            return response()->json([
                'success' => false,

                'message' => "Data Gagal di Posting"
            ], 500);
        }

    }

     public function printprev($id){
         $idx = Crypt::decrypt($id);

         $data = Penerimaan::find($idx);
        // dd($data);
         $detil = Penerimaan_detil::where('penerimaan_id',$idx)->orderby('id','ASC')->get();

         //dd($detil);
         $pdf = PDF::loadview('inventory.penerimaan_detil.printprev',
            ['data'=>$data,
             'detil'=>$detil,
             'title' => 'Penerimaan Sementara',
             'no'=> '0',
             'total' => '0'
           ]);
         return $pdf->stream();
    }
}
