<?php

    namespace App\Http\Controllers\MasterData;

    use App\model\MasterData\Spesialis;
    use App\model\MasterData\SubSpesialis;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\SubSpesialisRequest;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;
    use Yajra\DataTables\DataTables;


    class SubSpesialisController extends Controller
    {

        private $sub_spesialis;

        public function __construct(SubSpesialis $sub_spesialis)
        {
            $this->sub_spesialis = $sub_spesialis;
        }

        public function index(Request $request)
        {
            $row           = $this->sub_spesialis->orderBy('id', 'desc')->paginate(200);
            $dataspesialis = Spesialis::get()->toArray();

            return view('sub-spesialis.index')->with([
                'data'          => $row,
                'dataSpesialis' => $dataspesialis,
                'title'         => 'Data Sup Spesialis',
                'subtitle'      => 'List Sup Spesialis',
                'no'            => '0',
            ]);
        }

        // get Sub spesialis where id to json
        public function show($id)
        {
            return $this->sub_spesialis->find($id);
        }


        // Create Data Sub Spesialis
        public function store(Request $request)
        {

            try {
                $validator      = Validator::make(request()->all(), [
                    'nama_spesialis' => 'required',
                    'spesialis_id'   => 'required',
                ]);
                $attributeNames = array(
                    'nama_spesialis' => 'Nama Sub Spesialis',
                    'spesialis_id'   => 'Nama Spesialis',
                );
                $validator->setAttributeNames($attributeNames);
                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/subspesialis')->with('gagal',
                        '<p>' . $message->first('nama_spesialis') . '</p>
                        <p>' . $message->first('spesialis_id') . '</p>'
                    );
                }
                SubSpesialis::create($request->all());

                return redirect('/subspesialis')->with('sukses', 'Data Berhasil di input');

            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SubSpesialisController::class . ' method : create | ' . $e);

                return redirect('/subspesialis')->with('gagal', 'Data Gagal di input');
            }

        }

        // List Create data where id
        public function edit(Request $request, $id)
        {
            $find          = $this->sub_spesialis->find($id);
            $dataspesialis = Spesialis::get()->toArray();
            return view('sub-spesialis.edit')->with([
                'data'          => $find,
                'dataSpesialis' => $dataspesialis,
                'title'         => 'Edit Sub Spesialis',
                'subtitle'      => 'Form Sub Spesialis',

            ]);
        }

        // update Data SubSpesialis
        public function update(Request $request, $id)
        {
            try {
                $validator = Validator::make(request()->all(), [
                    'nama_spesialis' => 'required',
                    'spesialis_id'   => 'required',
                ]);

                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/subspesialis')->with('gagal',
                        '<p>' . $message->first('nama_spesialis') . '</p>
                        <p>' . $message->first('spesialis_id') . '</p>'
                    );
                }
                $data = SubSpesialis::find($id);
                $data->update($request->all());
                return redirect('/subspesialis')->with('sukses', 'Data Berhasil di Edit');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SpesialisController::class . ' method : edit | ' . $e);

                return redirect('/subspesialis')->with('gagal', 'Data Gagal di Edit');
            }
        }

        // delete Data sub_spesialis
        public function destroy($id)
        {
            try {
                $this->sub_spesialis->where('id', $id)->delete($id);
                return redirect('/subspesialis')->with('sukses', 'Data Berhasil di Delete');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . SubSpesialisController::class . ' method : delete | ' . $e);

                return redirect('/subspesialis')->with('gagal', 'Data Gagal di Delete');
            }
        }

    }