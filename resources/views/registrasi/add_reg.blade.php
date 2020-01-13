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
                <a href="{{url('/registrasi')}}">Registrasi</a>
              </li>
              <li class="separator">
                <i class="flaticon-right-arrow"></i>
              </li>
              <li class="nav-item">
                <a href="{{url('/registrasi')}}">{{$subtitle}}</a>
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
                <form action="{{url('/registrasi/create')}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
                <div class="form-group">
                <label for="exampleInputEmail1">No Regs</label>
                <input type="text" class="form-control" id="kode"  name="kode" placeholder="Kode" value=" {{$noreg}}" readonly="readonly">
                 </div>
                 <div class="form-group">
                 <label for="exampleInputEmail1">dokter</label>
                 <select class="form-control select" style="min-width:350px;" required id="idDokter" name="dokter_id">
                          <option></option>         
                             @foreach($d as $a)
                              
                               <option value='{{$a->id}}' >{{$a->nama_dokter}}</option> 
                             @endforeach
                  </select> 
                  </div>
                  <div class="form-group">
                  <label for="exampleInputEmail1">Pilih Poli</label>
                  <select class="form-control select" name="poli_id" id="idPoli">
                              <option></option>  
                              @foreach($pol as $a)
                              
                               <option value='{{$a->id}}' >{{$a->nama_poli}}</option> 
                             @endforeach
                  </select>
                  </div>    
                  <div class="form-group">
                  <label for="exampleInputEmail1">Keterangan</label>
                  <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="5"></textarea>
                  </div>
                  <div class="form-group">  
                  <input type="hidden" name="pasien_id" value="{{$p->id}}"> 
                <a href="{{url('/registrasi')}}"  class="btn btn-danger">Close</a>
                <button type="submit" class="btn btn-primary">Save Reg</button>
                </div>
                </form>
                </div>
            <div class="col-md-12">
              <div class="card">
                <div class="card-header">
                  <div class="d-flex align-items-center">
                  <h4 class="card-title">{{$subtitle}}</h4>
                  
                </div>
                </div>
               <form action="{{url('/pasien/'.$p->id.'/update')}}" method="POST" enctype="multipart/form-data">
            {{csrf_field()}}
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Pasien</label>
          <input type="text" class="form-control" id="namaDepan"  placeholder="Nama Lengkap" value="{{$p->nama}}" required="required" readonly="readonly">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Tempat Lahir</label>
          <input type="text" class="form-control"  id="nama_belakang" aria-describedby="emailHelp" value="{{$p->tempat_lahir}}" placeholder="Tempat Lahir"  required="required" readonly="readonly">
              </div>
              <div class="form-group">
          <label for="exampleInputEmail1">Tanggal Lahir</label>
          
          <input type="text" 
             class="datepicker-here form-control" 
             data-language='en'
             data-position="top left"
             value="{{$p->tgl_lahir}}"
             required="required"
             readonly="readonly"
             />

            </div> 
            <div class="form-group">
            <label for="exampleFormControlSelect1">Identitas</label>
            <select name="identitas" class="form-control" id="exampleFormControlSelect1"  required="required" readonly="readonly">
                           @if($p->identitas=="KTP")
                          <option value="KTP" selected="selected">KTP</option>
                          @else
                          <option value="KTP">KTP</option>
                          @endif
                           @if($p->identitas=="KITAS")
                          <option value="KITAS" selected="selected">KITAS</option>
                          @else
                          <option value="KITAS">KITAS</option>
                          @endif

                           @if($p->identitas=="PASSPORT")
                          <option value="PASSPORT" selected="selected">PASSPORT</option>
                          @else
                          <option value="PASSPORT">PASSPORT</option>
                          @endif

                        </select>
                      </div>
         <div class="form-group">
          <label for="exampleInputEmail1">No Identitas</label>
          <input type="text" class="form-control" id="no_identitas" name="no_identitas"aria-describedby="emailHelp" value="{{$p->no_identitas}}" placeholder="no_identitas"  required="required" readonly="readonly">
        </div>

        <div class="form-group">
                        <label for="exampleFormControlSelect1">Pendidikan</label>
                        <select name="pendidikan" class="form-control" id="exampleFormControlSelect1" required="required" readonly="readonly">
                          @if($p->pendidikan=="SD")
                          <option value="SD" selected="selected">SD</option>
                          @else
                          <option value="SD">SD</option>
                          @endif

                          @if($p->pendidikan=="SMP")
                          <option value="SMP" selected="selected">SMP</option>
                          @else
                          <option value="SMP">SMP</option>
                          @endif

                          @if($p->pendidikan=="SMA")
                          <option value="SMA" selected="selected">SMA</option>
                          @else
                          <option value="SMA">SMA</option>
                          @endif

                          @if($p->pendidikan=="S1")
                          <option value="S1" selected="selected">S1</option>
                          @else
                          <option value="S1">S1</option>
                          @endif

                          @if($p->pendidikan=="S2")
                          <option value="S2" selected="selected">S2</option>
                          @else
                          <option value="S2">S2</option>
                          @endif

                          @if($p->pendidikan=="S3")
                          <option value="S3" selected="selected">S3</option>
                          @else
                          <option value="S3">S3</option>
                          @endif

                          @if($p->pendidikan=="LAINYA")
                          <option value="LAINYA" selected="selected">LAINYA</option>
                          @else
                          <option value="LAINYA">LAINYA</option>
                          @endif

                        </select>
                      </div>


         <div class="form-group">
          <label for="exampleInputEmail1">pekerjaan</label>
          <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"aria-describedby="emailHelp" value="{{$p->pekerjaan}}" placeholder="pekerjaan" required="required" readonly="readonly">
        </div>
         <div class="form-group">
          <label for="exampleInputEmail1">no telp</label>
          <input type="text" class="form-control" id="no_telp" name="no_telp"aria-describedby="emailHelp" placeholder="no_telp" value="{{$p->no_telp}}" required="required" readonly="readonly">
        </div>

        <div class="form-group">
          <label for="exampleFormControlTextarea1">Alamat</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"  required="required" readonly="readonly">{{$p->alamat}}</textarea>
              </div>
        
       <!--   <div class="form-group">   
        <a href="{{url('/registrasi')}}"  class="btn btn-danger">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div> -->
              
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

$('#idDokter').select2({placeholder: "Pilih Dokter...", width: '100%'});
$('#idPoli').select2({placeholder: "Pilih Poli...", width: '100%'});
</script>
@endsection
