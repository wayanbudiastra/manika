@extends('layout.master')
@section('content')
<section class="content-header">
      <h1>
        Data Pasien
        
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
          <h3 class="box-title">Update Pasien</h3>

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
		
			
		    <div class="col-lg-8">
		     <form action="{{url('/pasien/do_create')}}" method="POST" enctype="multipart/form-data">
        	  {{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Nama Pasien</label>
			    <input type="text" class="form-control" id="namaDepan" value="" name="nama" placeholder="Nama Lengkap">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Tempat Lahir</label>
			    <input type="text" class="form-control" name="tempat_lahir" value="" id="nama_belakang" aria-describedby="emailHelp" placeholder="Tempat Lahir">
              </div>
              <div class="form-group">
			    <label for="exampleInputEmail1">Tanggal Lahir</label>
			    {{-- <input type="text" class="form-control" name="tgl_lahir" value="" id="date" data-date-format="dd/mm/yyyy" required>
             --}}
          <input type="text" 
             class="datepicker-here form-control" 
             data-language='en'
             name="tgl_lahir"
             data-position="top left"
             />

            </div> 
              
                     
			<div class="form-group">
			    <label for="exampleInputEmail1">pekerjaan</label>
			    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan"aria-describedby="emailHelp" value=""placeholder="pekerjaan">
			  </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Alamat</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" name="alamat" rows="3"></textarea>
              </div>
        <!-- <div class="form-group">
			    <label for="exampleInputEmail1">foto</label>
			    <input type="file" class="form-control" id="avatar" name="avatar" aria-describedby="emailHelp" placeholder="foto siswa">
			  </div> -->
              <button type="submint" class="btn btn-primary">Save changes</button>
        </form>
        </div>
        </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          Footer
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
@endsection