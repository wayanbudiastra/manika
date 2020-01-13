<?php

namespace App\Http\Controllers\Pembayaran;


    use  App\User;
    use App\model\MasterData\Dokter;
    use App\model\Pembayaran\Kas;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\DokterRequest;
    use App\model\MasterData\Spesialis;
    use App\model\MasterData\SubSpesialis;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;


class KasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $kas;

        public function __construct(Kas $kas)
        {
            $this->kas = $kas;
        }
    public function index(Request $request)
    {
        //
         $row = $this->kas->orderBy('id', 'desc')->paginate(30);
         return view('pembayaran.kas.index')->with([
                'data'             => $row,
                'title'            => 'Data Kas',
                'subtitle'         => 'List Kas',
                'no'               => '0',
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
                $validator      = Validator::make(request()->all(), [
                    'kas_awal'       => 'required|numeric',
                    'keterangan'     => 'required',
                ]);
                $attributeNames = array(
                    'kas_awal'             => 'Saldo Awal',
                    'keterangan'     => 'Keterangan',
                );
                $validator->setAttributeNames($attributeNames);
                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/kas')->with('gagal',
                        '<p>' . $message->first('kas_awal') . '</p>
                        <p>' . $message->first('keterangan') . '</p>'
                    );
                }
                $request->request->add(['users_id' => auth()->user()->id,
                'total_tunai' => 0,
                'total_debit' => 0,
                'total_kredit' => 0,
                'total_lain' => 0,
                'total_transaksi' => 0,
                'total_kembali' => 0,
                'kas_akhir' => 0,
                'tgl_open'=>date('Y-m-d')]);
                Kas::create($request->all());
                //dd($request->all());
               return redirect('/kas')->with('sukses', 'Data Berhasil di input');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . KasController::class . ' method : create | ' . $e);

                return redirect('/kas')->with('gagal', 'Data Gagal di input');
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
}
