@extends('layout.master')
@section('content')
<section class="content-header">
      <h1>
       {{$title}}
        
      </h1>
      <ol class="breadcrumb">
        <li><a href="/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>
        
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
        <!-- closing coll-->
                </div>
     
		   
	
		</div>
	<!-- </div> -->
<!--Modal -->

      <!-- /.box -->

    </section>
@endsection