@extends('layouts.templatepublic')

@section('content')

    <!-- row -->
    <div class="row">
        <div class="col-md-12">
            <div class="section-title">
                <h3 class="title">Cata Pembelan</h3>
                <hr />
            </div>
        </div>
        <!-- /section title -->

        <!-- Products tab & slick -->
        <div class="col-md-12">
            <div class="row">
                {!! $cara_beli !!}
            </div>
        </div>
    </div>

@endsection
