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
                             <button class="btn btn-success btn-xs" id="addPayment" data-id="{{$k->id}}">Add</button>
                            
                            </td>
                            </tr>
                            
                            @endforeach

    </tbody>
</table>