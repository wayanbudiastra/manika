<?php

    namespace App\Http\Controllers\MasterData;

    use App\model\MasterData\Spesialis;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\SpesialisRequest;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;


    class SpesialisController extends Controller
    {

        private $spesialis;

        public function __construct(Spesialis $spesialis)
        {
            $this->spesialis = $spesialis;
        }

        // get data spesialis data to json
        public function index(Request $request)
        {
            $row    = $this->spesialis->orderBy('id', 'desc')->paginate(200);

            return view('spesialis.index')->with([
                'data'     => $row,
                'title'    => 'Data Spesialis',
                'subtitle' => 'List Spesialis',
                'no'       => '0',
            ]);
        }

        // get data spesialis where id
        public function show($id)
        {
            return $this->spesialis->find($id);
        }

        // Create Data Spesialis
        public function store(Request $request)
        {
            try {
                $validator = Validator::make(request()->all(), [
                    'nama_spesialis' => 'required',
                ]);

                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/spesialis')->with('gagal', '<p>' . $message->first('nama_spesialis') . '</p>');
                }
                Spesialis::create($request->all());

                return redirect('/spesialis')->with('sukses', 'Data Berhasil di input');

            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SpesialisController::class . ' method : create | ' . $e);

                return redirect('/spesialis')->with('gagal', 'Data Gagal di input');
            }
        }

        // List Edit spesialis
        public function edit($id)
        {
            $find = $this->spesialis->find($id);
            return view('spesialis.edit')->with([
                'data'     => $find,
                'title'    => 'Edit Spesialis',
                'subtitle' => 'Form Spesialis',

            ]);
        }

        // update Data Spesialis
        public function update(Request $request, $id)
        {
            try {
                $validator = Validator::make(request()->all(), [
                    'nama_spesialis' => 'required',
                ]);

                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/spesialis')->with('gagal', '<p>' . $message->first('nama_spesialis') . '</p>');
                }
                $data = Spesialis::find($id);
                $data->update($request->all());
                return redirect('/spesialis')->with('sukses', 'Data Berhasil di Edit');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SpesialisController::class . ' method : edit | ' . $e);

                return redirect('/spesialis')->with('gagal', 'Data Gagal di Edit');
            }
        }

        // delete Data spesialis
        public function destroy($id)
        {
            try {
                $this->spesialis->where('id', $id)->delete($id);
                return redirect('/spesialis')->with('sukses', 'Data Berhasil di Delete');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SpesialisController::class . ' method : delete | ' . $e);

                return redirect('/spesialis')->with('gagal', 'Data Gagal di Delete');
            }
        }

    }