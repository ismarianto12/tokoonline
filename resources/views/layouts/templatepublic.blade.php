<!DOCTYPE html>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ $title }}</title>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <meta content='no-cache' name='turbolinks-cache-control' />
    <!-- Google font -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700" rel="stylesheet">

    <!-- Bootstrap -->
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/template/technext.github.io/electro/') }}/css/bootstrap.min.css" />

    <!-- Slick -->
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/template/technext.github.io/electro/') }}/css/slick.css" />
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/template/technext.github.io/electro/') }}/css/slick-theme.css" />

    <!-- nouislider -->
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/template/technext.github.io/electro/') }}/css/nouislider.min.css" />

    <!-- Font Awesome Icon -->
    <link rel="stylesheet" href="{{ asset('/template/technext.github.io/electro/') }}/css/font-awesome.min.css">

    <!-- Custom stlylesheet -->
    <link type="text/css" rel="stylesheet"
        href="{{ asset('/template/technext.github.io/electro/') }}/css/style.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    {{-- <script defer='defer' src='https://santrikoding.com/js/custom.js' type='text/javascript'></script> --}}
    <script src="{{ asset('/template/technext.github.io/electro/js/') }}/jquery.min.js"></script>


</head>

<body>
    <!-- HEADER -->
    <header>
        <!-- TOP HEADER -->
        <div id="top-header">
            <div class="container">
                <ul class="header-links pull-left">
                    <li><a href="#"><i class="fa fa-phone"></i> +021-95-51-84</a></li>
                    <li><a href="#"><i class="fa fa-envelope-o"></i> email@email.com</a></li>
                    <li><a href="#"><i class="fa fa-map-marker"></i> 1734 Stonecoal Road</a></li>
                </ul>
                <ul class="header-links pull-right">

                    @if (Session::get('client_id'))
                        <li><a href="{{ route('dashboarduser') }}"><i class="fa fa-user-o"></i> Dashboard</a></li>
                        <li><a href="{{ route('logouteuser') }}"><i class="fa fa-user-o"></i> Logout</a></li>
                    @else
                        <li><a href="{{ route('user.login') }}"><i class="fa fa-user-o"></i> Login</a></li>
                    @endif
                </ul>
            </div>
        </div>
        <!-- /TOP HEADER -->

        <!-- MAIN HEADER -->
        <div id="header">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <!-- LOGO -->
                    <div class="col-md-3">
                        <div class="header-logo">
                            <a href="#" class="logo" style="display: inline">
                                <img src="{{ asset('/template/technext.github.io/electro/') }}/img/logo.png" alt=""
                                    class="img-responsive" style="height: 100px;width:100px">
                                <h3 style="color: #fff"> Nocturnal - Second</h3>
                            </a>
                        </div>
                    </div>
                    <!-- /LOGO -->

                    <!-- SEARCH BAR -->
                    <div class="col-md-6">

                    </div>
                    <!-- /SEARCH BAR -->

                    <!-- ACCOUNT -->
                    <div class="col-md-3 clearfix">
                        <div class="header-ctn">
                            <!-- Wishlist -->

                            <!-- /Wishlist -->

                            <!-- Cart -->
                            <div class="dropdown">
                                @if (Session::get('client_id'))
                                    <a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
                                        <i class="fa fa-shopping-cart"></i>
                                        <span>Keranjang Belanja</span>
                                        <div class="qty"></div>
                                    </a>
                                @endif

                                <div class="cart-dropdown">
                                    <div class="cart-list" id="datanya">
                                    </div>

                                    <div class="tapak"></div>
                                </div>
                            </div>
                            <!-- /Cart -->

                            <!-- Menu Toogle -->
                            <div class="menu-toggle">
                                <a href="#">
                                    <i class="fa fa-bars"></i>
                                    <span>Menu</span>
                                </a>
                            </div>
                            <!-- /Menu Toogle -->
                        </div>
                    </div>
                    <!-- /ACCOUNT -->
                </div>
                <!-- row -->
            </div>
            <!-- container -->
        </div>
        <!-- /MAIN HEADER -->
    </header>
    <!-- /HEADER -->

    <!-- NAVIGATION -->
    <nav id="navigation">
        <!-- container -->
        <div class="container">
            <!-- responsive-nav -->
            <div id="responsive-nav">
                <!-- NAV -->
                <ul class="main-nav nav navbar-nav">
                    <li class="active"><a href="{{ Url('/') }}">Home</a></li>
                    <li><a href="{{ route('produk') }}">Produk</a></li>

                    @if (Session::get('client_id'))
                        <li><a href="{{ route('dashboarduser') }}">Dashboard user</a></li>
                        <li><a href="{{ route('transaksi') }}">Status Transaksi</a></li>
                        <li><a href="{{ route('page', 'carabeli') }}">Cara Beli</a></li>
                        <li><a href="{{ Url('cart') }}">Keranjang</a></li>

                        {{-- dashboarduser
keranjang
transaksi --}}

                    @else
                        <li><a href="{{ route('register') }}">Register</a></li>
                    @endif
                </ul>
                <!-- /NAV -->
            </div>
            <!-- /responsive-nav -->
        </div>
        <!-- /container -->
    </nav>
    <!-- /NAVIGATION -->
    <!-- SECTION -->
    <div class="section">
        <!-- container -->
        <div class="container">
            @yield('content')
        </div>
        <!-- /container -->
    </div>
    <!-- /SECTION -->



    <!-- FOOTER -->
    <footer id="footer">
        <!-- top footer -->
        <div class="section">
            <!-- container -->
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-3 col-xs-6">
                        <div class="footer">
                            <h3 class="footer-title">About Us</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor
                                incididunt ut.</p>
                            <ul class="footer-links">
                                <li><a href="#"><i class="fa fa-map-marker"></i>1734 Stonecoal Road</a></li>
                                <li><a href="#"><i class="fa fa-phone"></i>+021-95-51-84</a></li>
                                <li><a href="#"><i class="fa fa-envelope-o"></i>email@email.com</a></li>
                            </ul>
                        </div>
                    </div>


                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /top footer -->

        <!-- bottom footer -->
        <div id="bottom-footer" class="section">
            <div class="container">
                <!-- row -->
                <div class="row">
                    <div class="col-md-12 text-center">

                        <span class="copyright">
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            <script>
                                document.write(new Date().getFullYear());
                            </script> All rights reserved | This template is made with <i class="fa fa-heart-o"
                                aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </span>
                    </div>
                </div>
                <!-- /row -->
            </div>
            <!-- /container -->
        </div>
        <!-- /bottom footer -->
    </footer>
    <!-- /FOOTER -->

    <!-- jQuery Plugins -->
    <script>
        $(function() {
            $('#datanya').html('<b>Loading cart ..</b>');
            $('.tapak').html('<b>Loading cart ..</b>');
            $.ajax({
                url: '{{ route('barang_json') }}',
                chachec: false,
                asynch: false,
                dataType: 'json',
                method: 'get',
                success: function(respon) {
                    tablelist = '';
                    tot = 0;

                    j = 0;
                    $.each(respon, function(index, value) {
                        tot += value.price;
                        j += 1;
                        tablelist +=
                            '<div class="product-widget">' +

                            '<div class="product-body">' +
                            '<h3 class="product-name"><a href="#">' + value.name + '</a></h3>' +
                            '<h4 class="product-price"><span>' + value.quantity + '</span>' +
                            value
                            .price + '</h4>' +
                            '</div>' +
                            '<button class="delete" onclick="javascript:delete_chart(' + value
                            .id +
                            ')"><i class="fa fa-close"></i></button>' +
                            '</div>';
                    });

                    $('#datanya').html(tablelist);
                    $('.qty').html(j);
                    let tapak = '<br /><div class="cart-summary">' +
                        '<small>' + j + ' Item(s) selected</small>' +
                        '<h5>Total ' + tot + '</h5>' +
                        '</div>' +
                        '<div class="cart-btns">' +
                        '<a href="#">View Cart</a>' +
                        '<a href="{{ route('cart.list') }}">Checkout <i class = "fa fa-arrow-circle-right"> </i></a> ' +
                        '</div>';

                    $('.tapak').html(tapak);
                },
                error: function(respon) {
                    console.log(respon);
                }

            });

        });

        function delete_chart(n) {
            // alert(n);
            $.ajax({
                url: "{{ route('cart.remove') }}",
                method: "POST",
                data: 'id=' + n,
                chace: false,
                asynch: false,
                success: function(data) {
                    swal.fire('info', 'data berhasil di hapus', 'success');
                    window.location.reload(true);
                },
                error: function(data) {
                    swal.fire('data berhasil di tambahkan');

                }
            })
        }
    </script>

    <script src="{{ asset('/template/technext.github.io/electro/js/') }}/bootstrap.min.js"></script>
    <script src="{{ asset('/template/technext.github.io/electro/js/') }}/slick.min.js"></script>
    <script src="{{ asset('/template/technext.github.io/electro/js/') }}/nouislider.min.js"></script>
    <script src="{{ asset('/template/technext.github.io/electro/js/') }}/jquery.zoom.min.js"></script>
    <script src="{{ asset('/template/technext.github.io/electro/js/') }}/main.js"></script>


</body>

</html>
