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
                <form action="{{url('/lokasi/'.$data->id.'/update')}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
			  
			   <div class="form-group">
			    <label for="exampleInputEmail1">Nama Lokasi</label>
			    <input type="text" class="form-control" name="nm_lokasi" id="nama" aria-describedby="emailHelp" placeholder="Nama Lokasi" value="{{$data->nm_lokasi}}">
                </div>
              
              <div class="form-group">
                <label for="exampleInputEmail1">Keterangan</label>
                <textarea name="keterangan" class="form-control" id="keterangan" cols="30" rows="10">{{$data->keterangan}}</textarea>
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