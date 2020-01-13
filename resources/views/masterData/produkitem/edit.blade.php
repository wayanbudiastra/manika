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
                {!!Form::open(['url'=>'/produkitem/'.$data->id.'/update'])!!}
                <form action="{{url('/produkitem/'.$data->id).'/update'}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group form-group-default">
                      <label>Kode Item</label>
                      <input name="kode" type="text" class="form-control" placeholder="Kode Item" value="{{$data->kode_item}}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-default">
                      <label>Nama Item</label>
                      <input name="nama_item" type="text" class="form-control" placeholder="Nama Item" value="{{$data->nama_item}}" required>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group form-group-default">
                        <label>Katagori</label>
                        <select class="form-control" name="katagori_item_id" required>
                            <option value="0">-</option>
                            @foreach($produkkatagori as $row)
                                @if($row['id'] == $data->katagori_item_id)
                                  <option value="{{$row['id']}}" selected>{{$row['nama_produk_katagori']}}</option>
                                @else
                                  <option value="{{$row['id']}}">{{$row['nama_produk_katagori']}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default">
                    <label>Isi</label>
                    <input name="isi_satuan" type="text" class="form-control" placeholder="Isi" value="{{$data->isi_satuan}}" required>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default">
                      <label>Satuan Besar</label>
                      <select class="form-control" name="satuan_besar_id" required>
                          <option value="0">-</option>
                          @foreach($satuanbesar as $row)
                          @if($row['id'] == $data->satuan_besar_id)
                              <option value="{{$row['id']}}" selected>{{$row['nama_satuan_besar']}}</option>
                          @else
                              <option value="{{$row['id']}}">{{$row['nama_satuan_besar']}}</option>
                           @endif
                              
                          @endforeach
                      </select>
                  </div>
              </div>
              <div class="col-md-6">
                <div class="form-group form-group-default">
                    <label>Satuan Kecil</label>
                    <select class="form-control" name="satuan_kecil_id" required>
                        <option value="0">-</option>
                        @foreach($satuankecil as $row)
                              @if($row['id'] == $data->satuan_kecil_id)
                                   <option value="{{$row['id']}}" selected>{{$row['nama_satuan_kecil']}}</option>
                              @else
                                  <option value="{{$row['id']}}">{{$row['nama_satuan_kecil']}}</option>
                              @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Harga Beli</label>
                <input name="harga_beli" type="text" class="form-control" placeholder="Harga Beli" value="{{$data->harga_beli}}" required>
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
                      <input name="keterangan" type="text" class="form-control" placeholder="keterangan" value="{{$data->keterangan}}">
                    </div>
                  </div>

                <div class="col-md-6">
                  <div class="form-group form-group-default">
                    <label>Fee Dokter</label>
                    <input name="fee_dokter" type="text" class="form-control" placeholder="Fee Dokter" value="{{$data->fee_dokter}}" >
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group form-group-default">
                    <label>Fee Asisten</label>
                    <input name="fee_asisten" type="text" class="form-control" placeholder="Fee Asisten" value="{{$data->fee_asisten}}">
                  </div>
                </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Stok Min</label>
                <input name="stok_min" type="text" class="form-control" placeholder="Stok Min" value="{{$data->stok_min}}">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group form-group-default">
                <label>Stok Max</label>
                <input name="stok_max" type="text" class="form-control" placeholder="Stok Max" value="{{$data->stok_max}}">
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
                
                {!! Form::label('produk_suplier','Mapping Suplier',['class'=> 'control-label'])!!}
                <hr>
                  @if(count($list_suplier) > 0)
                      @foreach($list_suplier as $k => $value)
                         <div class="col-sm-4">
                        <div class="checkbox">
                          <input type="checkbox" name="produk_suplier[]" value="{{$k}}" {{in_array($k,$maping)? "checked":""}}>{{$value}}
                        </div>
                       </div>
                      @endforeach
                  @endif
                 <hr>
                </div>
            <div class="form-group">   
        <a href="/produkitem"  class="btn btn-danger">Close</a>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
        </form>
        {!! Form::close()!!}
              </div>
            </div>
        </div>
      </div>
</div>


@endsection