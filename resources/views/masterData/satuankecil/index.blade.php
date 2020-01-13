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
                <a href="#">Manajemen</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="#">{{$subtitle}}</a>
              </li>
            </ul>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                  <h4 class="card-title">{{$subtitle}}</h4>
                  <button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
                      <i class="fa fa-plus"></i>
                      Add Row
                    </button>
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
                          <th>Nama Satuan Kecil</th>
                          <th>Keterangan</th>
                          <th>aktif</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                     
                      <tbody>
                          @foreach($data as $k)
                          <tr>
                          <td>{{$no=$no+1}}</td>
                          <td>{{$k->nama_satuan_kecil}}</td>
                          <td>{{$k->keterangan}}</td>
                           <td>{!!  ($k->aktif == "Y") ? '<span class="btn btn-success  btn-round btn-xs">Ya</span>' : ('<span class="btn btn-danger  btn-round btn-xs">Tidak</span>')!!}</td>
                          <td><center><a href="{{url('/satuankecil/'.$k->id.'/edit')}}" class="btn btn-warning btn-xs">Update</a></center></td>
                          </tr>
                          @endforeach
                      </tbody>
                    </table>
                    <!-- <center>{{ $data->links() }}</center> -->
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
</div>

        <div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header no-bd">
                          <h5 class="modal-title">
                            <span class="fw-light">
                             {{$title}}
                            </span>
                          </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                         
                          <form action="{{url('/satuankecil')}}" method="POST" enctype="multipart/form-data">
                             {{csrf_field()}}
                            <div class="row">
                              
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Nama Satuan Kecil</label>
                                  <input name="nama_satuan_kecil" type="text" class="form-control" placeholder="Nama Satuan Kecil">
                                </div>
                              </div>
                              <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                  <label>keterangan</label>
                                  <input name="keterangan" type="text" class="form-control" placeholder="keterangan">
                                </div>
                              </div>
                         
                            </div>
                         
                        </div>
                        <div class="modal-footer no-bd">
                          <button type="submit"  class="btn btn-primary">Simpan</button>
                          <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                        </div>
                      </div>
                       </form>
                    </div>
                  </div>
<!-- TES -->

	<!-- </div> -->
<!--Modal -->

@endsection

@section('js')
<script >
    $(document).ready(function() {
      $('#basic-datatables').DataTable({
      });

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
@endsection