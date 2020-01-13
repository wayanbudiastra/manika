<div class="modal fade" id="modal_pilih_tindakan_item" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document" style="min-width: 1200px;">
        <div class="modal-content">
            <div class="modal-header" style="background: #8fbdfa">
                <center><h5 class="modal-title" id="exampleModalLabel">Daftar Tindakan</h5></center>
                <button type="button" class="close" id="closemodaltindakanitem" data-toggle=""
                        title="Keluar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="m-portlet__body">
                    <table class="display table table-striped table-hover"  style="width:100%"
                           id="add-item-tindakan-datatables">
                        <thead>
                        <tr align="center">
                            <th>No.</th>
                            <th>Kode</th>
                            <th>Nama Item</th>
                            <th>Kategori</th>
                            <th>Harga Jual</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody align="center">
                        @foreach($data as $row)
                            <tr>
                                <td>{{$no=$no+1}}</td>
                                <td>{{$row->kode}}</td>
                                <td>{{$row->nama_jasa}}</td>
                                <td>{{$row->jasakatagori->nama_jasakatagori}}</td>
                                <td>Rp.{{number_format($row->harga_jual,2,',','.')}}</td>
                                <td>
                                    <button class="btn btn-outline-info" data-id="{{$row->id}}"
                                            data-nama="{{$row->nama_jasa}}" data-harga_jual="{{$row->harga_jual}}" id="PilihItemTindakanData"
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
        $('#add-item-tindakan-datatables').DataTable({});
        // pilih customer
        $(document).off('click', '#PilihItemTindakanData')
        $(document).on('click', '#PilihItemTindakanData', function () {
            var id = $(this).data('id');
            var nama = $(this).data('nama');
            var harga_jual = $(this).data('harga_jual');
            $("input[name='nama_item']").val(nama)
            $("input[name='kode']").val(id)
            $("input[name='harga_jual']").val(harga_jual)
            $('#modal_pilih_tindakan_item').modal('hide');
            $('#ModalAddTindakanTransaksi').css('overflow', 'auto')
            $('#ModalAddTindakanTransaksi').modal({backdrop: 'static'});
        })


        $("#showmodalTindakanbybutton").prop('disabled', false);
        $("#showmodalTindakanbyinput").prop('disabled', false);
        // show modal pilih customer
        $('#ModalAddTindakanTransaksi').modal('hide');
        $('#modal_pilih_tindakan_item').modal({backdrop: 'static'})
        $('#modal_pilih_tindakan_item').css('overflow', 'auto')

        // close modal pilih customer
        $("#closemodaltindakanitem").click(function () {
            $('#ModalAddTindakanTransaksi').css('overflow', 'auto')
            $('#modal_pilih_tindakan_item').modal('hide');
            $('#ModalAddTindakanTransaksi').modal({backdrop: 'static'}
            )
        })
        $("#closemodaltindakanitemclose").click(function () {
            $('#ModalAddTindakanTransaksi').css('overflow', 'auto')
            $('#modal_pilih_tindakan_item').modal('hide');
            $('#ModalAddTindakanTransaksi').modal({backdrop: 'static'})
        })
    })
</script>