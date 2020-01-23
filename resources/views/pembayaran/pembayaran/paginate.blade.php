 <table id="basic-datatables" class="display table table-striped table-hover" >
                      <thead>
                       <tr>
                        <th>No</th>
                        <th>No Reg</th>
                        <th>Nama Pasien</th>
                        <th>Dokter</th>
                        <th>Poli</th>
                        <!-- <th>Usia</th> -->
                        <th>Tgl Reg</th>
                        <th>Aksi</th>
                        </tr>
                      </thead>
                     
                      <tbody>
                        @foreach($data as $k)
                            <?php $id = Crypt::encrypt($k->id); ?>
                            <tr>
                            <td>{{$no=$no+1}}</td>
                            <td>{{$k->registrasi1->no_registrasi}}</td>
                            <td>{{$k->registrasi1->pasien->nama}}</td>
                            <td>{{$k->registrasi1->dokter->nama_dokter}}</td>
                            <td>{{$k->registrasi1->poli->nama_poli}}</td>
                            <!-- <td>{{hitung_usia($k->tgl_lahir)}}</td> -->
                            <td>{{tgl_indo($k->registrasi1->tgl_reg)}}</td>
                            <td>
                             <button class="btn btn-success btn-xs modal-pembayaran" data-id="{{$k->id}}" data-toggle="modal" data-target="#exampleModal">Add</button>
                            
                            </td>
                            </tr>
                            
                            @endforeach

    </tbody>
</table>

<!-- Awal Modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog  modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="container-fluid">
           <div class="row">
                 <form id="CreateDataPembayaran" method="POST" enctype="multipart/form-data" onsubmit="return false">

                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissible fade show messageboxTindakan" role="alert"  id="errMsgTindakan" style="width: 100%">
                                <div id="ShowErrordata"></div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        </div>
                        <div class="col-md-12">
                            
                        </div>
                         <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>No Registrasi</label>
                                <input name="no_registrasi" type="text" class="form-control" 
                                       placeholder="no_registrasi" readonly>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Pasien</label>
                                <input name="pasien" type="text" class="form-control" 
                                       placeholder="pasien" readonly>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Dokter</label>
                                <input name="dokter" type="text" class="form-control" 
                                       placeholder="Dokter" readonly>
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Poli</label>
                                <input name="poli" type="text" class="form-control" 
                                       placeholder="Poli" readonly>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><h2>Total</h2></label>
                                <h2><strong><input name="total1" id="total1" type="text" readonly class="form-control-plaintext" 
                                       placeholder="Harga"></strong></h2>
                            </div>
                        </div>
                        <input type="hidden"  name="total" id="total">
                        <input type="hidden"  name="id" id="id">
                        <input type="hidden"  name="kembali" id="kembali">
                       

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Pembayaran</label>
                            <input name="pembayaran" id="pembayaran" type="text" class="form-control-plaintext">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Kembali</label>
                                <input name="kembali1" id="kembali1" type="text" class="form-control-plaintext"  readonly="readonly" 
                                       placeholder="">
                            </div>
                        </div>

                         <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label><h4>Terbilang</h4></label>
                                <h2><input name="terbilang" type="text" class="form-control-plaintext" readonly="readonly" 
                                ></h2>
                            </div>
                        </div>
                    </div>
                </form>   


           </div>
       </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-round" data-dismiss="modal">Close</button>
        <!-- <button type="button" class="btn btn-primary">Simpan</button> -->
         <span id="btnSimpan"></span>
      </div>
    </div>
  </div>
</div>



