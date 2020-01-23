<?php

namespace App\Http\Controllers\Pembayaran;


    use  App\User;
    use App\model\Pembayaran\Kas;
    use App\model\Pembayaran\Pembayaran;
    use App\model\Pembayaran\PembayaranDetil;
    use \App\model\Registrasi1;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Pembayaran\KasRequest;
    use App\model\MasterData\Spesialis;
    use App\model\MasterData\SubSpesialis;
    use App\model\MasterData\Dokter;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class PembayaranController extends Controller
{
    //
    public function index()
    {
        //
        $data = Registrasi1::where([['aktif','=','Y'],['iscencel','=','N'],])->get();
        //dd($data);
       
        return view('pembayaran.pembayaran.index',['data' => $data,'no' => 0,
            'subtitle'=>'Data Registrasi',
            'title'=>'List Registrasi Pasien']);
       
    }

    public function lanjut(Request $request, $id){

        $data = Registrasi1::find($id);
        dd($data);
       //  $user = auth()->user()->id;
       //  $cek = Kas::where([
       //      ['users_id','=',$user],
       //      ['tgl_open','=',date("Y-m-d")],
       //  ])->get();
       // //cek apakah sudah melakukan open kas di hari tersebut
       // if($cek->first()){
       //    try{
       //      $pembayaran = new Pembayaran;
       //      $pembayaran->tgl_pembayaran = date("Y-m-d");
       //      $pembayaran->kas_id = $cek->first()->id;
       //      $pembayaran->registrasi1_id = $request->id;
       //      $pembayaran->total_transaksi = 0;
       //      $pembayaran->total_diskon = 0;
       //      $pembayaran->total_kembali = 0;
       //      $pembayaran->total_pembayaran = 0;
       //      $pembayaran->kurang_bayar = 0;
       //      $pembayaran->invoice = 0;
       //      $pembayaran->posting = 'N';
       //      $pembayaran->aktif = 'Y';
       //      $pembayaran->cencel = 'N';
       //      $pembayaran->closing = 'N';
       //      $pembayaran->users_id = $user;
       //      $pembayaran->save();

       //      $data = Registrasi1::find($request->id);
       //      $request->request->add(['aktif'=>'N']);
       //      $data->update($request->all());
       //      //$id = Crypt::encrypt($pembayaran->id);
            
       //      return redirect('/pembayaran_detil')->with('sukses', 'Data berhasil di input');
       //      //dd($pembayaran);
       //      } catch (\Exception $e) {
       //      // store errors to log
       //       \Log::error('class : '. PembayaranController::class . ' method : create | '. $e);
       //      return redirect('/pembayaran')->with('gagal', 'Data Gagal di input');
       //     }       
       // }
       // else{
       //  return redirect('/pembayaran')->with('gagal', 'Silahkan melakukan open kas terlebih dahulu..!');
       // }    
    }

     public function lanjut_ajax($id){

      //  $data = Registrasi1::find($id);
       // dd($data);

         // return response()->json([
         //        'success' => true,
         //        'data' => $data,
         //        'message' => "Data Berhasil di input"
         //    ], 200);
        $user = auth()->user()->id;
        $cek = Kas::where([
            ['users_id','=',$user],
            ['tgl_open','=',date("Y-m-d")],
        ])->get();
       //cek apakah sudah melakukan open kas di hari tersebut
       if($cek->first()){
          try{
            $pembayaran = new Pembayaran;
            $pembayaran->tgl_pembayaran = date("Y-m-d");
            $pembayaran->kas_id = $cek->first()->id;
            $pembayaran->registrasi1_id = $id;
            $pembayaran->total_transaksi = 0;
            $pembayaran->total_diskon = 0;
            $pembayaran->total_kembali = 0;
            $pembayaran->total_pembayaran = 0;
            $pembayaran->kurang_bayar = 0;
            $pembayaran->invoice = 0;
            $pembayaran->posting = 'N';
            $pembayaran->aktif = 'Y';
            $pembayaran->cencel = 'N';
            $pembayaran->closing = 'N';
            $pembayaran->users_id = $user;
            $pembayaran->save();

            $data = Registrasi1::find($id);
           // $request->request->add(['aktif'=>'N']);
            $data->update(['aktif'=>'N']);
            //$id = Crypt::encrypt($pembayaran->id);
            
          //  return redirect('/pembayaran_detil')->with('sukses', 'Data berhasil di input');
            //dd($pembayaran);

            return response()->json([
                'success' => true,
                'data' => $data,
                'message' => "Data Berhasil di input"
            ], 200);
            } catch (\Exception $e) {
            // store errors to log
             \Log::error('class : '. PembayaranController::class . ' method : create | '. $e);
            //return redirect('/pembayaran')->with('gagal', 'Data Gagal di input');
              return response()->json([
                'success' => false,

                'message' => "Data Gagal di Input"
            ], 500);
           }       
       }
       else{
        // return redirect('/pembayaran')->with('gagal', 'Silahkan melakukan open kas terlebih dahulu..!');
         return response()->json([
                'success' => false,

                'message' => "Silahkan melakukan open kas...!!"
            ], 500);
       }    
    }

    public function prosesdetil($id){
        $idx = Crypt::decrypt($id);
        $data = Pembayaran::find($idx);
        dd($data);

    }

    public function proses(){
        echo "berhasil";
    } 

    public function show(){
         $data = Pembayaran::where('posting', 'Y')->where('aktif','Y')->orderby('id','desc')->get();
        // dd($data);

        return view('pembayaran.pembayaran.show', ['data' => $data, 'no' => 0,
            'subtitle' => 'Data Pembayaran',
            'title' => 'List Pembayaran Pasien']);
    }


    public function showmodalAddpembayaran($id){

        $data = Pembayaran::where('id', '=', $id)->get()->first();
        $total = PembayaranDetil::where('pembayaran_id',$data->id)->sum("subtotal");

        //dd($data->registrasi1->no_registrasi);
        return  response()->json([
                     'data' => $data,
                     'no_registrasi'=>$data->registrasi1->no_registrasi,
                     'pasien'=> $data->registrasi1->pasien->nama,
                     'dokter'=> $data->registrasi1->dokter->nama_dokter,
                     'poli'=> $data->registrasi1->poli->nama_poli,
                     'total'=> $total,
                     'terbilang' => terbilang($total),
                     'id'=> $id
                 ]);
        // return view('pembayaran.pembayaran.modal_add_pembayaran')->with([
        //    'data' => $data,
        //     'no' => 0
        // ]);
    }

    public function SimpanInvoice(Request $request){

        
         try {
        $kode = Pembayaran::max('no_invoice');
        $no_invoice = nomor_invoice($kode);

        $id = $request->id;
        $data = Pembayaran::where('id',$id)->update([
            'no_invoice'=>$no_invoice,
            'total_transaksi'=> $request->total,
            'total_pembayaran'=> $request->pembayaran,
            'aktif'=> 'N',
            'invoice'=> '1',
            'total_kembali'=> $request->kembali]);

        //

        return response()->json([
            'data' => $data,
            'no_invoice'=> $no_invoice
        ]);

        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . PembayaranController::class . ' method : create | ' . $e);

            return response()->json([
                'success' => false,

                'message' => "Data Gagal di Input"
            ], 500);
        }


    }
}
