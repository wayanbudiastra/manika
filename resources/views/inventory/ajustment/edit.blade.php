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
                <form action="{{url('/ajustment/store')}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
                  <input type="hidden" class="form-control" id="id"  name="id" value="{{ $data->id }}">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Kode Produk</label>
                    <input type="text" class="form-control" id="kode"  name="kode" value="{{ $data->kode }}" readonly="readonly">
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Tanggal Ajustment</label>
                    <input type="date" class="form-control" id="tgl_ajust"  name="tgl_ajust" value="-">
                  </div>
              
                  <div class="col-sm-12 form-group">
                    <label for="exampleInputEmail1">Jenis Ajustment</label>
                      <div class="form-group form-group-default">
                          <label class="radio-inline"><input type="radio" name="aktif" value="In"> In</label>
                          <label class="radio-inline"><input type="radio" name="aktif" value="Out"> Out</label>
                      </div>
                  </div>
                   
                  <input type="hidden" id="stok" name="stok" value="{{ $data->stok }}">

                  <div class="form-group">
                    <label for="exampleInputEmail1">Kuantitas</label>
                    <input type="text" class="form-control" id="qty"  name="qty" value="1" onkeypress='validate(event)' required>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputEmail1">Keterangan</label>
                    <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5"></textarea>
                  </div>

                  <div class="form-group">  
                    <a href="{{url('/ajustment')}}"  class="btn btn-danger">Close</a>
                    <button type="submit" class="btn btn-primary">Lanjutkan</button>
                  </div>
                </div>
                </form>
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
                  <table id="basic-datatables" class="display table table-striped table-hover" >
                    <thead>
                      <tr>
                       <th>No</th>
                        <th>Tanggal</th>
                        <th>Nama Item</th>
                        <th>Jenis Ajustment</th>
                        <th>Oty</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                   
                    <tbody>
                        @foreach($ajustment as $k)
                        <tr>
                        <td>{{$no=$no+1}}</td>
                        <td>{{$k->tgl_ajust}}</td>
                        <td>{{$k->produk_item->nama_item}}</td>
                        <td>{{$k->jenis_ajust}}</td>
                        <td>{{$k->qty}}</td>
                        <td><center><a href="{{url('/ajustment/'.$k->id.'/edit')}}" class="btn btn-outline-danger delete"><i class="fa fa-trash"></i></a></center></td>
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
