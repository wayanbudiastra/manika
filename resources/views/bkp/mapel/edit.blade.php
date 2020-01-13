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
          <h3 class="box-title">Update mapel</h3>

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
		     <form action="/mapel/{{$mapel->id}}/do_edit" method="POST" enctype="multipart/form-data" >
        	  {{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">Kode</label>
			    <input type="text" class="form-control" id="namaDepan" value="{{$mapel->kode}}" name="kode" placeholder="Kode">
			  </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Nama Mapel</label>
			    <input type="text" class="form-control" name="nama" value="{{$mapel->nama}}"id="nama" aria-describedby="emailHelp" placeholder="Nama Belakang">
              </div>
              
                       

			<div class="form-group">
			    <label for="exampleInputEmail1">semester</label>
			    <input type="text" class="form-control" id="semester" name="semester"aria-describedby="emailHelp" value="{{$mapel->semester}}"placeholder="semester">
			  </div>
			
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