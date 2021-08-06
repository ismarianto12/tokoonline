@extends('layouts.templatepublic')


@section('content')
    <div class="row">

        @php
            $j = 1;
        @endphp
        @foreach ($vf as $vfs)
            <!-- shop -->
            <div class="col-md-4 col-xs-6">
                <div class="shop">
                    <div class="shop-img">
                        <img src="{{ asset('file/gambar/' . $vfs['img']) }}" alt="">
                    </div>
                    <div class="shop-body">
                        <h3>{{ $vfs['nama_barang'] }}</h3>
                        <a href="#" class="cta-btn">Shop now <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- /shop -->
        @endforeach
        @php
            $j++;
        @endphp
        <!-- /shop -->
    </div>



    <hr />
    <!-- row -->
    <div class="row">

        <!-- section title -->
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">New Products</h3>
                <hr />
                <div class="section-nav">
                    <ul class="section-tab-nav tab-nav">
                        {{-- <li class="active">
                                    <a data-toggle="tab" href="#tab1">Laptops</a></li>
                                <li><a data-toggle="tab" href="#tab1">Smartphones</a></li>
                                <li><a data-toggle="tab" href="#tab1">Cameras</a></li>
                                <li><a data-toggle="tab" href="#tab1">Accessories</a></li> --}}
                        @php
                            $j = 1;
                        @endphp
                        @foreach ($produk as $produks)
                            @php
                                $active = $j == 1 ? 'class="active"' : '';
                            @endphp
                            <li {{ $active }}><a data-toggle="tab" href="#tab1">{{ $produks['kategori'] }}</a>
                            </li>
                        @endforeach
                        @php
                            $j++;
                        @endphp
                    </ul>
                </div>
            </div>
        </div>
        <!-- /section title -->

        <!-- Products tab & slick -->
        <div class="col-md-12">
            <div class="row">
                <div class="products-tabs">
                    <!-- tab -->
                    <div id="tab1" class="tab-pane active">
                        <div class="products-slick" data-nav="#slick-nav-1">

                            @foreach ($produk as $produks)
                                <!-- product -->
                                <div class="product">
                                    <div class="product-img">
                                        <img src="{{ asset('file/gambar/' . $produks['img']) }}" alt="">
                                        <div class="product-label">
                                            <span class="sale">-30%</span>
                                            <span class="new">NEW</span>
                                        </div>
                                    </div>
                                    <div class="product-body">
                                        <p class="product-category">Category</p>
                                        <h3 class="product-name"><a href="#">{{ $produks['kategori'] }}</a></h3>
                                        <h4 class="product-price">
                                            {{ number_format($produks['harga'], 0, 0, '.') }} <del
                                                class="product-old-price">{{ number_format($produks['harga'], 0, 0, '.') }}</del>
                                        </h4>
                                        <div class="product-rating">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                        </div>
                                        <div class="product-btns">
                                            <button class="add-to-wishlist"><i class="fa fa-heart-o"></i><span
                                                    class="tooltipp">add to wishlist</span></button>
                                            <button class="add-to-compare"><i class="fa fa-exchange"></i><span
                                                    class="tooltipp">add to compare</span></button>
                                            <button class="quick-view"><i class="fa fa-eye"></i><span class="tooltipp">quick
                                                    view</span></button>
                                        </div>
                                    </div>
                                    <div class="add-to-cart">
                                        <button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> add to
                                            cart</button>
                                    </div>
                                </div>
                                <!-- /product -->
                            @endforeach

                        </div>
                        <div id="slick-nav-1" class="products-slick-nav"></div>
                    </div>
                    <!-- /tab -->
                </div>
            </div>
        </div>
        <!-- Products tab & slick -->
    </div>
    <!-- /row -->


@endsection
