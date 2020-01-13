<?php

namespace App\Http\Controllers\Pembayaran;


    use  App\User;
    use App\model\Pembayaran\Kas;
    use App\model\Pembayaran\Pembayaran;
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
            $pembayaran->save();

            $data = Registrasi1::find($id);
            $request->request->add(['aktif'=>'N']);
            $data->update($request->all());
            //$id = Crypt::encrypt($pembayaran->id);
            
            return redirect('/pembayaran_detil')->with('sukses', 'Data berhasil di input');
            //dd($pembayaran);
            } catch (\Exception $e) {
            // store errors to log
             \Log::error('class : '. PembayaranController::class . ' method : create | '. $e);
            return redirect('/pembayaran')->with('gagal', 'Data Gagal di input');
           }       
       }
       else{
        return redirect('/pembayaran')->with('gagal', 'Silahkan melakukan open kas terlebih dahulu..!');
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
         $data = Pembayaran::where('posting', 'Y')->orderby('id','desc')->get();
        // dd($data);

        return view('pembayaran.pembayaran.show', ['data' => $data, 'no' => 0,
            'subtitle' => 'Data Pembayaran',
            'title' => 'List Pembayaran Pasien']);
    }


    public function showmodalAddpembayaran($id){

        $data = Pembayaran::where('id', '=', $id)->get();

        //dd($data);
        return view('pembayaran.pembayaran.modal_add_pembayaran')->with([
           'data' => $data,
            'no' => 0
        ]);
    }
}
