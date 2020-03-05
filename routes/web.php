<?php


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('login');
	//return 'tes return';
});

Route::get('/about', function () {
    return 'halaman about';
});

Route:: post('/add', function(){
return 'submit';
});

Route::get('/profile/{username}',function($username){
	return $username;

});
// Route::get('photos/test',[
// 'uses'=>'PhotoController@test',
// 'as'=>'photos.tes']);

Route::get('/login', 'AuthController@index')->name('login');
Route::post('/postlogin','AuthController@postlogin');
// Route::post('/postlokasi', 'AuthController@postlokasi');
Route::get('/logout','AuthController@logout');


Route::group(['middleware'=> ['auth','checkRole:admin']],function(){
   
    Route::get('/pasien','PasienController@index');
    Route::get('/pasien/create','PasienController@create');
    Route::get('/pasien/createreg', 'PasienController@createreg');
    Route::post('/pasien/do_create', 'PasienController@do_create');
    Route::post('/pasien/do_createreg', 'PasienController@do_createreg');
    Route::get('/pasien/{id}/edit','PasienController@edit');                      
    Route::post('/pasien/{id}/update','PasienController@update');
    Route::post('/pasien/cari', 'PasienController@cari');
    Route::get('/pasien/{id}/profile','PasienController@profile');

    Route::get('/dashboard','DashboardController@index');  
    Route::get('/dashboard','AdminController@dashboard');
    Route::get('/user','UserController@index');

    // Route::get('/mapel','MapelController@index');
    // Route::post('/mapel/create','MapelController@create');
    // Route::get('/mapel/{id}/edit','MapelController@edit');                      
    // Route::post('/mapel/{id}/do_edit','MapelController@do_edit');

   

    Route::get('/asuransi','AsuransiController@index');
    Route::post('/asuransi/create','AsuransiController@create');
    Route::get('/asuransi/{id}/edit','AsuransiController@edit');                      
    Route::post('/asuransi/{id}/do_edit','AsuransiController@do_edit');

    Route::get('/rujukan', 'RujukanController@index');
    Route::post('/rujukan/create', 'RujukanController@create');
    Route::get('/rujukan/{id}/edit', 'RujukanController@edit');
    Route::post('/rujukan/{id}/update', 'RujukanController@update');

    Route::get('/faskes', 'FaskesController@index');
    Route::post('/faskes/create', 'FaskesController@create');
    Route::get('/faskes/{id}/edit', 'FaskesController@edit');
    Route::post('/faskes/{id}/update', 'FaskesController@update');

   

    Route::get('/lokasi', 'LokasiController@index');
    Route::get('/pilihlokasi', 'LokasiController@pilih');
    Route::post('/lokasi/create', 'LokasiController@create');
    Route::get('/lokasi/{id}/edit', 'LokasiController@edit');
    Route::post('/lokasi/{id}/update', 'LokasiController@update');

    Route::get('/tindakan', 'TindakanController@index');
    Route::post('/tindakan/create', 'TindakanController@create');
    Route::get('/tindakan/{id}/edit', 'TindakanController@edit');
    Route::post('/tindakan/{id}/update', 'TindakanController@update');

    Route::get('/karyawan', 'KaryawanController@index');
    Route::post('/karyawan', 'KaryawanController@store');
    //Route::post('/karyawan/create', 'KaryawanController@create');
    Route::get('/karyawan/{id}/edit', 'KaryawanController@edit');
    Route::post('/karyawan/{id}/update', 'KaryawanController@update');

    Route::get('/itemmedis', 'ItemMedisController@index');
    Route::post('/itemmedis/create', 'ItemMedisController@create');
    Route::get('/itemmedis/{id}/edit', 'ItemMedisController@edit');
    Route::post('/itemmedis/{id}/update', 'ItemMedisController@update');

    Route::get('/registrasi','Registrasi1Controller@index');
    Route::get('/registrasi/cek','Registrasi1Controller@cek');
    Route::get('/registrasi/list','Registrasi1Controller@list');
    Route::get('/registrasi/pasien','Registrasi1Controller@daftarsiswa');
    Route::get('/registrasi/new','Registrasi1Controller@new');
    Route::post('/registrasi/cari','Registrasi1Controller@cari');
    Route::post('/registrasi/create','Registrasi1Controller@create');
    Route::post('/registrasi/create_new','Registrasi1Controller@create_new');
    Route::get('/registrasi/{id}/add_reg','Registrasi1Controller@add_reg');
    Route::get('/registrasi/{id}/edit','Registrasi1Controller@edit');

    Route::post('/registrasi/cencel/{id}','Registrasi1Controller@cencel');                     
    Route::post('/registrasi/{id}/update','Registrasi1Controller@update');



     Route::group(['namespace' => 'MasterData'], function () {
        //poli
        Route::resource('poli', 'PoliController');
        Route::get('poli/{id}/edit', 'PoliController@edit');
        Route::post('/poli/{id}/update', 'PoliController@update');

        //spesialis
        Route::resource('spesialis', 'SpesialisController');
        Route::get('spesialis/{id}/edit', 'SpesialisController@edit');
        Route::post('/spesialis/{id}/update', 'SpesialisController@update');

        //subspesialis
        Route::resource('subspesialis', 'SubSpesialisController');
        Route::get('subspesialis/{id}/edit', 'SubSpesialisController@edit');
        Route::post('/subspesialis/{id}/update', 'SubSpesialisController@update');

        //dokter
        Route::resource('dokter', 'DokterController');
        Route::get('dokter/{id}/edit', 'DokterController@edit');
        Route::post('dokter/{id}/update', 'DokterController@update');

        //staff
        Route::resource('staff', 'StaffController');
        Route::get('staff/{id}/edit', 'StaffController@edit');
        Route::post('staff/{id}/update', 'StaffController@update');
         
        //perawat
        Route::resource('perawat', 'PerawatController');
        Route::get('perawat/{id}/edit', 'PerawatController@edit');
        Route::post('perawat/{id}/update', 'PerawatController@update');
        
        //terapis
        Route::resource('terapis', 'TerapisController');
        Route::get('terapis/{id}/edit', 'TerapisController@edit');
        Route::post('terapis/{id}/update', 'TerapisController@update');

        //asisten dokter
        Route::resource('asisten-dokter', 'AsdokController');
        Route::get('asisten-dokter/{id}/edit', 'AsdoktController@edit');
        Route::post('asisten-dokter/{id}/update', 'AsdokController@update');

        //produkItem
        Route::resource('produkitem', 'ProdukItemController');
        Route::get('produkitem/{id}/edit', 'ProdukItemController@edit');
        Route::post('produkitem/{id}/update', 'ProdukItemController@update');
        Route::post('produkitem/cari', 'ProdukItemController@cari');

        //produkItem_katagori
        Route::resource('produk_katagori', 'ProdukKatagoriController');
        Route::get('produk_katagori/{id}/edit', 'ProdukKatagoriController@edit');
        Route::post('produk_katagori/{id}/update', 'ProdukKatagoriController@update');

        //satuan besar
        Route::resource('satuanbesar', 'SatuanBesarController');
        Route::get('satuanbesar/{id}/edit', 'SatuanBesarController@edit');
        Route::post('satuanbesar/{id}/update', 'SatuanBesarController@update');

        //satuan kecil
        Route::resource('satuankecil', 'SatuanKecilController');
        Route::get('satuankecil/{id}/edit', 'SatuanKecilController@edit');
        Route::post('satuankecil/{id}/update', 'SatuanKecilController@update');

         //Suplier
         Route::resource('suplier', 'SuplierController');
         Route::get('suplier/{id}/edit', 'SuplierController@edit');
         Route::post('suplier/{id}/update', 'SuplierController@update');

          //Suplier
         Route::resource('suplier_maping', 'ProdukSuplierMappingController');
         Route::get('suplier_maping/{id}/edit', 'ProdukSuplierMappingController@edit');
         Route::post('suplier_maping/store', 'ProdukSuplierMappingController@store');

           //jasa katgori
         Route::resource('jasakatagori', 'JasakatagoriController');
         Route::get('jasakatagori/{id}/edit', 'JasakatagoriController@edit');
         Route::post('jasakatagori/{id}/update', 'JasakatagoriController@update');

          //Jasa
        Route::resource('jasa', 'JasaController');
        Route::get('jasa/{id}/edit', 'JasaController@edit');
        Route::post('jasa/{id}/update', 'JasaController@update');
        Route::post('jasa/cari', 'JasaController@cari');


    });

    Route::group(['namespace' => 'Pembayaran'], function () {

        //kas
        Route::resource('kas', 'KasController');
        Route::get('kas/{id}/edit', 'KasController@edit');
        Route::post('kas/{id}/update', 'KasController@update');

        //Pembayaran
        Route::resource('pembayaran', 'PembayaranController');
        Route::get('pembayaran/{id}/edit', 'PembayaranController@edit');
        Route::post('pembayaran/{id}/update', 'PembayaranController@update');
         Route::post('pembayaran/lanjut/{id}', 'PembayaranController@lanjut');
        Route::get('pembayaran/show', 'PembayaranController@show');
        Route::get('pembayaran/proses', 'PembayaranController@proses');
        Route::get('lanjut-pembayaran/{id}','PembayaranController@lanjut_ajax'); 
        Route::post('pembayaran-simpam-invoice','PembayaranController@SimpanInvoice'); 
        Route::get('load-modal-data-pembayaran/{id}', 'PembayaranController@showmodalAddpembayaran');

        //Pembayaran Detil
        Route::get('pembayaran_detil/{id}/edit', 'PembayaranDetilController@edit');
        Route::get('load-modal-data-create-transaksi/{id}', 'PembayaranDetilController@showmodalAddTransaksi');
        Route::get('load-modal-data-create-transaksi-tindakan/{id}', 'PembayaranDetilController@showmodalAddTransaksiTindakan');
        Route::get('load-modal-item-by-add-transaksi', 'PembayaranDetilController@ShowModalItemByAddTransaksi');
        Route::get('load-modal-item-by-add-transaksi-tindakan', 'PembayaranDetilController@ShowModalItemByAddTransaksiTindakan');
        Route::post('pembayaran-detil', 'PembayaranDetilController@AddPembayaranDetail');
        Route::get('pembayaran_detil/', 'PembayaranDetilController@index');
        Route::post('pembayaran_detil/{id}/update', 'PembayaranDetilController@update');
        Route::post('hapus-pembayaran-detail/{id}', 'PembayaranDetilController@DeletePembayaranDetail');
        Route::post('posting-pembayaran-detail/{id}', 'PembayaranDetilController@Posting');
        Route::get('pembayaran_detil/printprev/{id}', 'PembayaranDetilController@printprev');


         //Invoice
        Route::resource('invoice', 'InvoiceController');
        Route::get('invoice/show/{id}', 'InvoiceController@show');
        Route::get('invoice/edit/{id}', 'InvoiceController@edit');
        Route::post('invoice/{id}/update', 'InvoiceController@update');
        Route::get('/cobapdf',function () {

            Fpdf::AddPage();
            Fpdf::SetFont('Courier', 'B', 18);
            Fpdf::Cell(50, 25, 'Hello World!');
            Fpdf::Output();

        });


        //  Route::resource('penerimaan1', 'PenerimaanController');

    }); 

        // route inventori
      Route::group(['namespace' => 'Inventory'], function () {

        Route::resource('penerimaan', 'PenerimaanController');
        Route::get('penerimaan/create', 'PenerimaanController@create');
        Route::get('penerimaan/{id}/edit', 'PenerimaanController@edit');
        Route::post('penerimaan/{id}/update', 'PenerimaanController@update');
        Route::get('penerimaan/list', 'PenerimaanController@list');
        Route::get('penerimaan/proses', 'PenerimaanController@proses');
        Route::get('penerimaan/prosesdetil/{id}', 'PenerimaanController@prosesdetil');
        Route::post('penerimaan/store','PenerimaanController@store'); 


        Route::resource('penerimaan_detil', 'PenerimaanDetilController');
        //Pembayaran Detil
        Route::get('penerimaan_detil/{id}/edit', 'PembayaranDetilController@edit');
        Route::get('load-modal-data-create-penerimaan/{id}', 'PenerimaanDetilController@showmodalAddTransaksi');
        Route::get('load-modal-item-by-add-penerimaan', 'PenerimaanDetilController@ShowModalItemByAddTransaksi');
        Route::post('penerimaan-detil', 'PenerimaanDetilController@AddPenerimaanDetail');
        Route::get('penerimaan_detil/', 'PenerimaanDetilController@index');
        Route::post('penerimaan_detil/{id}/update', 'PenerimaanDetilController@update');
        Route::post('hapus-penerimaan-detail/{id}', 'PenerimaanDetilController@DeletePenerimaanDetail');
        Route::post('posting-penerimaan-detail/{id}', 'PenerimaanDetilController@Posting');
        Route::get('penerimaan_detil/printprev/{id}', 'PenerimaanDetilController@printprev');


        //retur
        Route::resource('retur', 'ReturController');
        Route::get('retur/create', 'ReturController@create');
        Route::get('retur/{id}/edit', 'ReturController@edit');
        Route::post('retur/{id}/update', 'ReturController@update');


        //kartu stok
        Route::resource('kartustok', 'KartustokController');
        Route::post('kartustok/cari', 'KartustokController@cari');
        Route::get('kartustok/printview/{id}', 'KartustokController@printview');
        Route::get('kartustok/excel/{id}', 'KartustokController@excel');


        //ajustment
        Route::resource('ajustment', 'AjustmentController');
        Route::get('ajustment/{id}/edit', 'AjustmentController@edit');
        Route::post('ajustment/cari', 'AjustmentController@cari');
        Route::post('ajustment/store','AjustmentController@store'); 
        // Route::get('ajustment/printprev/{id}', 'AjustmentController@printprev');
        // Route::get('ajustment/excel/{id}', 'AjustmentController@excel');
       
      });

});
     Route::group(['middleware'=> ['auth','checkRole:admin,staff']],function(){
        
     Route::get('/dashboard','DashboardController@index');  
});

Route::get('getdatapasien',[
    'uses' => 'PasienController@getdatapasien',
    'as' => 'ajax.get.data.pasien'
]);
