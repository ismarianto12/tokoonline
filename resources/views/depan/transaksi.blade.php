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
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
