<?php

    namespace App\Http\Controllers\MasterData;

    use App\model\MasterData\Poli;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\PoliRequest;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;



    class PoliController extends Controller
    {

        private $poli;

        public function __construct(Poli $poli)
        {
            $this->poli = $poli;
        }


        // get data poli
        public function index()
        {
            $row    = $this->poli->orderBy('id', 'desc')->paginate(200);
            return view('poli.index')->with([
                'data'     => $row,
                'title'    => 'Data Poli',
                'subtitle' => 'List Poli',
                'no'       => '0',

            ]);
        }

        // get data poli where id
        public function show($id)
        {
            return $this->poli->find($id);
        }

        // List Create Data
        public function ListCreate(Request $request)
        {
            return view('poli.create')->with([
                'title'     => 'Data Poli',
                'sub_title' => 'List Poli',

            ]);
        }

        // Create Data Poli
        public function store(Request $request)
        {
            try {
                $validator = Validator::make(request()->all(), [
                    'nama_poli' => 'required',
                ]);

                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/poli')->with('gagal', '<p>' . $message->first('nama_poli') . '</p>');
                }
                Poli::create($request->all());

                return redirect('/poli')->with('sukses', 'Data Berhasil di input');

            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SpesialisController::class . ' method : create | ' . $e);

                return redirect('/poli')->with('gagal', 'Data Gagal di input');
            }        }

        // List edit Data
        public function edit($id)
        {
            $find = $this->poli->find($id);
            return view('poli.edit')->with([
                'data'      => $find,
                'title'    => 'Edit Poli',
                'subtitle' => 'Form Poli',

            ]);
        }

        // update Data Poli
        public function update(Request $request, $id)
        {
            try {
                $validator = Validator::make(request()->all(), [
                    'nama_poli' => 'required',
                ]);

                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/poli')->with('gagal', '<p>' . $message->first('nama_poli') . '</p>');
                }
                $data = Poli::find($id);
                $data->update($request->all());
                return redirect('/poli')->with('sukses', 'Data Berhasil di Edit');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SpesialisController::class . ' method : edit | ' . $e);

                return redirect('/poli')->with('gagal', 'Data Gagal di Edit');
            }        }

        // delete Data poli
        public function destroy($id)
        {
            try {
                $this->poli->where('id', $id)->delete($id);
                return redirect('/poli')->with('sukses', 'Data Berhasil di Delete');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . PoliController::class . ' method : delete | ' . $e);

                return redirect('/poli')->with('gagal', 'Data Gagal di Delete');
            }
        }
    }