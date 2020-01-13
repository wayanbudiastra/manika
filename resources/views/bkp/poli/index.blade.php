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
		<div class="alert alert-success" role="alert">
			{{session('sukses')}}
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
		
        <th>Nama Lokasi</th>
        <th>Nama Poli</th>
        <th>Keterangan</th>
		<th>Aksi</th>
		</tr>
	
		@foreach($data as $k)
		<tr>
		<td>{{$no=$no+1}}</td>
        <td>{{$k->lokasi->nm_lokasi}}</td>
        <td>{{$k->nm_poli}}</td>   
        <td>{{$k->keterangan}}</td>   
		<td><center><a href="{{url('/poli/'.$k->id.'/edit')}}" class="btn btn-warning btn-xs">Update</a></center></td>
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
        <h5 class="modal-title" id="exampleModalLabel">Add Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{url('/poli/create')}}" method="POST">
        	  {{csrf_field()}}
		<div class="form-group">
          <select class="form-control select2" style="min-width:350px;" required id="idPraktek" name="lokasi_id">
                          <option></option>
                           <?php
                           
                             foreach($lokasi as $a){
                              $idtype = $a['id'];
                              $type = $a['nm_lokasi'];
                               echo "<option value='$idtype'>$type</option>";
                              }
                           
                          ?>
            </select> 
      </div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Nama Poli/Ruangan</label>
		  <input type="text" class="form-control" name="nm_poli" id="nama" aria-describedby="emailHelp" placeholder="Nama Poli/Ruangan">
		</div>
        <div class="form-group">
          <label for="exampleInputEmail1">Keterangan</label>
          <textarea name="keterangan" class="form-control" id="alamat" cols="30" rows="7"></textarea>
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