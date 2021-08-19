@extends('layouts.templatepublic')


@section('content')

    <div class="section">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row">

                <!-- section title -->
                <div class="col-md-12">
                    <div class="ket">
                    </div>
                    <div class="register">
                        <div class="section-title">
                            <h3 class="title"><i class="fa fa-user"></i>Daftar User</h3>
                        </div>

                        <hr />
                        <div class="section-body">
                            <form class="form-horizontal" id="simpan">
                                <div class="form-group row">
                                    <label class="col-md-2">Username</label>
                                    <div class="col-md-4">
                                        <input type="text" required class="form-control" name="username">
                                    </div>
                                    <label class="col-md-2">Password</label>
                                    <div class="col-md-4">
                                        <input type="password" required class="form-control" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-md-2">Email</label>
                                    <div class="col-md-4">
                                        <input type="email" required class="form-control" name="email">
                                    </div>
                                    <label class="col-md-2">Nama</label>
                                    <div class="col-md-4">
                                        <input type="text" required class="form-control" name="nama">
                                    </div>
                                </div>

                                <div class="form-group row">

                                    <label class="col-md-2">No Telp</label>
                                    <div class="col-md-4">
                                        <input type="number" required class="form-control" name="no_telp">
                                    </div>
                                    <label class="col-md-2">Alamat</label>
                                    <div class="col-md-4">
                                        <input type="text" required class="form-control" name="alamat">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-md-2">Kode Pos</label>
                                    <div class="col-md-4">
                                        <input type="text" required class="form-control" name="zip">

                                    </div>
                                    <label class="col-md-2">Kecamatan</label>
                                    <div class="col-md-4">
                                        <input type="text" required class="form-control" name="kecamatan">
                                    </div>
                                </div>
                                <div class="form-group row">

                                    <label class="col-md-2">Kabupaten</label>
                                    <div class="col-md-4">
                                        <input type="text" required class="form-control" name="kabupaten">
                                    </div>
                                    <label class="col-md-2">Negara</label>
                                    <div class="col-md-4">
                                        <input type="text" required class="form-control" name="negara">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <hr />
                                    <div class="col-md-4">
                                        <button class="btn btn-primary"><i class="fa fa-save"></i>Simpan</button>
                                        <button class="btn btn-info"><i class="fa fa-reload"></i>Cancel</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(function() {
            $('.register').show();
            $('#simpan').on('submit', function(e) {
                $(this).attr('readonly');
                e.preventDefault();
                $.ajax({
                    url: '{{ route('register_act') }}',
                    data: $(this).serialize(),
                    chace: false,
                    asynch: false,
                    method: 'post',
                    success: function(data) {
                        var email = $('input[name="email"]').val();
                        $('.register').hide();

                        $('.ket').html(
                            '<div class="alert alert-info">Pendaftaran berhasil di lakukan' +
                            +'Silahkan login dengan username email :' + email +
                            'dan password yand di input</div>');

                        window.location.href = "{{ route('dashboarduser') }}";
                    },
                    error: function(data) {
                        err = '';
                        respon = data.responseJSON;
                        $.each(respon.errors, function(index, value) {
                            err += "<li>" + value + "</li>";
                        });
                        $('.ket').html('<p>' + err + '</p>');
                        $('.register').show();
                        console.log(data);
                    }
                })
            });
        });
    </script>
@endsection
