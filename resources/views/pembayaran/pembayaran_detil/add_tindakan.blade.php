<div class="modal fade" id="ModalAddTindakanTransaksi" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content modal-lg">
            <div class="modal-header no-bd">
                <h5 class="modal-title">
                            <span class="fw-light">
                             Data Tindakan Transaksi
                            </span>
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="CreateDataTindakanTransaksi" method="POST" enctype="multipart/form-data" onsubmit="return false">

                    {{csrf_field()}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="alert alert-dismissible fade show messageboxTindakan" role="alert"  id="errMsgTindakan" style="width: 100%">
                                <div id="ShowErrordata"></div>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                        </div>
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Tindakan</label>
                                <div class="input-group">
                                    <input type="hidden" name="kode">
                                    <input type="hidden" name="pembayaran_id" value="{{$idx}}">
                                    <input style="cursor: pointer;" type="text" class="form-control" placeholder="Tindakan" name="nama_item"
                                           id="showmodalTindakanbyinput">
                                    <div class="input-group-prepend">
                                        <button style="cursor: pointer;" class="input-group-text" id="showmodalTindakanbybutton">
                                            <i class="flaticon-search-1" title="Cari Item">
                                            </i>
                                        </button>
                                    </div>

                                </div>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>harga_jual</label>
                                <input name="harga_jual" type="text" class="form-control" id="rupiahtindakan"
                                       placeholder="Harga" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="transaksi" value="jasa">
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Diskon</label>
                                <input name="diskon" type="text" class="form-control" id="rupiahtindakan"
                                       placeholder="Diskon">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Qty</label>
                                <input name="qty" type="text" class="form-control" value="1"onkeypress='validate(event)'
                                       placeholder="Qty">
                            </div>
                        </div>

                    </div>
                </form>
            </div>
            <div class="modal-footer no-bd">
                <button class="btn btn-primary" id="SubmitCreateTindakanTransaksi">Simpan</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
<script>
var rupiahtindakan = document.getElementById('rupiahtindakan');
rupiahtindakan.addEventListener('keyup', function(e){
			// tambahkan 'Rp.' pada saat form di ketik
			// gunakan fungsi formatRupiah() untuk mengubah angka yang di ketik menjadi format angka
			rupiahtindakan.value = formatRupiah(this.value, 'Rp. ');
		});

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
        $("#loadmodaltransaksitindakancreate").prop('disabled', false);
        $("#errMsgTindakan").prop('hidden', true);
        $('#ModalAddTindakanTransaksi').modal({backdrop: 'static'})


        $("#showmodalTindakanbyinput").click(function (event) {
            event.preventDefault();
            $("#showmodalTindakanbyinput").prop('disabled', true);
            $("#showmodalTindakanbybutton").trigger('click');
        });
       
        // function show modal customer create
        $("#showmodalTindakanbybutton").click(function (event) {
            event.preventDefault();
            $("#showmodalTindakanbybutton").prop('disabled', true);
            $('#loadmodalTindakanbyaddtransaksi').load("/load-modal-item-by-add-transaksi-tindakan");
        });
        $("#SubmitCreateTindakanTransaksi").click(function (e) {
            $('.messageboxTindakan').removeClass('alert-danger', 'alert-success');
            $('.messageboxTindakan').hide();
            $(".SubmitCreateTindakanTransaksi").attr("disabled", true);
            $.ajax({
                url: '/pembayaran-detil',
                data: new FormData($("#CreateDataTindakanTransaksi")[0]),
                dataType: 'json',
                async: false,
                type: 'post',
                processData: false,
                contentType: false,
                success: function (response) {
                        $(".SubmitCreateTindakanTransaksi").attr("disabled", false);
                        $("#CreateDataTindakanTransaksi")[0].reset();
                        $.notify({
                            // options
                            message: 'Data Berhasil Di Simpan'
                        }, {
                            // settings
                            time: 5000,
                            type: 'success'
                        });
                        $('#ModalAddTindakanTransaksi').modal('hide')
                        $('.modal-backdrop').remove();
                    $('#reloadpaginate').html('');
                    $('#reloadpaginate').load("/pembayaran_detil/"+'{!! Crypt::encrypt($idx) !!}'+"/edit");
                },
                error: function (data) {
                    $("#errMsgTindakan").prop('hidden', false);
                    // $(".messageboxTindakan").show();
                    $(".SubmitCreateTindakanTransaksi").attr("disabled", false);
                    $("#modal_create_expedition").scrollTop(0);
                    $('#ShowErrordata').html('');

                    $('.messageboxTindakan').show().addClass('alert-danger');
                    var messages = jQuery.parseJSON(data.responseText);
                        $('#ShowErrordata').html(messages.message);
                }
            });
        })
        
        
    });

</script>