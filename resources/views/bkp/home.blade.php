@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Dashboard
                     <div class="col-md-12 text-right">
		    	<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#exampleModal">
  				Add User
				</button>
				</div>

                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                <div class="row">
				
				</div>
                   <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Role</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
  @foreach($data as $k)
 
    <tr>
      <th scope="row">{{$no=$no+1}}</th>
      <td>{{$k->role}}</td>
      <td>{{$k->name}}</td>
    <td>{{$k->email}}</td>
    </tr>
    
   @endforeach
  </tbody>
</table>
<center>{{ $data->links() }}</center>
    </div>
    </div>
    </div>
    </div>
</div>

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
			    <label for="exampleInputEmail1">email</label>
			    <input type="email" class="form-control" id="email" name="email"aria-describedby="emailHelp" placeholder="email">
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
@endsection
