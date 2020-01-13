<?php

    namespace App\Http\Controllers\MasterData;
    use  App\User;
    use App\model\MasterData\Staff;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\MasterData\StaffRequest;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     private $staff;

        public function __construct(Staff $staff)
        {
            $this->staff = $staff;
        }

    
        public function index(Request $request)
        {
            $row              = $this->staff->orderBy('id', 'desc')->paginate(100);
            return view('masterData.sdm.staff.index')->with([
                'data'             => $row,
                'title'            => 'Data Staff',
                'subtitle'         => 'List Staff',
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
                    'nik'             => 'required|numeric',
                    'nama_staff'      => 'required',
                    'email'           => 'required|email',
                    'no_telp'         => 'required|numeric',
                    'alamat'          => 'required',
                    'tgl_lahir'       => 'required',
                    'tempat_lahir'    => 'required',

                ]);
                $attributeNames = array(
                    'nik'             => 'NIK',
                    'nama_staff'     => 'Nama',
                    'email'           => 'Email',
                    'no_telp'         => 'Nomer Telepon',
                    'alamat'          => 'Alamat',
                    'tgl_lahir'       => 'Tanggal Lahir',
                    'tempat_lahir'    => 'Tempat Lahir',
                    
                );
                $validator->setAttributeNames($attributeNames);
                if ($validator->fails()) {
                    $message = $validator->errors();
                    return redirect('/dokter')->with('gagal',
                        '<p>' . $message->first('nik') . '</p>
                        <p>' . $message->first('nama_staff') . '</p>
                        <p>' . $message->first('email') . '</p>
                        <p>' . $message->first('no_telp') . '</p>
                        <p>' . $message->first('alamat') . '</p>
                        <p>' . $message->first('tgl_lahir') . '</p>
                        <p>' . $message->first('tempat_lahir') . '</p>'
                       
                    );
                }
                $user = new User;
                $user->role = 'staff';
                $user->name = $request->nama_staff;
                $user->email = $request->email;
                $user->password = bcrypt('12345678');
                $user->remember_token = str_random(60);
                $user->save();

                $request->request->add(['users_id' => $user->id]);
                Staff::create($request->all());

                return redirect('/staff')->with('sukses', 'Data Berhasil di input');
            } catch (\Exception $e) {
                // store errors to log
                \Log::error('class : ' . StaffController::class . ' method : create | ' . $e);

                return redirect('/staff')->with('gagal', 'Data Gagal di input');
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
