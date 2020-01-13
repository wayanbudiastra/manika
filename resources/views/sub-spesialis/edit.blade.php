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
                            <form action="{{url('/subspesialis/'.$data->id).'/update'}}" class="form" method="POST"
                                  enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-md-10">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Nama Spesialis</label>
                                            <select class="form-control" name="spesialis_id">
                                                <option value="">Pilih Nama Spesialis</option>
                                                @foreach($dataSpesialis as $row)
                                                    @if($row['id'] == $data->spesialis_id)
                                                        <option value="{{$row['id']}}" selected>{{$row['nama_spesialis']}}</option>
                                                    @else
                                                        <option value="{{$row['id']}}">{{$row['nama_spesialis']}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label>Nama Sub Spesialis</label>
                                            <input name="nama_spesialis" type="text" class="form-control"
                                                   placeholder="Nama Sub Spesialis" value="{{$data->nama_spesialis}}">
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="form-group form-group-default">
                                            <label>Keterangan</label>
                                            <textarea name="keterangan" class="form-control" placeholder="Keterangan"
                                                      rows="3">{!! $data->keterangan !!}</textarea>
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
                                            <label class="radio-inline"><input type="radio" name="aktif"
                                                                               {!! $aktif !!} value="Y"> Ya</label>
                                            <label class="radio-inline"><input type="radio" name="aktif"
                                                                               {!! $aktif2 !!} value="N"> Tidak</label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <a href="/subspesialis" class="btn btn-danger">Close</a>
                                        <button type="submit" class="btn btn-primary">Save changes</button>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


@endsection