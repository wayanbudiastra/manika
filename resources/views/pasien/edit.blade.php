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
               <form action="{{url('/pasien/'.$data->id.'/update')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Pasien</label>
          <input type="text" class="form-control" id="namaDepan"  name="nama" placeholder="Nama Lengkap" value="{{$data->nama}}" required="required">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Tempat Lahir</label>
          <input type="text" class="form-control" name="tempat_lahir"  id="nama_belakang" aria-describedby="emailHelp" value="{{$data->tempat_lahir}}" placeholder="Tempat Lahir"  required="required">
              </div>
              <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
          
          <input type="text" 
             class="datepicker-here form-control" 
             data-language='en'
             name="tgl_lahir"
             data-position="top left"
             value="{{$data->tgl_lahir}}"
             required="required"
             />

            </div> 
        <div class="form-group">
                        <label for="exampleFormControlSelect1">Identitas</label>
                        <select name="identitas" class="form-control" id="exampleFormControlSelect1"  required="required">
                           @if($data->identitas=="KTP")
                          <option value="KTP" selected="selected">KTP</option>
                          @else
                          <option value="KTP">KTP</option>
                          @endif
                           @if($data->identitas=="KITAS")
                          <option value="KITAS" selected="selected">KITAS</option>
                          @else
                          <option value="KITAS">KITAS</option>
                          @endif

                           @if($data->identitas=="PASSPORT")
                          <option value="PASSPORT" selected="selected">PASSPORT</option>
                          @else
                          <option value="PASSPORT">PASSPORT</option>
                          @endif

                        </select>
                      </div>
         <div class="form-group">
          <label for="exampleInputEmail1">No Identitas</label>
          <input type="text" class="form-control" id="no_identitas" name="no_identitas"aria-describedby="emailHelp" value="{{$data->no_identitas}}" placeholder="no_identitas"  required="required">
        </div>

        <div class="form-group">
                        <label for="exampleFormControlSelect1">Pendidikan</label>
                        <select name="pendidikan" class="form-control" id="exampleFormControlSelect1" required="required">
                          @if($data->pendidikan=="SD")
                          <option value="SD" selected="selected">SD</option>
                          @else
                          <option value="SD">SD</option>
                          @endif

                          @if($data->pendidikan=="SMP")
                          <option value="SMP" selected="selected">SMP</option>
                          @else
                          <option value="SMP">SMP</option>
                          @endif

                          @if($data->pendidikan=="SMA")
                          <option value="SMA" selected="selected">SMA</option>
                          @else
                          <option value="SMA">SMA</option>
                          @endif

                          @if($data->pendidikan=="S1")
                          <option value="S1" selected="selected">S1</option>
                          @else
                          <option value="S1">S1</option>
                          @endif

                          @if($data->pendidikan=="S2")
                          <option value="S2" selected="selected">S2</option>
                          @else
                          <option value="S2">S2</option>
                          @endif

                          @if($data->pendidikan=="S3")
                          <option value="S3" selected="selected">S3</option>
                          @else
                          <option value="S3">S3</option>
                          @endif

                          @if($data->pendidikan=="LAINYA")
                          <option value="LAINYA" selected="selected">LAINYA</option>
                          @else
                          <option value="LAINYA">LAINYA</option>
                          @endif

                        </select>
                      </div>


         <div class="form-group">
          <label for="exampleInputEmail1">pekerjaan</label>
          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"aria-describedby="emailHelp" value="{{$data->pekerjaan}}" placeholder="pekerjaan" required="required">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">no telp</label>
          <input type="text" class="form-control" id="no_telp" name="no_telp"aria-describedby="emailHelp" placeholder="no_telp" value="{{$data->no_telp}}" required="required">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"  required="required">{{$data->alamat}}</textarea>
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
