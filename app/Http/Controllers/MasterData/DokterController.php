<?php

    namespace App\Http\Controllers\MasterData;
    use  App\User;
    use App\model\MasterData\Dokter;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\DokterRequest;
    use App\model\MasterData\Spesialis;
    use App\model\MasterData\SubSpesialis;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;


    class DokterController extends Controller
    {

        private $dokter;

        public function __construct(Dokter $dokter)
        {
            $this->dokter = $dokter;
        }

        // list index dokter
        public function index(Request $request)
        {
            $row              = $this->dokter->orderBy('id', 'desc')->paginate(200);
            $dataspesialis    = Spesialis::get()->toArray();
            $datasubspesialis = SubSpesialis::get()->toArray();

            return view('dokter.index')->with([
                'data'             => $row,
                'dataSpesialis'    => $dataspesialis,
                'dataSubSpesialis' => $datasubspesialis,
                'title'            => 'Data Dokter',
                'subtitle'         => 'List Dokter',
                'no'               => '0',
            ]);
        }

        // get data dokter where id to json
        public function show($id)
        {
            return $this->dokter->find($id);
        }

        // Create Data Dokter
        public function store(Request $request)
        {
            try {
                $validator      = Validator::make(request()->all(), [
                    'nik'             => 'required|numeric',
                    'nama_dokter'     => 'required',
                    'email'           => 'required|email',
                    'no_telp'         => 'required|numeric',
                    'alamat'          => 'required',
                    'tgl_lahir'       => 'required',
                    'tempat_lahir'    => 'required',
                    'spesialis_id'    => 'required|numeric',
                    'subspesialis_id' => 'required|numeric',

                ]);
                $attributeNames = array(
                    'nik'             => 'NIK',
                    'nama_dokter'     => 'Nama',
                    'email'           => 'Email',
                    'no_telp'         => 'Nomer Telepon',
                    'alamat'          => 'Alamat',
                    'tgl_lahir'       => 'Tanggal Lahir',
                    'tempat_lahir'    => 'Tempat Lahir',
                    'spesialis_id'    => 'Spesialis',
                    'subspesialis_id' => 'Sub Spesialis',
                );
                $validator->setAttributeNames($attributeNames);
                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/dokter')->with('gagal',
                        '<p>' . $message->first('nik') . '</p>
                        <p>' . $message->first('nama_dokter') . '</p>
                        <p>' . $message->first('email') . '</p>
                        <p>' . $message->first('no_telp') . '</p>
                        <p>' . $message->first('alamat') . '</p>
                        <p>' . $message->first('tgl_lahir') . '</p>
                        <p>' . $message->first('tempat_lahir') . '</p>
                        <p>' . $message->first('spesialis_id') . '</p>
                        <p>' . $message->first('subspesialis_id') . '</p>'
                    );
                }
                $user = new User;
                $user->role = 'dokter';
                $user->name = $request->nama_dokter;
                $user->email = $request->email;
                $user->password = bcrypt('12345678');
                $user->remember_token = str_random(60);
                $user->save();

                $request->request->add(['users_id' => $user->id]);
                Dokter::create($request->all());

                return redirect('/dokter')->with('sukses', 'Data Berhasil di input');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . DokterController::class . ' method : create | ' . $e);

                return redirect('/dokter')->with('gagal', 'Data Gagal di input');
            }
        }

        // List edit Data
        public function edit(Request $request, $id)
        {
            $find             = $this->dokter->find($id);
            $dataspesialis    = Spesialis::get()->toArray();
            $datasubspesialis = SubSpesialis::get()->toArray();
            return view('dokter.edit')->with([
                'data'             => $find,
                'dataSpesialis'    => $dataspesialis,
                'dataSubSpesialis' => $datasubspesialis,
                'title'            => 'Edit Dokter',
                'subtitle'         => 'Form Dokter',

            ]);
        }

        // update Data Dokter
        public function update(Request $request, $id)
        {
            try {
                $validator      = Validator::make(request()->all(), [
                    'nik'             => 'required|numeric',
                    'nama_dokter'     => 'required',
                    'email'           => 'required|email',
                    'no_telp'         => 'required|numeric',
                    'alamat'          => 'required',
                    'tgl_lahir'       => 'required',
                    'tempat_lahir'    => 'required',
                    'spesialis_id'    => 'required|numeric',
                    'subspesialis_id' => 'required|numeric',

                ]);
                $attributeNames = array(
                    'nik'             => 'NIK',
                    'nama_dokter'     => 'Nama',
                    'email'           => 'Email',
                    'no_telp'         => 'Nomer Telepon',
                    'alamat'          => 'Alamat',
                    'tgl_lahir'       => 'Tanggal Lahir',
                    'tempat_lahir'    => 'Tempat Lahir',
                    'spesialis_id'    => 'Spesialis',
                    'subspesialis_id' => 'Sub Spesialis',
                );
                $validator->setAttributeNames($attributeNames);
                if ($validator->fails()) {
                    $message = $validator->errors();

                    return redirect('/dokter')->with('gagal',
                        '<p>' . $message->first('nik') . '</p>
                        <p>' . $message->first('nama_dokter') . '</p>
                        <p>' . $message->first('email') . '</p>
                        <p>' . $message->first('no_telp') . '</p>
                        <p>' . $message->first('alamat') . '</p>
                        <p>' . $message->first('tgl_lahir') . '</p>
                        <p>' . $message->first('tempat_lahir') . '</p>
                        <p>' . $message->first('spesialis_id') . '</p>
                        <p>' . $message->first('subspesialis_id') . '</p>'
                    );
                }
                \Log::info($request->nik);
                $data = Dokter::find($id);
                $data->update($request->all());
                return redirect('/dokter')->with('sukses', 'Data Berhasil di Edit');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . DokterController::class . ' method : edit | ' . $e);

                return redirect('/dokter')->with('gagal', 'Data gagal di Edit');
            }
        }

        // delete Data dokter
        public function destroy($id)
        {
            try {
                $this->dokter->where('id', $id)->delete($id);
                return redirect('/dokter')->with('sukses', 'Data gagal di Delete');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . DokterController::class . ' method : delete | ' . $e);

                return redirect('/dokter')->with('gagal', 'Data gagal di Delete');
            }
        }

    }