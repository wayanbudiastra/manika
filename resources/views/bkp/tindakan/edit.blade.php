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
                <form action="{{url('/tindakan/'.$data->id.'/update')}}" class="form" method="POST" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="col-md-10">
			  <div class="form-group">
			    <label for="exampleInputEmail1">Kode</label>
               <input type="text" class="form-control" id="kode"  name="kode" placeholder="Kode" value="{{$data->kode}}">
			   </div>
			   <div class="form-group">
			    <label for="exampleInputEmail1">Nama Tindakan</label>
			    <input type="text" class="form-control" name="nm_tindakan" id="nama" aria-describedby="emailHelp" placeholder="Nama Rujukan" value="{{$data->nm_tindakan}}">
                </div>
                 <div class="form-group">
          <label for="exampleInputEmail1">Katagori Tindakan</label>
          <select class="select2 form-control" style="min-width:350px;" required name="katagoritindakan_id" id="idKelas">
                          <option></option>
                           @foreach($katagori as $i)
                             {
                              <?php $chek ="";
                              if($i->id==$data->katagoritindakan_id){
                                  $chek ="selected";
                              }
                              ?>
                              <option value='{{$i->id}}' {{$chek}}>{{$i->nm_katagoritindakan }} </option>;
                              }
                          @endforeach
                        </select>
              </div>
              <div class="form-group">
			  <label for="exampleInputEmail1">Tarif</label>
			  <input type="text" class="form-control" id="tarif" name="tarif"aria-describedby="emailHelp" placeholder="Email" value="{{$data->tarif}}">
              </div>
              <div class="form-group">
			  <label for="exampleInputEmail1">fee dokter</label>
			  <input type="text" class="form-control" id="feedokter" name="feedokter"aria-describedby="emailHelp" placeholder="No Hp" value="{{$data->feedokter}}">
              </div>
              <div class="form-group">
			  <label for="exampleInputEmail1">fee nurse</label>
			  <input type="text" class="form-control" id="feenurse" name="feenurse"aria-describedby="emailHelp" placeholder="No Hp" value="{{$data->feenurse}}">
              </div>
              <div class="form-group">
              <label for="exampleInputEmail1">keterangan</label>
              <textarea name="alamat" class="form-control" id="alamat" cols="30" rows="10">{{$data->keterangan}}</textarea>
              </div>
              
              
                 <fieldset class="form-group">
                        <div class="row">
                        <legend class="col-form-label col-sm-2">Aktifasi</legend>
                        <div class="col-sm-10">
                    <div class="form-check">
                    <input class="form-check-input" name="aktif" type="radio"  id="gridRadios1" value="Y" @if($data->aktif =='Y')checked @endif>
                    <label class="form-check-label" for="gridRadios1">
                        Aktif
                    </label>
                    </div>
                    <div class="form-check">
                    <input class="form-check-input" type="radio"  id="gridRadios2" name="aktif" value="N" @if($data->aktif =='N')checked @endif>
                    <label class="form-check-label" for="gridRadios2">
                        Non Aktif
                    </label>
                    </div>
                   
                </div>
                </div>
            </fieldset>
              

            
            <div class="form-group">   
            <a href="{{url('/tindakan')}}"  class="btn btn-danger">Close</a>
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