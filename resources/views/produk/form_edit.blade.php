<div class="card">
    <div class="card-header">
        <div class="card-title">{{ _('Edit Data Produk') }}</div>
    </div>
    <div class="ket"></div>
    <form id="exampleValidation" method="POST" class="simpan" enctype="multipart/form-data">
        {{ method_field('PUT') }}

        <div class="card-body">
            <div class="form-group row">
                <label for="name" class="col-md-2 text-left">Nama barang</label>
                <div class="col-md-4">
                    <input type="text" name="nama_barang" value="{{ $nama_barang }}" class="form-control">
                </div>
                <label for="name" class="col-md-2 text-left">Harga</label>
                <div class="col-md-4">
                    <input type="text" name="harga" value="{{ $harga }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 text-left">Kategori</label>
                <div class="col-md-4">
                    <input type="text" name="kategori" value="{{ $kategori }}" class="form-control">
                </div>
                <label for="name" class="col-md-2 text-left">Stok</label>
                <div class="col-md-4">
                    <input type="number" name="stok" value="{{ $stok }}" class="form-control">
                </div>
            </div>
            <div class="form-group row">
                <label for="name" class="col-md-2 text-left">Gambar</label>
                <div class="col-md-4">
                    <img src="{{ asset('assets') }}/img/{{ $img }}" alt="" class="header-avatar"
                        id="cc_upload_preview" class="img-responsive" style="width: 200px;height: 250px"
                        onerror="this.onerror=null;this.src='{{ asset('assets') }}/img/profile.jpg';">
                    <br /> <br />
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
{{ Auth::user()->proyekid }}

<script type="text/javascript">
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
                url: "{{ route('master.barang.update', $id) }}",
                method: "POST",
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: datastring,
                cache: false,
                asynch: false,
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
    // sellect 2
</script>
