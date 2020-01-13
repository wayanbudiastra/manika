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
                <a href="{{url('/penerimaan')}}">Registrasi</a>
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
                <form action="{{url('/penerimaan/store')}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
                <div class="form-group">
                <label for="exampleInputEmail1">No Penerimaan</label>
                <input type="text" class="form-control" id="nomor_penerimaan"  name="nomor_penerimaan" placeholder=" nomor_penerimaan" value=" {{$nomor_penerimaan}}" readonly="readonly">
                 </div>

                <div class="form-group">
                <label for="exampleInputEmail1">No Referensi</label>
                <input type="text" class="form-control" id="nomor_penerimaan"  name="refensi" placeholder="No Referensi" value="-">
                </div>

                 <div class="form-group">
                 <label for="exampleInputEmail1">Suplier</label>
                 <select class="form-control select" style="min-width:350px;" requirer id="idDokter" name="suplier_id">
                          <option></option>         
                             @foreach($suplier as $a)
                              
                               <option value='{{$a->id}}' >{{$a->nama_suplier}}</option> 
                             @endforeach
                  </select> 
                  </div>
                   
                  <div class="form-group">
                  <label for="exampleInputEmail1">Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5"></textarea>
                  </div>
                  <div class="form-group">  
                 
                <a href="{{url('/penerimaan')}}"  class="btn btn-danger">Close</a>
                <button type="submit" class="btn btn-primary">Lanjutkan</button>
                </div>
                </form>
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

$('#idDokter').select2({placeholder: "Pilih Suplier...", width: '100%'});
$('#idPoli').select2({placeholder: "Pilih Poli...", width: '100%'});
</script>
@endsection
