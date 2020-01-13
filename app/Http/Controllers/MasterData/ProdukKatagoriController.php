<?php

namespace App\Http\Controllers\MasterData;

    use App\User;
    use App\model\MasterData\ProdukItem;
    use App\model\MasterData\ProdukKatagori;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\ProdukItemRequest;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class ProdukKatagoriController extends Controller
{
    
    private $produkkatagori;

        public function __construct(ProdukKatagori $produkkatagori)
        {
            $this->produkkatagori = $produkkatagori;
        }

    public function index()
    {
        //
        $row  = $this->produkkatagori->orderBy('id', 'desc')->paginate(200);
       // dd($row);

          return view('masterData.produkitem_katagori.index')->with([
                'data'             => $row,
                'title'            => 'Data Produk Item Katagori',
                'subtitle'         => 'List Produk Item Katagori',
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
                $validator = Validator::make(request()->all(), [
                    'nama_produk_katagori' => 'required',
                ]);

                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/produk_katagori')->with('gagal', '<p>' . $message->first('nama_poli') . '</p>');
                }
                ProdukKatagori::create($request->all());

                return redirect('/produk_katagori')->with('sukses', 'Data Berhasil di input');

            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . ProdukKatagoriController::class . ' method : create | ' . $e);

                return redirect('/produk_katagori')->with('gagal', 'Data Gagal di input');
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
