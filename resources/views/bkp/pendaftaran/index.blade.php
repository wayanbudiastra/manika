@extends('layout.master')
@section('content')
<section class="content-header">
      <h1>
       {{$title}}
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/pendaftaran')}}"><i class="fa fa-dashboard"></i>Home</a></li>
      </ol>
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

			@if(session('error'))
		<div class="alert alert-danger" role="alert">
			{{session('error')}}
		</div>
		@endif
		<div class="row">
			 <div class="col-md-12">
				 <div class="col-md-6">
					
				 </div>
				 <div class="col-md-6 text-right">
				 	<a href="{{url('/pendaftaran/daftarsiswa')}}" class="btn btn-primary btn-sm mb-3"><i class="fa fa-fa-plus"></i> Add Pendaftaran</a>
				</div>
		   
	<table id="dataTableDashboard1" class="table table-bordered table-striped">
		<tr>
		<th>No</th>
		<th>NoPendaftaran</th>
		<th>Nama Siswa</th>
		<th>Kelas</th>
		<th>Guru Utama</th>
		<th>Tanggal Daftar</th>
		<th>Keterangan</th>
		<th>Aksi</th>
		</tr>
	
		@foreach($data as $k)
		<tr>
		<td>{{$no=$no+1}}</td>
		<td>REG-{{$k->nodaftar}}</a></td>
		<td>{{$k->nama_depan }} {{$k->nama_belakang}}</a></td>
		<td>{{$k->nama_kelas}}</td>
		<td>{{$k->nama_gurud}}</td>
		<td>{{$k->created_at}}</td>
		<td>{{$k->catatan}}</td>
		<td><a href="{{url('/pendaftaran/{{$k->id}}/edit')}}" class="btn btn-warning btn-xs">Update</a></td>
		</tr>
	
		@endforeach
		</table>
		<center>{{ $data->links() }}</center>
		</div>
	<!-- </div> -->
<!--Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM pendaftaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="/pendaftaran/create" method="POST">
        	  {{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama pendaftaran</label>
			    <input type="text" class="form-control" id="nama_guru"  name="nama_guru" placeholder="Nama pendaftaran">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Nama pangilan</label>
			    <input type="text" class="form-control" name="panggilan"id="panggilan" aria-describedby="emailHelp" placeholder="Nama panggilan">
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
			    <label for="exampleInputEmail1">no HP</label>
			    <input type="text" class="form-control" id="nohp" name="nohp"aria-describedby="emailHelp" placeholder="no handphone">
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