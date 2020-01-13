@extends('layout.master')
@section('content')
<section class="content-header">
      <h1>
       {{$title}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{url('/dashboard')}}"><i class="fa fa-dashboard"></i> Home</a></li>
        
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
		<div class="alert alert-success">
			{{session('sukses')}}
		</div>
    @endif
    	@if(session('gagal'))
		<div class="alert alert-danger">
			{{session('gagal')}}
		</div>
		@endif
		<div class="row">
			 <div class="col-md-12">
				 <div class="col-md-6">
					
                 </div>
                 <div class="row">
				 <div class="col-md-6 text-right">
		    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
  				Add
				</button>
                </div>
                </div>
		   
	<table id="dataTableDashboard1" class="table table-bordered table-striped">
		<tr>
		<th>No</th>
		<th>Nik</th>
    <th>Nama Karyawan</th>
    <th>Tgl Lahir</th>
    <th>Usia</th>  
    <th>Email</th>
		<th>Aksi</th>
		</tr>
	
		@foreach($data as $k)
		<tr>
		<td>{{$no=$no+1}}</td>
		<td>{{$k->nik}}</td>
		<td>{{$k->nama}}</td>
    <td>{{$k->tgl_lahir}}</td>
    <td>{{$k->tgl_lahir}}</td>
    <td>{{$k->email}}</td>
		<td><center><a href="{{url('/karyawan/'.$k->id.'/edit')}}" class="btn btn-warning btn-xs">Update</a></center></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/karyawan')}}" method="POST">
        	  {{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nik</label>
			    <input type="text" class="form-control" id="nik"  name="nik" placeholder="Kode">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Nama</label>
			    <input type="text" class="form-control" name="nama" id="nama" aria-describedby="emailHelp" placeholder="Nama Faskes">
			  </div>
			  
				<div class="form-group">
			    <label for="exampleInputEmail1">Tempat Lahir</label>
			    <input type="text" class="form-control" id="tmp_lahir" name="tmp_lahir"aria-describedby="emailHelp" placeholder="No Hp">
              </div>
              <div class="form-group">
			    <label for="exampleInputEmail1">No Telp</label>
			    <input type="text" class="form-control" id="no_hp" name="no_hp"aria-describedby="emailHelp" placeholder="No Hp">
              </div>
              <div class="form-group">
                <label for="exampleInputEmail1">Alamat</label>
                <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10"></textarea>
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