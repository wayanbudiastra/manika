<table id="basic-datatables" class="display table table-striped table-hover">
    <thead>
    <tr>
        <th>No</th>
        <th>Nama Item</th>
        <th>Katagori</th>
        <th>Harga</th>
        <th>Qty</th>
        <th>Diskon</th>
        <th>SubTotal</th>
        <th>Aksi</th>
    </tr>
    </thead>

    <tbody>
    @foreach($row as $k)
    <?php
    if($cekposting == count($row)){
$disabled = "disabled";
$cursor = "not-allowed";
    }
    else{
        $disabled = "";
        $cursor = "pointer";
    }
    ?>
        <tr>

            <td>{{$no=$no+1}}</td>
            <td>{{$k->nama_item}}</td>
            <td>{{$k->katagori_item}}</td>
            <td>Rp.{{number_format($k->harga_jual,2,',','.')}}</td>
            <td>{{$k->qty}}</td>
            <td>{{$k->diskon}}</td>
            <td>Rp.{{number_format($k->subtotal,2,',','.')}}</td>
            <td>
                <button title="Hapus Data" {{$disabled}} style="cursor: {{$cursor}}"class="btn btn-outline-danger delete" data-id="{{$k->id}}">
                    <i class="fa fa-trash"></i></button>
            </td>
        </tr>

    @endforeach

    </tbody>
</table>
    <script>
    var cekposting ='{{$cekposting}}';
    var cekcountrow ='{{count($row)}}';
    
    if(cekposting != cekcountrow){
        document.getElementById('cekposting').innerHTML = '<button class="btn btn-danger btn-round" id="posting" data-id="{!! Crypt::encrypt($data->id) !!}" data-jenis="Posting" data-value="N"><i class="fa fa-save"></i>Posting</button>';
        document.getElementById('addtindakan').innerHTML = '';
        document.getElementById('additem').innerHTML = '';
        document.getElementById('addtindakan').innerHTML = '<button class="btn btn-success btn-round" id="loadmodaltransaksitindakancreate"><i class="fa fa-plus"></i>Add Tindakan</button>';
        document.getElementById('additem').innerHTML = '<button class="btn btn-primary btn-round" id="loadmodaltransaksicreate"><i class="fa fa-plus"></i>Add Item/Obat</button>';
           }
    else{
    if(cekcountrow == 0){
        document.getElementById('cekposting').innerHTML = '<button class="btn btn-danger btn-round" id="posting" data-id="{!! Crypt::encrypt($data->id) !!}" data-jenis="Posting" data-value="N"><i class="fa fa-save"></i>Posting</button>';
        document.getElementById('addtindakan').innerHTML = '';
        document.getElementById('additem').innerHTML = '';
        
        document.getElementById('addtindakan').innerHTML = '<button class="btn btn-success btn-round" id="loadmodaltransaksitindakancreate"><i class="fa fa-plus"></i>Add Tindakan</button>';
        document.getElementById('additem').innerHTML = '<button class="btn btn-primary btn-round" id="loadmodaltransaksicreate"><i class="fa fa-plus"></i>Add Item/Obat</button>';

    }
    else{
        document.getElementById('cekposting').innerHTML = '<button class="btn btn-danger btn-round" id="posting" data-id="{!! Crypt::encrypt($data->id) !!}" data-jenis="Batal Posting" data-value="Y"><i class="fa fa-save"></i>Batal Posting</button>';
        document.getElementById('addtindakan').innerHTML = '<button disabled style="cursor: not-allowed;" class="btn btn-success btn-round " id="loadmodaltransaksitindakancreate"><i class="fa fa-plus"></i>Add Tindakan</button>';
        document.getElementById('additem').innerHTML = '<button disabled style="cursor: not-allowed;" class="btn btn-primary btn-round" id="loadmodaltransaksicreate"><i class="fa fa-plus"></i>Add Item/Obat</button>'

    }
    }
    var subtotal = document.getElementById('subtotal');
    subtotal.innerHTML = "Rp. "+"{{number_format($total,2,',','.')}}"
        $(document).ready(function () {
            $('#basic-datatables').DataTable({});
        });
    </script>
