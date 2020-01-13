@extends('layout.master')
@section('content')
<section class="content-header">
      <h1>
        Data user
        <small>it all starts here</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Examples</a></li>
        <li class="active">Blank page</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Title</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
         
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          	@if(session('sukses'))
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
		</div>
		@endif
		<div class="row">
			<div class="col-6">
			<h1>Hallo siswa</h1>
		    </div>
		    <div class="col-6 text-right" >
		    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
  				Add Siswa
				</button>
		    </div>
	<table class="table table-bordered">
		<tr><th>Nama Depan</th>
		<th>Nama Belakang</th>
		<th>Jenis Kelamin</th>
		<th>Agama</th>
		<th>Alamat</th>
		<th>Aksi</th>
		</tr>
		@foreach($data_siswa as $k)
		<tr>
		<td>{{$k->nama_depan}}</td>
		<td>{{$k->nama_belakang}}</td>
		<td>{{$k->jenis_kelamin}}</td>
		<td>{{$k->agama}}</td>
		<td>{{$k->alamat}}</td>
		<td><a href="/siswa/{{$k->id}}/edit" class="btn btn-warning btn-sm">Update</a></td>
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
        <form action="/siswa/create" method="POST">
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
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
@endsection