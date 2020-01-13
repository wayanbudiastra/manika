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
		
			
		    <div class="col-lg-8">
		     <form action="/pendaftaran/create" method="POST" enctype="multipart/form-data" >
        	  {{csrf_field()}}
			  <div class="form-group">
			    <label for="exampleInputEmail1">No Daftar</label>
			    <input type="text" class="form-control" id="nodaftar" value="{{$nodaftar}}" name="nodaftar" placeholder="No Pendaftaran">
			  </div>
			  <div class="form-group">
			    <label for="exampleInputEmail1">Pilih Siswa</label>
			    <select class="select2 form-control" style="min-width:350px;" required name="siswa_id" id="idSiswa">
                          <option></option>
                           @foreach($data_siswa as $k)
                             {
                               <option value='{{$k->id}}'>{{$k->nama_depan }} {{$k->nama_belakang}}</option>;
                              }
                          @endforeach
                          
                        </select>
        </div>
              
			   <div class="form-group">
			    <label for="exampleInputEmail1">Kelas</label>
          <select class="select2 form-control" style="min-width:350px;" required name="kelas_id" id="idKelas">
                          <option></option>
                           @foreach($datakelas as $i)
                             {
                               <option value='{{$i->id}}'>{{$i->nama_kelas }} </option>;
                              }
                          @endforeach
                          
                        </select>
			    
			  </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Guru Penanggung Jawab</label>
          <select class="select2 form-control" style="min-width:350px;" required name="guru_id" id="idGuru">
                          <option></option>
                           @foreach($dataguru as $j)
                             {
                               <option value='{{$j->id}}'>{{$j->nama_guru }}</option>;
                              }
                          @endforeach
                          
                        </select>
        </div>
			  <div class="form-group">
			    <label for="exampleFormControlTextarea1">Keterangan</label>
			    <textarea class="form-control" id="exampleFormControlTextarea1" name="catatan" rows="3"></textarea>
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