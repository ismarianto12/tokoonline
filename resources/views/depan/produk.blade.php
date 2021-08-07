@extends('layouts.templatepublic')

@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">Semua Products</h3>
                <hr />
                <div class="section-nav">
                    <ul class="section-tab-nav tab-nav">
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

@endsection
