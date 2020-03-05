<?php

namespace App\Http\Controllers\MasterData;

    use Illuminate\Http\Request;
    use App\User;
    use App\model\MasterData\Asdok;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\asdokRequest;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class AsdokController extends Controller
{
    private $asdok;

    public function __construct(Asdok $asdok)
    {
        $this->asdok = $asdok;
    }

    // list index asdok
    public function index(Request $request)
    {
        $row              = $this->asdok->orderBy('id', 'desc')->paginate(100);
        // $dataspesialis    = Spesialis::get()->toArray();
        // $datasubspesialis = SubSpesialis::get()->toArray();

        return view('masterData.sdm.asisten-dokter.index')->with([
            'data'             => $row,
            'title'            => 'Data Asisten Dokter',
            'subtitle'         => 'List Asisten Dokter',
            'no'               => '0',
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validator      = Validator::make(request()->all(), [
                'nik'             => 'required|numeric',
                'nama_asdok'      => 'required',
                'email'           => 'required|email',
                'no_telp'         => 'required|numeric',
                'alamat'          => 'required',
                'tgl_lahir'       => 'required',
                'tempat_lahir'    => 'required',
            ]);
            $attributeNames = array(
                'nik'             => 'NIK',
                'nama_asdok'      => 'Nama',
                'email'           => 'Email',
                'no_telp'         => 'Nomer Telepon',
                'alamat'          => 'Alamat',
                'tgl_lahir'       => 'Tanggal Lahir',
                'tempat_lahir'    => 'Tempat Lahir',
                
            );
            $validator->setAttributeNames($attributeNames);
            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/asdok')->with('gagal','
                    <p>' . $message->first('nik') . '</p>
                    <p>' . $message->first('nama_asdok') . '</p>
                    <p>' . $message->first('email') . '</p>
                    <p>' . $message->first('no_telp') . '</p>
                    <p>' . $message->first('alamat') . '</p>
                    <p>' . $message->first('tgl_lahir') . '</p>
                    <p>' . $message->first('tempat_lahir') . '</p>'
                    
                );
            }
                $user = new User;
                $user->role = 'asdok';
                $user->name = $request->nama_asdok;
                $user->email = $request->email;
                $user->password = bcrypt('12345678');
                $user->remember_token = str_random(60);
                $user->save();

                $request->request->add(['users_id' => $user->id]);
                Asdok::create($request->all());

                return redirect('/asisten-dokter')->with('sukses', 'Data Berhasil di input');
        }catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . AsdokController::class . ' method : create | ' . $e);
            return redirect('/asisten-dokter')->with('gagal', 'Data Gagal di input');
        }
    }

    public function edit($id)
    {
        $idx = Crypt::decrypt($id);
        $data = Asdok::findOrFail($idx);
        // dd($data);
        return view('masterData.sdm.asisten-dokter.edit')->with([
            'data'             => $data,
            'title'            => 'Edit Asisten Dokter',
            'subtitle'         => 'Form Asisten Dokter',
        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        try {
            $validator = Validator::make(request()->all(), [
                'nik'             => 'required|numeric',
                'nama_asdok'      => 'required',
                'email'           => 'required|email',
                'no_telp'         => 'required|numeric',
                'alamat'          => 'required',
                'tgl_lahir'       => 'required',
                'tempat_lahir'    => 'required',
            ]);
            $attributeNames = array(
                'nik'             => 'NIK',
                'nama_asdok'      => 'Nama',
                'email'           => 'Email',
                'no_telp'         => 'Nomer Telepon',
                'alamat'          => 'Alamat',
                'tgl_lahir'       => 'Tanggal Lahir',
                'tempat_lahir'    => 'Tempat Lahir',
            );
            $validator->setAttributeNames($attributeNames);
            if ($validator->fails()) {
                $message = $validator->errors();

                return redirect('/asisten-dokter')->with('gagal','
                    <p>' . $message->first('nik') . '</p>
                    <p>' . $message->first('nama_asdok') . '</p>
                    <p>' . $message->first('email') . '</p>
                    <p>' . $message->first('no_telp') . '</p>
                    <p>' . $message->first('alamat') . '</p>
                    <p>' . $message->first('tgl_lahir') . '</p>
                    <p>' . $message->first('tempat_lahir') . '</p>'
                );
            }
            \Log::info($request->nik);
            $idx = Crypt::decrypt($id);
            $data = Asdok::findOrFail($idx);
            $finduser = User::where('id', '=', $data->users_id)->first();
            $nama_asdok = $finduser->name;
            // dd($nama_asdok);
            $data->update($request->all());
            //update nama user
            User::where('id', $finduser->id)
            ->update([
                'name'=>$request->nama_asdok,
            ]);
            // dd($data);
            return redirect('/asisten-dokter')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . DokterController::class . ' method : edit | ' . $e);
            return redirect('/asisten-dokter')->with('gagal', 'Data gagal di Edit');
        }
    }

}
