<?php

namespace App\Http\Controllers\MasterData;

    use Illuminate\Http\Request;
    use App\User;
    use App\model\MasterData\Terapis;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\TerapisRequest;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;

class TerapisController extends Controller
{
    private $terapis;

    public function __construct(Terapis $terapis)
    {
        $this->terapis = $terapis;
    }

    // list index terapis
    public function index(Request $request)
    {
        $row              = $this->terapis->orderBy('id', 'desc')->paginate(100);
        // $dataspesialis    = Spesialis::get()->toArray();
        // $datasubspesialis = SubSpesialis::get()->toArray();

        return view('masterData.sdm.terapis.index')->with([
            'data'             => $row,
            'title'            => 'Data Terapis',
            'subtitle'         => 'List Terapis',
            'no'               => '0',
        ]);
    }

    public function store(Request $request)
    {
        try {
            $validator      = Validator::make(request()->all(), [
                'nik'             => 'required|numeric',
                'nama_terapis'    => 'required',
                'email'           => 'required|email',
                'no_telp'         => 'required|numeric',
                'alamat'          => 'required',
                'tgl_lahir'       => 'required',
                'tempat_lahir'    => 'required',
            ]);
            $attributeNames = array(
                'nik'             => 'NIK',
                'nama_terapis'    => 'Nama',
                'email'           => 'Email',
                'no_telp'         => 'Nomer Telepon',
                'alamat'          => 'Alamat',
                'tgl_lahir'       => 'Tanggal Lahir',
                'tempat_lahir'    => 'Tempat Lahir',
                
            );
            $validator->setAttributeNames($attributeNames);
            if ($validator->fails()) {
                $message = $validator->errors();
                return redirect('/terapis')->with('gagal','
                    <p>' . $message->first('nik') . '</p>
                    <p>' . $message->first('nama_terapis') . '</p>
                    <p>' . $message->first('email') . '</p>
                    <p>' . $message->first('no_telp') . '</p>
                    <p>' . $message->first('alamat') . '</p>
                    <p>' . $message->first('tgl_lahir') . '</p>
                    <p>' . $message->first('tempat_lahir') . '</p>'
                    
                );
            }
                $user = new User;
                $user->role = 'terapis';
                $user->name = $request->nama_terapis;
                $user->email = $request->email;
                $user->password = bcrypt('12345678');
                $user->remember_token = str_random(60);
                $user->save();

                $request->request->add(['users_id' => $user->id]);
                Terapis::create($request->all());

                return redirect('/terapis')->with('sukses', 'Data Berhasil di input');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . TerapisController::class . ' method : create | ' . $e);

                return redirect('/terapis')->with('gagal', 'Data Gagal di input');
            }
    }

    public function edit($id)
    {
        $idx = Crypt::decrypt($id);
        $data = Terapis::findOrFail($idx);
        // dd($data);
        return view('masterData.sdm.terapis.edit')->with([
            'data'             => $data,
            'title'            => 'Edit Terapis',
            'subtitle'         => 'Form Terapis',

        ]);
    }

    public function update(Request $request, $id)
    {
        // dd($request->all());
        try {
            $validator = Validator::make(request()->all(), [
                'nik'             => 'required|numeric',
                'nama_terapis'    => 'required',
                'email'           => 'required|email',
                'no_telp'         => 'required|numeric',
                'alamat'          => 'required',
                'tgl_lahir'       => 'required',
                'tempat_lahir'    => 'required',
            ]);
            $attributeNames = array(
                'nik'             => 'NIK',
                'nama_terapis'     => 'Nama',
                'email'           => 'Email',
                'no_telp'         => 'Nomer Telepon',
                'alamat'          => 'Alamat',
                'tgl_lahir'       => 'Tanggal Lahir',
                'tempat_lahir'    => 'Tempat Lahir',
            );
            $validator->setAttributeNames($attributeNames);
            if ($validator->fails()) {
                $message = $validator->errors();

                return redirect('/terapis')->with('gagal','
                    <p>' . $message->first('nik') . '</p>
                    <p>' . $message->first('nama_terapis') . '</p>
                    <p>' . $message->first('email') . '</p>
                    <p>' . $message->first('no_telp') . '</p>
                    <p>' . $message->first('alamat') . '</p>
                    <p>' . $message->first('tgl_lahir') . '</p>
                    <p>' . $message->first('tempat_lahir') . '</p>'
                );
            }
            \Log::info($request->nik);
            $idx = Crypt::decrypt($id);
            $data = Terapis::findOrFail($idx);
            $finduser = User::where('id', '=', $data->users_id)->first();
            $nama_terapis = $finduser->name;
            $data->update($request->all());
            //update nama user
            User::where('id', $finduser->id)
            ->update([
                'name'=>$request->nama_terapis,
            ]);
            // dd($data);
            return redirect('/terapis')->with('sukses', 'Data Berhasil di Edit');
        } catch (\Exception $e) {
            // store errors to log
            \Log::error('class : ' . DokterController::class . ' method : edit | ' . $e);
            return redirect('/terapis')->with('gagal', 'Data gagal di Edit');
        }
    }

    public function ubah(Request $request)
    {
        if ($request->ajax()) {

            if($request->idterapis != null)
            {
                $terapis_id = $request->idterapis;
                $terapisModel = Terapis::findOrFail($terapis_id);
            }
            else
            {
                return $this->getResponse(false,500,'','Akses gagal dilakukan');
            }
        }
    }
    
}
