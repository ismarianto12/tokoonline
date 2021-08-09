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
                            <h3 class="title">Status Transaksi Produk</h3>
                        </div>

                        <div class="table-responsive">
                            <table id="datatable" class="display table table-striped table-hover">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Pemesan</th>
                                        <th>Barang</th>
                                        <th>Qty</th>
                                        <th>Total Harga</th>
                                        <th style="width: 10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $total = 0;
                                    @endphp
                                    @foreach ($data as $datas)
                                        @php
                                            $total += $datas->total;
                                        @endphp
                                        <tr>
                                            <td> <img src="{{ asset('file/gambar/' . $datas['img']) }}" alt=""
                                                    style="height: 100px;width:100px"></td>
                                            <td>{{ $datas->nama_barang }}</td>
                                            <td>{{ $datas->nama_barang }}</td>
                                            <td>{{ $datas->qty }}</td>
                                            <td>{{ number_format($datas->total, 0, 0, '.') }}</td>
                                            <th style="width: 10%">Dalam pengiriman</th>

                                        </tr>

                                    @endforeach

                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td>Total Pesanan</td>

                                        <td colspan="6">{{ number_format($total, 0, 0, '.') }}</td>
                                    </tr>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
