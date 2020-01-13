@extends('layout.master')
@section('content')
<section class="content-header">
      <h1>
       {{$title}}
        
      </h1>
    
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">{{$subtitle}}</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         	@if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
		@endif
		<div class="row">
			 <div class="col-md-12">
				  <div class="col-md-6">
				 <form action="{{url('/pasien/cari')}}" method="GET">
				<input type="text" class="form-control" name="cari" placeholder="Cari Nama Pasien .." value="{{ old('cari') }}">
				<input type="hidden" class="btn btn-success btn-sm" value="CARI">
				</form>
				  </div>
				 <div class="col-md-6">
					
				 </div>
				 <div class="row">
				 <div class="col-md-6 text-right">
		    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
  				Add Pasien
				</button>
				</div>
				</div>
		   
	<table id="dataTableDashboard1" class="table table-bordered table-striped">
		<tr>
		<th>No</th>
		<th>No CM</th>
		<th>Nama Lengkap</th>
		<th>Tempat Lahir</th>
		<th width="10%">Tgl Lahir</th>
		<th>Usia</th>
		<th>Alamat</th>
		<th>Aksi</th>
		</tr>
	
		@foreach($data as $k)
		<?php $id = Crypt::encrypt($k->id); ?>
		<tr>
		<td>{{$no=$no+1}}</td>
		<td>{{$k->nocm}}</a></td>
		<td>{{$k->nama}}</a></td>
		<td>{{$k->tempat_lahir}}</td>
		<td>{{tgl_indo($k->tgl_lahir)}}</td>
		<td>{{hitung_usia($k->tgl_lahir)}}</td>
		<td>{{$k->alamat}}</td>
		<td><a href="{{url('/pasien/'.$id.'/edit')}}" class="btn btn-warning btn-xs">Update</a></td>
		</tr>
	
		@endforeach
		</table>
		
		</div>
	<!-- </div> -->
<!--Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/siswa/create')}}" method="POST">
        	  {{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama Depan</label>
			    <input type="text" class="form-control" id="namaDepan"  name="nama_depan" placeholder="Nama Depan">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Nama Belakang</label>
			    <input type="text" class="form-control" name="nama_belakang"id="nama_belakang" aria-describedby="emailHelp" placeholder="Nama Belakang">
			  </div>
			  
			  <div class="custom-control custom-radio">
			  <input type="radio" id="customRadio1" name="jenis_kelamin" value="L" class="custom-control-input">
			  <label class="custom-control-label" for="customRadio1">Laki-laki</label>
			</div>
			<div class="custom-control custom-radio">
			  <input type="radio" id="customRadio2" name="jenis_kelamin" value="P"name="customRadio" class="custom-control-input">
			  <label class="custom-control-label" for="customRadio2">Perempuan</label>
			</div>
				<div class="form-group">
			    <label for="exampleInputEmail1">email</label>
			    <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="email">
			  </div>
			<div class="form-group">
			    <label for="exampleInputEmail1">Agama</label>
			    <input type="text" class="form-control" id="agama" name="agama"aria-describedby="emailHelp" placeholder="Agama">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Alamat</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
			  </div>
			
           </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submint" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
        </div>
        <!-- /.box-footer-->
			</div>
</div>
      <!-- /.box -->

    </section>
@endsection