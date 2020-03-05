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
                            <form action="{{url('terapis/'.Crypt::encrypt($data->id).'/update')}}" class="form" method="POST" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="card-body">
                                    <div class="col-md-10">
                                        <div class="form-group form-group-default">
                                            <label>NIK</label>
                                            <input name="nik" type="text" class="form-control" value="{{$data->nik}}" placeholder="NIK">
                                        </div>
                                        <div class="form-group form-group-default">
                                            <label>Nama Terapis</label>
                                            <input name="nama_terapis" type="text" class="form-control" placeholder="Nama Terapis" value="{{$data->nama_terapis}}">
                                        </div>
                                        <div class="form-group form-group-default">
                                            <label>Email Terapis</label>
                                            <input name="email" type="email" class="form-control" placeholder="Email Terapis" value="{{$data->email}}" readonly>
                                        </div>
                                        <div class="form-group form-group-default">
                                            <label>Telepon</label>
                                            <input name="no_telp" type="text" class="form-control" placeholder="Nomer Telepon" value="{{$data->no_telp}}">
                                        </div>
                                        <div class="form-group form-group-default">
                                            <label>Alamat Dokter</label>
                                            <input name="alamat" type="text" class="form-control" placeholder="Alamat Dokter" value="{{$data->alamat}}">
                                        </div>
                                        <div class="form-group form-group-default">
                                            <label>Tanggal Lahir</label>
                                            <input name="tgl_lahir" type="date" class="form-control" placeholder="Tanggal Lahir" value="{{$data->tgl_lahir}}">
                                        </div>
                                        <div class="form-group form-group-default">
                                            <label>Tempat Lahir</label>
                                            <input name="tempat_lahir" type="text" class="form-control" placeholder="Tempat Lahir" value="{{$data->tempat_lahir}}">
                                        </div>
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
                                <div class="card-footer">
                                    <div class="form-group">
                                        <a href="/terapis" class="btn btn-danger">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection