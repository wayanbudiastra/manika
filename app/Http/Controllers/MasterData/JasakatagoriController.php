<?php

namespace App\Http\Controllers\MasterData;

    use App\model\MasterData\Jasakatagori;
    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class JasakatagoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $jasakatagori;

        public function __construct(Jasakatagori $jasakatagori)
        {
            $this->jasakatagori = $jasakatagori;
        }


    public function index()
    {
        //

        $row  = $this->jasakatagori->orderBy('id', 'desc')->paginate(200);
       // dd($row);

          return view('masterData.jasakatagori.index')->with([
                'data'             => $row,
                'title'            => 'Data Jasa Katagori',
                'subtitle'         => 'List Jasa Katagori',
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
                    'nama_jasakatagori' => 'required',
                ]);

                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/jasakatagori')->with('gagal', '<p>' . $message->first('nama_jasakatagori') . '</p>');
                }
                Jasakatagori::create($request->all());

                return redirect('/jasakatagori')->with('sukses', 'Data Berhasil di input');

            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . JasakatagoriController::class . ' method : create | ' . $e);

                return redirect('/jasakatagori')->with('gagal', 'Data Gagal di input');
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
        $find = $this->jasakatagori->find($id);
            return view('masterdata.jasakatagori.edit')->with([
                'data'      => $find,
                'title'    => 'Edit Jasa Katagori',
                'subtitle' => 'Form Jasa Katagori',

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
                'nama_jasakatagori' => 'required',
            ]);

            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/jasakatagori')->with('gagal', '<p>' . $message->first('nama_jasakatagori') . '</p>');
            }
            $data = Jasakatagori::find($id);
            $data->update($request->all());
            return redirect('/jasakatagori')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . jasakatagoriController::class . ' method : edit | ' . $e);

            return redirect('/jasakatagori')->with('gagal', 'Data Gagal di Edit');
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
