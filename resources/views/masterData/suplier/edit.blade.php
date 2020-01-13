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
                <form action="{{url('/suplier/'.$data->id).'/update'}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-group-default">
                      <label>Kode suplier</label>
                      <input name="kode" type="text" class="form-control" placeholder="Kode suplier" value="{{$data->kode_suplier}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-default">
                      <label>Nama suplier</label>
                      <input name="nama_suplier" type="text" class="form-control" placeholder="Nama suplier" value="{{$data->nama_suplier}}" required>
                    </div>
                  </div>
                  
                <div class="col-md-6">
                  <div class="form-group form-group-default">
                    <label>Contak Person</label>
                    <input name="pic" type="text" class="form-control" placeholder="Contak Person" value="{{$data->pic}}" required>
                  </div>
                </div>
               
              
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>No Telp</label>
                <input name="no_telp" type="text" class="form-control" placeholder="No Telp" value="{{$data->no_telp}}" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Email</label>
                <input name="email" type="text" class="form-control" placeholder="Email" value="{{$data->email}}" required>
              </div>
            </div>
                  <div class="col-sm-12">
                    <div class="form-group form-group-default">
                      <label>alamat</label>
                      <input name="alamat" type="text" class="form-control" placeholder="alamat" value="{{$data->alamat}}">
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
                </div>
                </div>
            <div class="form-group">   
        <a href="/suplier"  class="btn btn-danger">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
              </div>
            </div>
        </div>
      </div>
</div>


@endsection