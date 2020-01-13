@extends('layouts.master')
@section('content')

    <div class="main-panel">
        <div class="content">
            <div class="page-inner">
                <div class="page-header">
                    <h4 class="page-title">{{$title}}</h4>
                    <ul class="breadcrumbs">
                        <li class="nav-home">
                            <a href="#">
                                <i class="flaticon-home"></i>
                            </a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/pembayaran')}}">Pembayaran</a>
                        </li>
                        <li class="separator">
                            <i class="flaticon-right-arrow"></i>
                        </li>
                        <li class="nav-item">
                            <a href="{{url('/pembayaran_detil')}}">{{$subtitle}}</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Data Registrasi Pasien</h4>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6 col-lg-6">
                                {{csrf_field()}}
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nomor RM</label>
                                        <input type="text" class="form-control" id="namaDepan"
                                               placeholder="Nama Lengkap" value="{{$data->registrasi1->pasien->nocm}}"
                                               required="required" readonly="readonly">
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Nama Pasien</label>
                                        <input type="text" class="form-control" id="namaDepan"
                                               placeholder="Nama Lengkap" value="{{$data->registrasi1->pasien->nama}}"
                                               required="required" readonly="readonly">
                                    </div>

                                    <div class="form-group ">
                                        <label for="exampleInputEmail1">Tempat Lahir</label>
                                        <input type="text" class="form-control" id="nama_belakang"
                                               aria-describedby="emailHelp"
                                               value="{{$data->registrasi1->pasien->tempat_lahir}}"
                                               placeholder="Tempat Lahir" required="required" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Tanggal Lahir</label>
                                        <input type="text"
                                               class="datepicker-here form-control"
                                               data-language='en'
                                               data-position="top left"
                                               value="{{$data->registrasi1->pasien->tgl_lahir}}"
                                               required="required"
                                               readonly="readonly"
                                        />
                                    </div>
                                </div>

                                <div class="col-md-6 col-lg-6">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">No Regs</label>
                                        <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode"
                                               value=" {{$data->registrasi1->no_registrasi}}" readonly="readonly">
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">dokter</label>
                                        <select class="form-control select" style="min-width:350px;" required
                                                name="dokter_id" readonly="readonly">
                                            <option></option>
                                            @foreach($d as $a)
                                                @if($a->id == $data->registrasi1->dokter_id)

                                                    <option value='{{$a->id}}' selected>{{$a->nama_dokter}}</option>
                                                @else
                                                    <option value='{{$a->id}}'>{{$a->nama_dokter}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Pilih Poli</label>
                                        <select class="form-control select" name="poli_id" readonly="readonly">
                                            <option></option>
                                            @foreach($pol as $a)
                                                @if($a->id == $data->registrasi1->poli_id)
                                                    <option value='{{$a->id}}' selected>{{$a->nama_poli}}</option>
                                                @else
                                                    <option value='{{$a->id}}'>{{$a->nama_poli}}</option>
                                                @endif

                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Keterangan</label>
                                        <textarea name="keterangan" class="form-control" id="keterangan"
                                                  readonly="readonly" cols="30"
                                                  rows="3">{{$data->registrasi1->keterangan}}</textarea>
                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                               <span id="addtindakan"></span>
                                <span id="additem"></span>
                                <?php $id = Crypt::encrypt($data->id); ?>
                                <a class="btn btn-warning btn-round" href="{{url('/pembayaran_detil/printprev/'.$id)}}" target="_BLANK">
                                    <i class="fa fa-print"></i>
                                    Print Preview
                                </a>

                                <span id="cekposting"></span>
                                <h1>  Total Bill: <b><span id="subtotal"></span></b></h1>
                               
                            </div>
                        </div>

                        <div class="table-responsive" id="reloadpaginate">
                            @include('pembayaran.pembayaran_detil.paginate')
                        </div>


                    </div>
                </div>
            </div>
        </div>

     
        <div id="modaladdtransaksi"></div>
        <div id="loadmodaltembyaddtransaksi"></div>
        <div id="modaladdtransaksitindakan"></div>
        <div id="loadmodalTindakanbyaddtransaksi"></div>
        
        
        @endsection

        @section('js')

            <script type="text/javascript">
                $(document).ready(function () {
                    //function show modal create
                    $(document).off('click', '.loadmodaltransaksicreate');
                    $(document).off('click', '.loadmodaltransaksitindakancreate');
                    $(document).on('click', '#loadmodaltransaksicreate', function (event) {
                        event.preventDefault();
                        $("#loadmodaltransaksicreate").prop('disabled', true);
                        $('#modaladdtransaksi').load("/load-modal-data-create-transaksi/" + '{!! Crypt::encrypt($data->id) !!}');
                    })
                    $(document).on('click', '#loadmodaltransaksitindakancreate', function (event) {
                        event.preventDefault();
                        $("#loadmodaltransaksitindakancreate").prop('disabled', true);
                        $('#modaladdtransaksitindakan').load("/load-modal-data-create-transaksi-tindakan/" + '{!! Crypt::encrypt($data->id) !!}');
                    })
                    $(document).on('click', '.delete', function (event) {
                        event.preventDefault();
                        var $this = $(this);
                        var id = $this.data('id');
                        swal({
                            title: 'Apakah Anda Yakin ?',
                            text: "Hapus Data Tersebut!",
                            type: 'warning',
                            buttons: {
                                confirm: {
                                    text: 'Ya, Hapus!',
                                    className: 'btn btn-success'
                                },
                                cancel: {
                                    visible: true,
                                    className: 'btn btn-danger'
                                }
                            }
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        url: '/hapus-pembayaran-detail/' + id,
                                        data: {
                                            "id": id,
                                            "_token": $("input[name='_token']").val(),
                                        },
                                        type: 'post',
                                        success: function (response) {

                                            swal(
                                                'Hapus!',
                                                'Data Berhasil Dihapus.',
                                                'success'
                                            )
                                            $('#reloadpaginate').load("/pembayaran_detil/" + '{!! Crypt::encrypt($data->id) !!}' + "/edit");

                                        },
                                        error: function (response) {
                                            swal(
                                                'Hapus!',
                                                'Data Gagal Hapus.',
                                                    'error'
                                                )
},

                                    })
                                }
                            })

                    })
                    $(document).on('click', '#posting', function (event) {
                        event.preventDefault();
                        var $this = $(this);
                        var id = $this.data('id');
                        var jenis = $this.data('jenis');
                        var value = $this.data('value');
                        swal({
                            title: 'Apakah Anda Yakin ?',
                            text: jenis+" Data Tersebut!",
                            type: 'warning',
                            buttons: {
                                confirm: {
                                    text: 'Ya, '+jenis+'!',
                                    className: 'btn btn-success'
                                },
                                cancel: {
                                    visible: true,
                                    className: 'btn btn-danger'
                                }
                            }
                        })
                            .then((willDelete) => {
                                if (willDelete) {
                                    $.ajax({
                                        url: '/posting-pembayaran-detail/' + id,
                                        data: {
                                            "id": id,
                                            "value": value,
                                            "_token": $("input[name='_token']").val(),
                                        },
                                        type: 'post',
                                        success: function (response) {

                                            swal(
                                                'Posting Bill!',
                                                'Data Berhasil '+jenis+'.',
                                                'success'
                                            )
                                            $('#reloadpaginate').load("/pembayaran_detil/" + '{!! Crypt::encrypt($data->id) !!}' + "/edit");

                                        },
                                        error: function (response) {

                                            swal(
                                                jenis+'!',
                                                'Data Gagal '+jenis+'.',
                                                'error'
                                            )
},
                                    })
                                }
                            })

                    })
                })
                $(".date").datepicker({
                    autoclose: true,
                    locale: 'no',
                    format: 'yyyy-mm-dd',
                })

                $('#idDokter').select2({placeholder: "Pilih Dokter...", width: '100%'});
                $('#idPoli').select2({placeholder: "Pilih Poli...", width: '100%'});

                $('#basic-datatables').DataTable({});

                function validate(evt) {
                    var theEvent = evt || window.event;

                    // Handle paste
                    if (theEvent.type === 'paste') {
                        key = event.clipboardData.getData('text/plain');
                    } else {
                        // Handle key press
                        var key = theEvent.keyCode || theEvent.which;
                        key = String.fromCharCode(key);
                    }
                    var regex = /[0-9]|\./;
                    if (!regex.test(key)) {
                        theEvent.returnValue = false;
                        if (theEvent.preventDefault) theEvent.preventDefault();
                    }
                }
            </script>
@endsection
