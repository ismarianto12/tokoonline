<div class="card">
    <div class="card-header">
        <div class="card-title">{{ _('Tambah Data') }}</div>
    </div>
    <div class="ket"></div>

    <form id="exampleValidation" method="POST" class="simpan" enctype="multipart/form-data">

        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-md-2 text-left">Nama barang</label>
                <div class="col-md-4">
                    <input type="text" name="nama_barang" class="form-control">
                </div>
                <label for="name" class="col-md-2 text-left">Harga</label>
                <div class="col-md-4">
                    <input type="text" name="harga" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 text-left">Kategori</label>
                <div class="col-md-4">
                    <input type="text" name="kategori" class="form-control">
                </div>
                <label for="name" class="col-md-2 text-left">Stok</label>
                <div class="col-md-4">
                    <input type="number" name="stok" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 text-left">Gambar</label>
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/profile.jpg') }}" class="img-responsive"
                        style="width: 100px;height: 100px">
                    <input type="file" name="img" class="form-control">
                </div>
            </div>
        </div>

        <div class="card-action">
            <div class="row">
                <div class="col-md-12">
                    <input class="btn btn-success" type="submit" value="Simpan">
                    <button class="btn btn-danger" type="reset">Batal</button>
                </div>
            </div>
        </div>
    </form>
</div>

<script type="text/javascript">
    // sellect 2
    $(document).ready(function() {
        $('.js-example-basic-single').select2({
            width: '100%'
        });
    });
    $(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('#dd').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }

        $("#foto").change(function() {
            var ext = $('#foto').val().split('.').pop().toLowerCase();
            //Allowed file types
            if ($.inArray(ext, ['gif', 'png', 'jpg', 'jpeg']) == -1) {
                swal('File Error', 'tidak bisa upload', 'warning');
                $('#foto').val('');
            } else {
                readURL(this);
            }
        });


        $('.simpan').on('submit', function(e) {
            e.preventDefault();

            var datastring = new FormData(this);
            $.ajax({
                url: "{{ route('master.barang.store') }}",
                method: "POST",
                data: datastring,
                cache: false,
                contentType: false,
                processData: false,
                beforeSend: function() {
                    $.notify({
                        icon: 'flaticon-loading-1',
                        title: 'Processing',
                        message: 'Sedang Memproses Penyimpanan Data .....',
                    }, {
                        type: 'secondary',
                        placement: {
                            from: "center",
                            align: "right"
                        },
                        time: 1000,
                        z_index: 2000
                    });
                },
                success: function(data) {
                    $('#datatable').DataTable().ajax.reload();
                    $('#formmodal').modal('hide');

                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Info',
                        message: 'Berhasil di Simpan',
                    }, {
                        type: 'primary',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 1000,
                        z_index: 2000
                    });
                },
                error: function(data) {
                    var div = $('#container');
                    setInterval(function() {
                        var pos = div.scrollTop();
                        div.scrollTop(pos + 2);
                    }, 10)
                    err = '';
                    respon = data.responseJSON;
                    $.each(respon.errors, function(index, value) {
                        err += "<li>" + value + "</li>";
                    });
                    $.notify({
                        icon: 'flaticon-alarm-1',
                        title: 'Opp Seperti nya lupa inputan berikut :',
                        message: err,
                    }, {
                        type: 'secondary',
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        time: 3000,
                        z_index: 2000
                    });

                }
            })
        });
    });
</script>
