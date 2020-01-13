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
                <form action="{{url('/faskes/'.$data->id.'/update')}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
        <div class="form-group">
          <label for="exampleInputEmail1">Kode</label>
          <input type="text" class="form-control" id="kode"  name="kode" placeholder="Kode" value="{{$data->kode}}">
         </div>
         <div class="form-group">
          <label for="exampleInputEmail1">Nama Faskes</label>
          <input type="text" class="form-control" name="nm_faskes" id="nama" aria-describedby="emailHelp" placeholder="Nama Rujukan" value="{{$data->nm_faskes}}">
                </div>
                <div class="form-group">
          <label for="exampleInputEmail1">Email</label>
          <input type="text" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="Email" value="{{$data->email}}">
              </div>
              <div class="form-group">
          <label for="exampleInputEmail1">No Telp</label>
          <input type="text" class="form-control" id="no_hp" name="no_hp"aria-describedby="emailHelp" placeholder="No Hp" value="{{$data->no_hp}}">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10">{{$data->alamat}}</textarea>
        </div>

            <div class="form-group">   
        <a href="/rujukan"  class="btn btn-danger">Close</a>
        <button type="submint" class="btn btn-primary">Save changes</button>
        </div>
        </form>
              </div>
            </div>
        </div>
      </div>
</div>


@endsection