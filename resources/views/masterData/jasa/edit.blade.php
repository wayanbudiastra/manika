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
             
                <form action="{{url('/jasa/'.$data->id).'/update'}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
                <div class="row">
                  <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Kode Item</label>
                                  <input name="kode" type="text" class="form-control" placeholder="Kode Item" value="{{$data->kode}}" readonly="readonly">
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                  <label>Nama Jasa/Tindakan</label>
                                  <input name="nama_jasa" type="text" class="form-control" placeholder="Nama Jasa/Tindakan" value="{{$data->nama_jasa}}" required>
                                </div>
                              </div>
                              <div class="col-md-6">
                                <div class="form-group form-group-default">
                                    <label>Katagori</label>
                                    <select class="form-control" name="jasakatagori_id" required>
                                        <option value="0">-</option>
                                        @foreach($jasakatagori as $row)
                                          @if($row->id==$data->jasakatagori_id)
                                            <option value="{{$row->id}}" selected>{{$row->nama_jasakatagori}}</option>
                                          @else
                                            <option value="{{$row->id}}">{{$row->nama_jasakatagori}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                           
                            
                       
                        <div class="col-md-6">
                          <div class="form-group form-group-default">
                            <label>Harga Jual</label>
                            <input name="harga_jual" type="text" class="form-control" placeholder="Harga Jual" value="{{$data->harga_jual}}" required>
                          </div>
                        </div>
                              <div class="col-sm-12">
                                <div class="form-group form-group-default">
                                  <label>keterangan</label>
                                  <input name="keterangan" type="text" class="form-control" value="{{$data->keterangan}}" placeholder="keterangan">
                                </div>
                              </div>
    
                            <div class="col-md-6">
                              <div class="form-group form-group-default">
                                <label>Fee Dokter</label>
                                <input name="fee_dokter" type="text" class="form-control" value="{{$data->fee_dokter}}" placeholder="Fee Dokter" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group form-group-default">
                                <label>Fee Asisten</label>
                                <input name="fee_asisten" type="text" class="form-control" value="{{$data->fee_asisten}}" placeholder="Fee Asisten">
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
        <a href="/jasa"  class="btn btn-danger">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
              </div>
            </div>
        </div>
      </div>
</div>


@endsection