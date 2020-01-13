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
                <a href="{{url('/pembayaran')}}">pembayaran</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="{{url('/pembayaran_detil')}}">{{$subtitle}}</a>

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
                     @include('pembayaran.pembayaran.paginate')
                  </div>
                </div>
              </div>
            </div>
        </div>
      </div>
</div>

<div id="ModalAddPembayaran"></div>

       
<!-- TES -->


@endsection

@section('js')
<script>
$(document).ready(function() {
      $('#basic-datatables').DataTable({
      });


  // $(document).on('click', '#addPayment', function () {
  //           var id = $(this).data('id');
  //            console.log(id);
  //           // $("input[name='nama_item']").val(nama)
  //           // $("input[name='kode']").val(id)
  //           //  $("input[name='harga_jual']").val(harga_jual)
  //            $('#ModalAddPembayaran').load("/load-modal-data-pembayaran/" + id);
  //            //$('#ModalAddPembayaran').css('overflow', 'auto');
  //           // $('#ModalAddPembayaran').modal({backdrop: 'static'});
  //       });

   $(document).off('click', '.addPayment');
       // $(document).off('click', '.loadmodaltransaksitindakancreate');
        $(document).on('click', '#addPayment', function (event) {
          event.preventDefault();
           var id = $(this).data('id');
             console.log(id);
          $("#addPayment").prop('disabled', true);
         //$('#ModalAddPembayaran').show();

          $('#ModalAddPembayaran').load("/load-modal-data-pembayaran/" + id);
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