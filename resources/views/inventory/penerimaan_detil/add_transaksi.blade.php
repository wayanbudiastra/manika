<div class="modal fade" id="ModalAddTransaksi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                            <span class="fw-light">
                             Data Transaksi
                            </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="CreateDataTransaksi" method="POST" enctype="multipart/form-data" onsubmit="return false">

                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissible fade show messagebox" role="alert"  id="errMsg" style="width: 100%">
                                <div id="ShowErrordata"></div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Item</label>
                                <div class="input-group">
                                    <input type="hidden" name="kode">
                                    <input type="hidden" name="produk_item_id">
                                    <input type="hidden" name="penerimaan_id" value="{{$idx}}">
                                    <input style="cursor: pointer;" type="text" class="form-control" placeholder="Item" name="nama_item"
                                           id="showmodalitembyinput">
                                    <div class="input-group-prepend">
                                        <button style="cursor: pointer;" class="input-group-text" id="showmodalitembybutton">
                                            <i class="flaticon-search-1" title="Cari Item">
                                            </i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                          <div class="col-md-6">
                              <div class="form-group form-group-default">
                                  <label>Satuan Besar</label>
                                  <select class="form-control" name="satuan_besar_id" required>
                                      <option value=" ">-</option>
                                      @foreach($satuanbesar as $row)
                                          <option value="{{$row->id}}">{{$row->nama_satuan_besar}}</option>
                                      @endforeach
                                  </select>
                              </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Isi Satuan</label>
                                <input name="isi_satuan" type="text" class="form-control" value="1" onkeypress='validate(event)'
                                       placeholder="Qty">
                            </div>
                        </div>
                          <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Satuan Kecil</label>
                                <select class="form-control" name="satuan_kecil_id" required>
                                    <option value=" ">-</option>
                                    @foreach($satuankecil as $row)
                                        <option value="{{$row->id}}">{{$row->nama_satuan_kecil}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>


                         <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>harga beli</label>
                                <input name="harga_beli" type="text" class="form-control"
                                       placeholder="Harga" >
                            </div>
                        </div>
                       
                       <!--  <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Diskon</label>
                                <input name="diskon" type="text" class="form-control" id="rupiahobat"
                                       placeholder="Diskon">
                            </div>
                        </div> -->


                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Qty diterima</label>
                                <input name="qty" type="text" class="form-control" value="1" onkeypress='validate(event)'
                                       placeholder="Qty">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer no-bd">
                <button class="btn btn-primary" id="SubmitCreateTransaksi">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
// var rupiahtindakan = document.getElementById('rupiahobat');
// rupiahtindakan.addEventListener('keyup', function(e){
// 			// tambahkan 'Rp.' pada saat form di ketik
// 			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
// 			rupiahtindakan.value = formatRupiah(this.value, 'Rp. ');
// 		});

		/* Fungsi formatRupiah */
		function formatRupiah(angka, prefix){
			var number_string = angka.replace(/[^,\d]/g, '').toString(),
			split   		= number_string.split(','),
			sisa     		= split[0].length % 3,
			rupiahtindakan     		= split[0].substr(0, sisa),
			ribuan     		= split[0].substr(sisa).match(/\d{3}/gi);

			// tambahkan titik jika yang di input sudah menjadi angka ribuan
			if(ribuan){
				separator = sisa ? '.' : '';
				rupiahtindakan += separator + ribuan.join('.');
			}

			rupiahtindakan = split[1] != undefined ? rupiahtindakan + ',' + split[1] : rupiahtindakan;
			return prefix == undefined ? rupiahtindakan : (rupiahtindakan ? 'Rp. ' + rupiahtindakan : '');
		}

    $(document).ready(function () {
        $("#loadmodaltransaksicreate").prop('disabled', false);
        $("#errMsg").prop('hidden', true);
        $('#ModalAddTransaksi').modal({backdrop: 'static'})


        $("#showmodalitembyinput").click(function (event) {
            event.preventDefault();
            $("#showmodalitembyinput").prop('disabled', true);
            $("#showmodalitembybutton").trigger('click');
        });
        $("#alerthidden").click(function () {
            $(".messagebox").hide();
        })

        // function show modal customer create
        $("#showmodalitembybutton").click(function (event) {
            event.preventDefault();
            $("#showmodalitembybutton").prop('disabled', true);
            $('#loadmodaltembyaddtransaksi').load("/load-modal-item-by-add-penerimaan");
        });
        $("#SubmitCreateTransaksi").click(function (e) {
            $('.messagebox').removeClass('alert-danger', 'alert-success');
            $('.messagebox').hide();
            $(".SubmitCreateTransaksi").attr("disabled", true);
            $(".showloading").prop('disabled', false);
            $.ajax({
                url: '/penerimaan-detil',
                data: new FormData($("#CreateDataTransaksi")[0]),
                dataType: 'json',
                async: false,
                type: 'post',
                processData: false,
                contentType: false,
                success: function (response) {

                   // console.log(response);

                        $(".showloading").prop('disabled', true);
                        $(".SubmitCreateTransaksi").attr("disabled", false);
                        $("#CreateDataTransaksi")[0].reset();
                        $.notify({
                            // options
                            message: 'Data Berhasil Di Simpan'
                        }, {
                            // settings
                            time: 5000,
                            type: 'success'
                        });
                        $('#ModalAddTransaksi').modal('hide')
                        $('.modal-backdrop').remove();
                    $('#reloadpaginate').html('');
                    $('#reloadpaginate').load("/penerimaan/"+'{!! Crypt::encrypt($idx) !!}'+"/edit");
                },
                error: function (data) {
                    $("#errMsg").prop('hidden', false);
                    // $(".messagebox").show();
                    $(".showloading").prop('disabled', true);
                    $(".SubmitCreateTransaksi").attr("disabled", false);
                    $("#modal_create_expedition").scrollTop(0);
                    $('#ShowErrordata').html('');

                    $('.messagebox').show().addClass('alert-danger');
                    var messages = jQuery.parseJSON(data.responseText);
                        $('#ShowErrordata').html(messages.message);
                }
            });
        })
        
        
    });

</script>