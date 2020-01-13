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
                </div>
                </div>
                
                <div class="col-md-10">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-group-default">
                      <label>Kode suplier</label>
                      <input name="kode" type="text" class="form-control" placeholder="Kode suplier" value="{{$data->kode_suplier}}" readonly>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-default">
                      <label>Nama suplier</label>
                      <input name="nama_suplier" type="text" class="form-control" placeholder="Nama suplier" value="{{$data->nama_suplier}}" readonly>
                    </div>
                  </div>
                  
                <div class="col-md-6">
                  <div class="form-group form-group-default">
                    <label>Contak Person</label>
                    <input name="pic" type="text" class="form-control" placeholder="Contak Person" value="{{$data->pic}}" readonly>
                  </div>
                </div>
               
              
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>No Telp</label>
                <input name="no_telp" type="text" class="form-control" placeholder="No Telp" value="{{$data->no_telp}}" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email" value="{{$data->email}}" readonly>
              </div>
            </div>
                  <div class="col-sm-6">
                    <div class="form-group form-group-default">
                      <label>alamat</label>
                      <input name="alamat" type="text" class="form-control" placeholder="alamat" value="{{$data->alamat}}" readonly>
                    </div>
                  </div>
                </div>
                </div>
            <div class="form-group">   
        <a href="/suplier_maping"  class="btn btn-danger btn-round ml-auto">Kembali</a>
        <button class="btn btn-primary btn-round ml-auto" data-toggle="modal"
                                            data-target="#addRowModal1">
                                        <i class="fa fa-plus"></i>
                        Add Produk
        </button> 
        </div>
        
              </div>
            </div>
        </div>
      </div>
</div>


<div class="modal fade" id="addRowModal1" tabindex="-1" role="dialog" aria-hidden="true">
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
       
        <form action="{{url('/suplier_maping/store')}}" method="POST"enctype="multipart/form-data">
           {{csrf_field()}}
          <div class="row">
            <div class="col-md-12 pr-0">
              <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Item / Produk</label>
                  <select class="form-control select" name="produk_item_id" id="idPoli">
                              <option></option>  
                              @foreach($produk as $a)
                               <option value='{{$a['id']}}' >{{$a['nama_item']}}</option> 
                             @endforeach
                  </select>
                  </div>    


            </div>
          </div>
       
      </div>
      <div class="modal-footer no-bd">
      <input type="hidden" value="{{$data->id}}" name="suplier_id">
        <button type="submit" class="btn btn-primary">Add Maping</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
      </div>
    </div>
     </form>

     <div class="table-responsive" id="reloadpaginate">
                            @include('masterData.produkitem_suplier_maping.paginate')
                        </div>
  </div>
</div>

@endsection

@section('js')
<script type="text/javascript">

// var link_url ="{{url('/suplier_maping')}}";

// 	function savemapping(){
//       $.ajax({
//          url: link_url,
//          type: "POST",
//          data:$('#formData').serialize(),
//          dataType: "JSON",
//           success: function(data){
//             window.location.href= link_url;
//           },
//           error : function(jqXHR, textStatus, errorThrown){
//             alert('error save data');
//             //location.reload();
//            // console.log(link_url);
//           }
//         });
//      }



$(".date").datepicker({
  autoclose: true,
  locale: 'no',
  format: 'yyyy-mm-dd',
})


$('#idPoli').select2({placeholder: "Pilih Item...", width: '100%'});
</script>
@endsection
