<div class="modal fade" id="modal_pilih_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="min-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header" style="background: #8fbdfa">
                <center><h5 class="modal-title" id="exampleModalLabel">Daftar Produk Item</h5></center>
                <button type="button" class="close" id="closemodalobatitem" data-toggle=""
                        title="Keluar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-portlet__body">
                    <table class="display table table-striped table-hover"  style="width:100%"
                           id="add-item-datatables">
                        <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Item</th>
                            <th>Kategori</th>
                            <th>QTY</th>
                            <th>Harga Beli</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        @foreach($data as $row)
                            <tr>
                                <td>{{$no=$no+1}}</td>
                                <td>{{$row->kode}}</td>
                                <td>{{$row->nama_item}}</td>
                                <td>{{$row->produk_katagori->nama_produk_katagori}}</td>
                                <td>{{$row->stok}}</td>
                                <td>Rp.{{number_format($row->harga_beli,2,',','.')}}</td>
                                <td>
                                    <button class="btn btn-outline-info" data-id="{{$row->id}}"
                                            data-nama="{{$row->nama_item}}" data-harga_beli="{{$row->harga_beli}}" id="PilihItemData"
                                            title="Pilih Item"><i class="fa fa-check"></i></button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {
        $('#add-item-datatables').DataTable({});
        // pilih customer
        $(document).off('click', '#PilihItemData')
        $(document).on('click', '#PilihItemData', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var harga_beli = $(this).data('harga_beli');
            $("input[name='nama_item']").val(nama)
            $("input[name='kode']").val(id)
            $("input[name='harga_beli']").val(harga_beli)
            $('#modal_pilih_item').modal('hide');
            $('#ModalAddTransaksi').css('overflow', 'auto')
            $('#ModalAddTransaksi').modal({backdrop: 'static'});
        })


        $("#showmodalitembyinput").prop('disabled', false);
        $("#showmodalitembybutton").prop('disabled', false);
        // show modal pilih customer
        $('#ModalAddTransaksi').modal('hide');
        $('#modal_pilih_item').modal({backdrop: 'static'})
        $('#modal_pilih_item').css('overflow', 'auto')

        // close modal pilih customer
        $("#closemodalobatitem").click(function () {
            $('#ModalAddTransaksi').css('overflow', 'auto')
            $('#modal_pilih_item').modal('hide');
            $('#ModalAddTransaksi').modal({backdrop: 'static'}
            )
        })
        $("#closemodalobatitemclose").click(function () {
            $('#ModalAddTransaksi').css('overflow', 'auto')
            $('#modal_pilih_item').modal('hide');
            $('#ModalAddTransaksi').modal({backdrop: 'static'})
        })
    })
</script>