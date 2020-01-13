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
                <a href="{{url('/registrasi')}}">registrasi</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="{{url('/registrasi')}}">{{$subtitle}}</a>

              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              
               <!-- <a href="{{url('/pasien/cari')}}" class="btn btn-danger btn-round ml-1"> <i class="fa fa-search"></i>cari data pasien</a> -->
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                  <h4 class="card-title">{{$subtitle}}</h4>
              
                </div>
                </div>
                <div class="card-body">
                    @if(session('sukses'))
                 <div class="alert alert-success" role="alert">
                {{session('sukses')}}
                </div>  
                 @endif
                  @if(session('gagal'))
                 <div class="alert alert-danger" role="alert">
                {{session('gagal')}}
                </div>  
                 @endif
                  <div class="table-responsive">
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
                            <td>{{$k->no_registrasi}}</td>
                            <td>{{$k->pasien->nama}}</td>
                            <td>{{$k->dokter->nama_dokter}}</td>
                            <td>{{$k->poli->nama_poli}}</td>
                            <!-- <td>{{hitung_usia($k->tgl_lahir)}}</td> -->
                            <td>{{tgl_indo($k->tgl_reg)}}</td>
                            <td>
                            <form id="cencel-regitrasi" action=" {{url('pembayaran/lanjut/'.$k->id)}}" method="post">
                                                {{csrf_field()}}
                                                
                                                <button type="button" class="btn btn-success btn-xs" onclick="confirmCencel('cencel-regitrasi')">Proses</button>
                                            </form>
                            
                            </td>
                            </tr>
                            
                            @endforeach

                      </tbody>
                    </table>
                    
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
</div>


       
<!-- TES -->


@endsection

@section('js')
<script>
$(document).ready(function() {
      $('#basic-datatables').DataTable({
      });

// $(document).ready(function() {
//     $('#datatable').DataTable({
//         processing:true,
//         serverside:true,
//         ajax:"{{route('ajax.get.data.pasien')}}",
//         columns:[
//             {data:'nocm',name:'nocm'},
//             {data:'nama',name:'nama'},
//             {data:'tanggal_indo',name:'tanggal_indo'},
//             {data:'alamat',name:'alamat'},
//             {data:'pekerjaan',name:'pekerjaan'}
//         ]
//     })
// });

  $('#multi-filter-select').DataTable( {
        "pageLength": 5,
        initComplete: function () {
          this.api().columns().every( function () {
            var column = this;
            var select = $('<select class="form-control"><option value=""></option></select>')
            .appendTo( $(column.footer()).empty() )
            .on( 'change', function () {
              var val = $.fn.dataTable.util.escapeRegex(
                $(this).val()
                );

              column
              .search( val ? '^'+val+'$' : '', true, false )
              .draw();
            } );

            column.data().unique().sort().each( function ( d, j ) {
              select.append( '<option value="'+d+'">'+d+'</option>' )
            } );
          } );
        }
      });

      // Add Row
      $('#add-row').DataTable({
        "pageLength": 5,
      });

      var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

      $('#addRowButton').click(function() {
        $('#add-row').dataTable().fnAddData([
          $("#addName").val(),
          $("#addPosition").val(),
          $("#addOffice").val(),
          action
          ]);
        $('#addRowModal').modal('hide');

      });
    });


</script>

<script>
        function confirmCencel(item_id) {
            swal({
                 title: 'Apakah Anda Yakin Melajutkan Pembayaran?',
                  text: "Registrasi akan di closing!",
                  type: 'warning',
                  buttons:{
                  confirm: {
                   text : 'Yes, Lanjutkan!',
                    className : 'btn btn-success'
                  },
                  cancel: {
                  visible: true,
                  className: 'btn btn-danger'
                 }
              }
            })
                .then((willDelete) => {
                    if (willDelete) {
                        $('#'+item_id).submit();
                    } 
                });
        }
    </script>
@endsection