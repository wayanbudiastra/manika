<?php

namespace App\Http\Controllers\Pembayaran;

    use  App\User;
    use App\model\Pembayaran\Kas;
    use App\model\Pembayaran\Pembayaran;
    use App\model\Pembayaran\PembayaranDetil;
    use \App\model\Registrasi1;
    use App\Http\Controllers\Controller;
    use App\Http\Requests\Pembayaran\KasRequest;
    use App\model\MasterData\Spesialis;
    use App\model\MasterData\SubSpesialis;
    use App\model\MasterData\Dokter;
    use Illuminate\Http\Request;
    use Yajra\DataTables\DataTables;
    use Illuminate\Support\Facades\Validator;
    use Illuminate\Support\Facades\Crypt;
    use PDF;
    use Fpdf;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data = Pembayaran::where('aktif','N')->where('closing','N')->get();

         //dd($data);
          return view('pembayaran.invoice.index',['data' => $data,'no' => 0,
            'subtitle'=>'Data Invoice',
            'title'=>'List Invoice Pasien']);
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
         $idx = Crypt::decrypt($id);

         $data = Pembayaran::find($idx);
         $invoice = $data->invoice + 1;
        // dd($data);
         $detil = PembayaranDetil::where('pembayaran_id',$data->id)->orderby('transaksi','ASC')->get();
         $data->update(['invoice'=> $invoice]);
         //dd($detil);
         $pdf = PDF::loadview('pembayaran.invoice.invoice',
            ['data'=>$data,
             'detil'=>$detil,
             'title' => 'Invoice',
             'no'=> '0',
             'total' => '0'
           ]);
         return $pdf->stream();

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
         $idx = Crypt::decrypt($id);

         $data = Pembayaran::find($idx);
         $invoice = $data->invoice + 1;
        // dd($data);
         $detil = PembayaranDetil::where('pembayaran_id',$data->id)->orderby('transaksi','ASC')->get();
         $data->update(['invoice'=> $invoice]);
         //dd($detil);
         $pdf = PDF::loadview('pembayaran.invoice.invoice_copy',
            ['data'=>$data,
             'detil'=>$detil,
             'title' => 'Invoice',
             'no'=> '0',
             'total' => '0'
           ]);
         return $pdf->stream();
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

    public function cobapdf(){

        Fpdf::AddPage();
        Fpdf::SetFont('Courier', 'B', 18);
        Fpdf::Cell(50, 25, 'Hello World!');
        Fpdf::Output();

    }
}
