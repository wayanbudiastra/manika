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
               <form action="{{url('/pasien/do_create')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Pasien</label>
          <input type="text" class="form-control" id="namaDepan" value="" name="nama" placeholder="Nama Lengkap"  required="required">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir" value="" id="nama_belakang" aria-describedby="emailHelp" placeholder="Tempat Lahir"  required="required">
              </div>
              <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
          
          <input type="text" 
             class="datepicker-here form-control date" 
             data-language='en'
             name="tgl_lahir"
             data-position="top left"
             required="required"
             />

            </div> 
        <div class="form-group">
                        <label for="exampleFormControlSelect1">Identitas</label>
                        <select name="identitas" class="form-control" id="exampleFormControlSelect1"  required="required">
                          <option value="KTP">KTP</option>
                          <option value="KITAS">KITAS</option>
                          <option value="PASSPORT">PASSPORT</option>
                        </select>
                      </div>
         <div class="form-group">
          <label for="exampleInputEmail1">No Identitas</label>
          <input type="text" class="form-control" id="no_identitas" name="no_identitas"aria-describedby="emailHelp" value=""placeholder="no_identitas"  required="required">
        </div>

        <div class="form-group">
                        <label for="exampleFormControlSelect1">Pendidikan</label>
                        <select name="pendidikan" class="form-control" id="exampleFormControlSelect1" required="required">
                          <option value="SD">SD</option>
                          <option value="SMP">SMP</option>
                          <option value="SMA">SMA</option>
                          <option value="S1">S1</option>
                          <option value="S2">S2</option>
                          <option value="S3">S3</option>
                          <option value="LAINYA">LAINYA</option>
                        </select>
                      </div>


         <div class="form-group">
          <label for="exampleInputEmail1">pekerjaan</label>
          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"aria-describedby="emailHelp" value=""placeholder="pekerjaan" required="required">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">no telp</label>
          <input type="text" class="form-control" id="no_telp" name="no_telp"aria-describedby="emailHelp" value=""placeholder="no_telp"  required="required">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"  required="required"></textarea>
              </div>
        
         <div class="form-group">   
        <a href="{{url('/pasien')}}"  class="btn btn-danger">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
              
        </form>
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
</script>
@endsection

