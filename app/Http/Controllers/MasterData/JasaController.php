<?php

namespace App\Http\Controllers\MasterData;

    use  App\User;
    use App\model\MasterData\Jasakatagori;
    use App\model\MasterData\Jasa;
    use App\model\MasterData\ProdukKatagori;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class JasaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    private $jasa;

    public function __construct(Jasa $jasa)
    {
        $this->jasa = $jasa;
    }

    public function index()
    {
        //
         //
         $data = Jasa::max('kode');
        // //dd($data);

        $kode = kode_jasa($data);
        $jasakatagori = Jasakatagori::where('aktif','=','Y')->get();
        $row    = $this->jasa->orderBy('id', 'desc')->paginate(200);
        
            return view('masterData.jasa.index')->with([
                'data'     => $row,
                'kode'      => $kode,
                'jasakatagori' => $jasakatagori,
                'title'    => 'Data Jasa/Tindakan',
                'subtitle' => 'List Jasa/Tindakan',
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
                'nama_jasa' => 'required',
                'jasakatagori_id'    => 'required|numeric',
                'harga_jual' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/produkitem')->with('gagal', '<p>' . $message->first('nama_jasa') . '</p>
                <p>' . $message->first('jasakatagori_id') . '</p>
                <p>' . $message->first('harga_jual') . '</p>');
            }
            Jasa::create($request->all());

            return redirect('/jasa')->with('sukses', 'Data Berhasil di input');

        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . JasaController::class . ' method : create | ' . $e);

            return redirect('/jasa')->with('gagal', 'Data Gagal di input');
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
        $data = Jasa::find($id);
        $jasakatagori = Jasakatagori::where('aktif','=','Y')->get();

         return view('masterData.jasa.edit')->with([
                'data'     => $data,
                'jasakatagori' => $jasakatagori,
                'title'    => 'Data Jasa/Tindakan',
                'subtitle' => 'List Jasa/Tindakan',
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
          try {
            $validator = Validator::make(request()->all(), [
                'nama_jasa' => 'required',
                'jasakatagori_id'    => 'required|numeric',
                'harga_jual' => 'required|numeric',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/produkitem')->with('gagal', '<p>' . $message->first('nama_jasa') . '</p>
                <p>' . $message->first('jasakatagori_id') . '</p>
                <p>' . $message->first('harga_jual') . '</p>');
            }
            $data = Jasa::find($id);
            $data->update($request->all());
        
            return redirect('/jasa')->with('sukses', 'Data Berhasil di input');

        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . JasaController::class . ' method : create | ' . $e);

            return redirect('/jasa')->with('gagal', 'Data Gagal di input');
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

     public function cari(Request $request)
    {
        // menangkap data pencarian
        $cari = $request->cari;

        // mengambil data dari table produk sesuai pencarian data
        $data = jasa::where('kode', 'like', "%" . $cari . "%")->
        orWhere('nama_jasa', 'like', "%" . $cari . "%")->get();
        
     
         $kd = Jasa::max('kode');
        // //dd($kd);
        $kode = kode_jasa($kd);
        $jasakatagori = Jasakatagori::where('aktif','=','Y')->get();
        
            return view('masterData.jasa.index')->with([
                'data'     => $data,
                'kode'      => $kode,
                'jasakatagori' => $jasakatagori,
                'title'    => 'Data Jasa/Tindakan',
                'subtitle' => 'List Jasa/Tindakan',
                'no'       => '0',
            ]);
    }
}
