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
              <a href="{{url('/penerimaan')}}">Inventory</a>
            </li>
            <li class="separator">
              <i class="flaticon-right-arrow"></i>
            </li>
            <li class="nav-item">
              <a href="{{url('/penerimaan')}}">{{$subtitle}}</a>
            </li>
          </ul>
        </div>


          <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                <h4 class="card-title">{{$title}}</h4>
                </div>
              </div>
              <form action="{{ url('/kartustok/printview/'.$data->id) }}" target="_BLANK">
                <div class="card-body">
                  <div class="col-md-10">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Mulai</label>
                      <input type="date" class="form-control" id="dari_tgl" name="dari_tgl" required>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Tanggal Selesai</label>
                      <input type="date" class="form-control" id="sampai_tgl" name="sampai_tgl" required>
                    </div>
                  </div>
                </div>
                <div class="card-footer">
                  <button type="submit" class="btn btn-warning btn-round fa fa-print"> Print Review</button>
                </div>
              </form>
              {{-- <a class="btn btn-warning btn-sm btn-round" href="{{ url('/kartustok/printview/'.$data->id) }}" target="_BLANK">
                <i class="fa fa-print"></i>
                Print Preview
              </a> --}}
            </div>
            
            <div class="card">
              <div class="card-header">
                <div class="d-flex align-items-center">
                  <h4 class="card-title">{{$title}}</h4>
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
                  <table id="basic-datatables" class="display table table-striped table-hover">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Periode</th>
                        <th width="15%">Nama Item</th>
                        <th>Stok Masuk</th>
                        <th>Stok Keluar</th>
                        <th>Transaksi</th>
                        <th>Keterangan</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($kartustok as $k)
                      <tr>
                        <td>{{$no=$no+1}}</td>
                        <td>{{$k->periode}}</td>
                        <td>{{$k->produk_item->nama_item}}</td>
                        <td>{{$k->stok_masuk}}</td>
                        <td>{{$k->stok_keluar}}</td>
                        <td>{{$k->transaksi}}</td>
                        <td>{{$k->keterangan}}</td>
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
</div>

@endsection

@section('js')
<script type="text/javascript">
$(".date").datepicker({
  autoclose: true,
  locale: 'no',
  format: 'yyyy-mm-dd',
})

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

$('#idDokter').select2({placeholder: "Pilih Suplier...", width: '100%'});
$('#idPoli').select2({placeholder: "Pilih Poli...", width: '100%'});
</script>
@endsection
