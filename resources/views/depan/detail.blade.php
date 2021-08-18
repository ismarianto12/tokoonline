@extends('layouts.templatepublic')

@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">{{ $produks['nama_barang'] }}</h3>
                <hr />
            </div>
        </div>
        <!-- /section title -->

        <!-- Products tab & slick -->
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-4 col-xs-6">
                    <div class="shop">
                        <div class="shop-img">
                            <img src="{{ asset('file/gambar/' . $produks['img']) }}" alt="">
                        </div>
                        <div class="shop-body">
                            <h3>{{ $produks['nama_barang'] }}</h3>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-xs-6">
                    <h3 class="title">{{ $produks['nama_barang'] }}</h3>
                    <p>{{ $produks['ketegori'] }}</p>
                    <hr />
                    <p>{{ $produks['harga'] }}</p>
                    <button onclick="javascript:tambah({{ $produks }})" type="submit" class="add-to-cart-btn"><i
                            class="fa fa-shopping-cart"></i>
                        add to
                        cart</button>

                </div>
            </div>
        </div>
    </div>
    <!-- /row -->
    <script>
        // $(function() {  
        function tambah(n) {

            @if (Session::get('client_id'))
                $.ajax({
                url: "{{ route('cart.store') }}",
                data: n,
                method: "POST",
                chace: false,
                asynch: false,
                success: function(data) {
                swal.fire('info', 'data berhasil di tambahkan', 'success');
                window.location.reload(true);
                },
                error: function(data) {
                swal.fire('data berhasil di tambahkan');
            
                }
                });
            @else
                swal.fire('error', 'Untuk pemesanan silahknan login terlebih dahulu', 'error');
                window.location.href="{{ route('user.login') }}";
            
            @endif


        }
        // });
    </script>


@endsection
