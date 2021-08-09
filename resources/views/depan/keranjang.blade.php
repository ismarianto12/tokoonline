@extends('layouts.templatepublic')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        <div class="panel-title">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5><span class="fa fa-shopping-cart"></span> Shopping Cart</h5>
                                </div>
                                <div class="col-lg-6">
                                    <button type="button" class="btn btn-primary btn-sm btn-block">
                                        <span class="fa fa-share-alt"></span> Continue shopping
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-2"><img class="img-responsive"
                                    src="http://localhost:97/toko/public/file/gambar/1.jpg">
                            </div>
                            <div class="col-lg-4">
                                <h4 class="product-name"><strong>Product name</strong></h4>
                                <h4><small>Product description</small></h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-6 text-right">
                                    <h6><strong>200.000 <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control input-sm" value="1">
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-link btn-lg">
                                        <span class="fa fa-trash"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="col-lg-2"><img class="img-responsive"
                                    src="http://localhost:97/toko/public/file/gambar/2.jpg">
                            </div>
                            <div class="col-lg-4">
                                <h4 class="product-name"><strong>Product name</strong></h4>
                                <h4><small>Product description</small></h4>
                            </div>
                            <div class="col-lg-6">
                                <div class="col-lg-6 text-right">
                                    <h6><strong>300.000 <span class="text-muted">x</span></strong></h6>
                                </div>
                                <div class="col-lg-4">
                                    <input type="text" class="form-control input-sm" value="1">
                                </div>
                                <div class="col-lg-2">
                                    <button type="button" class="btn btn-link btn-lg">
                                        <span class="fa fa-trash"> </span>
                                    </button>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="text-center">
                                <div class="col-lg-9">
                                    <h6 class="text-right">Added items?</h6>
                                </div>
                                <div class="col-lg-3">
                                    <button type="button" class="btn btn-default btn-sm btn-block">
                                        Update cart
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="panel-footer">
                        <div class="row text-center">
                            <div class="col-lg-9">
                                <h4 class="text-right">Total <strong>Rp 500.000</strong></h4>
                            </div>
                            <div class="col-lg-3">
                                <button type="button" class="btn btn-success btn-block">
                                    Checkout
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
