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
                  <div class="table-responsive" id="reloadpaginate">
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


 $("#errMsgTindakan").prop('hidden', true);

$('.modal-pembayaran').on('click',function(){
  console.log($(this).data('id'));
  var id = $(this).data('id');

  let data ;
  $.ajax({
    url: '{!!  url('/'); !!}'+"/load-modal-data-pembayaran/" + id,
    success : m => {
      data = m.data;
      const detail = '';
      var editForm = $('#CreateDataPembayaran');
      editForm.find('input[name="total1"]').val(to_rupiah(m.total));
      editForm.find('input[name="total"]').val(m.total);
      editForm.find('input[name="no_registrasi"]').val(m.no_registrasi);
      editForm.find('input[name="pasien"]').val(m.pasien);
      editForm.find('input[name="dokter"]').val(m.dokter);
      editForm.find('input[name="poli"]').val(m.poli);
      editForm.find('input[name="terbilang"]').val(m.terbilang+' Rupiah');
      editForm.find('input[name="id"]').val(m.id);
      $('#pembayaran').val('');
      $('#pembayaran').focus();
      $('#kembali').val('');
      $('#kembali1').val('');
       document.getElementById('btnSimpan').innerHTML = '<button disabled style="cursor: not-allowed;" class="btn btn-success btn-round " id="simpanPembayaran"><i class="fa fa-plus"></i>Simpan</button>';

    }

  })
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

$(document).on('keyup', '#pembayaran', function(){
  HitungTotalKembalian();
});


$(document).on('click', '#simpanPembayaran', function(){
// console.log('bayar');
 $.ajax({
    url: '{!!  url('/'); !!}'+'/pembayaran-simpam-invoice',
    data: new FormData($("#CreateDataPembayaran")[0]),
    dataType: 'json',
    async: false,
    type: 'post',
    processData: false,
    contentType: false,
    success: function (response) {

                        $(".showloading").prop('disabled', true);
                        // $('.modal-pembayaran').modal('dismis');
                        location.reload();  
                        $.notify({
                            // options
                            message: 'Data Berhasil Di Simpan'
                        }, {
                            // settings
                            time: 5000,
                            type: 'success'
                        });
                   
                   //  console.log(response);   
                    // $('#reloadpaginate').html('');
                    // $('#ModalAddPembayaran').modal('hide');
                    // $('#reloadpaginate').load('{!!  url('/'); !!}'+"/pembayaran/show");
      },
      error: function (data) {
      $("#errMsg").prop('hidden', false);
                    // $(".messagebox").show();
      $(".showloading").prop('disabled', true);
      $("#modal_create_expedition").scrollTop(0);
      $('#ShowErrordata').html('');
      $('.messagebox').show().addClass('alert-danger');
          var messages = jQuery.parseJSON(data.responseText);
      $('#ShowErrordata').html(messages.message);
      }
    });
});

//simpan data


   


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


    function HitungTotalKembalian()
    {
     var Cash = $('#pembayaran').val();
     var TotalBayar = $('#total').val();
     var Selisih = 0; 
      if(parseInt(Cash) >= parseInt(TotalBayar)){
        Selisih = Cash - TotalBayar;
        $('#kembali1').val(to_rupiah(Selisih));
        $('#kembali').val(Selisih);
         document.getElementById('btnSimpan').innerHTML = '<button class="btn btn-success btn-round " id="simpanPembayaran"><i class="fa fa-plus"></i>Simpan</button>';

      } else {
        $('#kembali').val('');
      }
    
}

function to_rupiah(angka){
    var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
    var rev2    = '';
    for(var i = 0; i < rev.length; i++){
        rev2  += rev[i];
        if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
            rev2 += '.';
        }
    }
    return 'Rp. ' + rev2.split('').reverse().join('');
}


    </script>


@endsection