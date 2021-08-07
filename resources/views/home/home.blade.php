@extends('layouts.template')

@section('content')
    <!-- Datatables -->
    <!-- Chart JS -->
    <script
        src="https://themekita.com/demo-atlantis-lite-bootstrap/livepreview/examples/assets/js/plugin/chart.js/chart.min.js">
    </script>
    <!-- jQuery Sparkline -->
    <script
        src="https://themekita.com/demo-atlantis-lite-bootstrap/livepreview/examples/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js">
    </script>
    <!-- Chart Circle -->
    <script
        src="https://themekita.com/demo-atlantis-lite-bootstrap/livepreview/examples/assets/js/plugin/chart-circle/circles.min.js">
    </script>

    <div class="panel-header bg-primary-gradient">
        <div class="page-inner py-5">
            <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
                <div>
                    <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                    <h5 class="text-white op-7 mb-2">DASHBOARD E Commerce APLICATION</h5>
                </div>
                <div class="ml-md-auto py-2 py-md-0">
                    <a href="" class="btn btn-white btn-border btn-round mr-2">List
                        PRoduk</a>
                    <a href="" class="btn btn-secondary btn-round">Transaksi </a>
                </div>
            </div>
        </div>
    </div>
    <div class="page-inner mt--5">
        <div class="row mt--2">
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Statistik SPK</div>
                        <div class="card-category">Perhitungan SPK </div>
                        <div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-1"></div>
                                <h6 class="fw-bold mt-3 mb-0">Jumlah Produk</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-2"></div>
                                <h6 class="fw-bold mt-3 mb-0">Transaksi</h6>
                            </div>
                            <div class="px-2 pb-2 pb-md-0 text-center">
                                <div id="circles-3"></div>
                                <h6 class="fw-bold mt-3 mb-0">Report</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card full-height">
                    <div class="card-body">
                        <div class="card-title">Pendapatan
                        </div>
                        <div class="row py-3">
                            <div class="col-md-4 d-flex flex-column justify-content-around">
                                <div>
                                    <h6 class="fw-bold text-uppercase text-success op-8">Total Lalu </h6>
                                    <h3 class="fw-bold" id="tot_jumlah_harga"></h3>
                                </div>
                                <div>
                                    <h6 class="fw-bold text-uppercase text-danger op-8">Total Sekarang</h6>
                                    <h3 class="fw-bold" id="tot_jumlah_hargas"></h3>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div id="chart-container">
                                    <canvas id="totalIncomeChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <div class="card-head-row">
                            <div class="card-tools">
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm mr-2">
                                    <span class="btn-label">
                                        <i class="fa fa-pencil"></i>
                                    </span>
                                    Export
                                </a>
                                <a href="#" class="btn btn-info btn-border btn-round btn-sm">
                                    <span class="btn-label">
                                        <i class="fa fa-print"></i>
                                    </span>
                                    Print
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="container"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-primary">
                    <div class="card-header">
                        <div class="card-title">Total Rencana Anggaran </div>
                        <div class="card-category">Sampai dengan {{ Properti_app::tgl_indo(date('Y-m-d')) }}</div>
                    </div>
                    <div class="card-body pb-0">
                        <div class="mb-4 mt-2" id="total_rencanaanggarans">
                        </div>
                        <div class="pull-in">
                            <canvas id="dailySalesChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="h1 fw-bold float-right text-warning">+7%</div>
                        <h2 class="mb-2">213</h2>
                        <p class="text-muted">Transactions</p>
                        <div class="pull-in sparkline-fix">
                            <div id="lineChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script src="{{ asset('assets') }}/js/plugin/chart-circle/circles.min.js"></script>
    <script src="{{ asset('assets') }}/js/demo.js"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/series-label.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>



@endsection
