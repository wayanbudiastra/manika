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
                <form action="{{url('/satuankecil/'.$data->id).'/update'}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
                    <div class="col-md-6">
                        <div class="form-group form-group-default">
                            <label>Nama Satuan Kecil</label>
                            <input name="nama_satuan_kecil" type="text" class="form-control"
                                   placeholder="Nama Satuan Kecil" value="{{$data->nama_satuan_kecil}}">
                        </div>
                    </div>
                    <div class="col-sm-12">
                        <div class="form-group form-group-default">
                            <label>Keterangan</label>
                            <textarea name="keterangan"  class="form-control" placeholder="Keterangan" rows="3">{!! $data->keterangan !!}</textarea>
                        </div>
                    </div>
                    <div class="col-sm-12">
                        @php
                        if($data->aktif == "Y"){
                        $aktif = "checked";
                        $aktif2 = "";
                        }
                        else{
                        $aktif = "";
                        $aktif2 = "checked";

                        }
                        @endphp
                        <div class="form-group form-group-default">
                            <label>Aktif</label>
                            <label class="radio-inline"><input type="radio" name="aktif" {!! $aktif !!} value="Y"> Ya</label>
                            <label class="radio-inline"><input type="radio" name="aktif" {!! $aktif2 !!} value="N"> Tidak</label>
                        </div>
                    </div>

            <div class="form-group">   
        <a href="/satuankecil"  class="btn btn-danger">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
              </div>
            </div>
        </div>
      </div>
</div>


@endsection