@extends('layouts.ecommerce')

@section('title')
    
    <title>Hasil Pencarian - {{ $keyword }} - CasingApik</title>
        
@endsection

@section('content')
    
        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a>
                            <span>Hasil Pencarian : {{ $keyword }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb Section Begin -->
    
        <!-- Product Shop Section Begin -->
        <section class="product-shop spad">
            <div class="container">
                <div class="row">
                    
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div class="product-show-option">
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                </div>
                                <div class="col-lg-5 col-md-5 text-right">
                                    <p>Show 1 - <span id="productItemCountPerPage"></span> Of {{ $products_count }} Product</p>
                                </div>
                            </div>
                        </div>
                        <div class="product-list">
                            <div class="row">

                                @foreach($products as $eachProduct)

                                    <div class="col-lg-3 col-sm-6">
                                        <div class="product-item">
                                            <div class="pi-pic">
                                                <a href="{{ url('/product/' . $eachProduct->slug) }}">
                                                    <img src="{{ asset('ecommerce/products/' . $eachProduct->image) }}" alt="">
                                                </a>
                                                <div class="sale pp-sale">Sale</div>
                                            </div>
                                            <div class="pi-text">
                                                {{-- <div class="catagory-name">Towel</div> --}}
                                                <a href="#">
                                                    <a href="{{ url('/product/' . $eachProduct->slug) }}">
                                                        <h5>{{ $eachProduct->name }}</h5>
                                                    </a>
                                                </a>
                                                <div class="product-price">
                                                    Rp{{ number_format($eachProduct->price, 0) }}
                                                </div>
                                                <div style="text-align: center">
                                                    <a href="https://wa.me/6289651061361?text=HALLO!%20Selamat%20datang%20di%20@casingapik%0A%0ASEMUA%20case%20yang%20dijual%20READY%20STOCK%20dan%20SIAP%20DIPESAN%20yaa%20:)%0A%0AFORMAT%20PESANAN:%0ANama:%0ANo Hp:%0AAlamat :%0AKecamatan:%0AKota :%0AOrder:%20nama%20case%20/%20warna,%20motif%20/%20tipe%20hp%0A%0ACHECK%20KOLEKSI%20DI%20INSTAGRAM:%20@casingapik%0A%0APengiriman:%0ASENIN-JUMAT%20(closed%20order:%2015:00)%0ASABTU%20:%2013:00)%0ALayanan%20chat:%2010:00%20-%2020:00"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png" style="width: 50%; display: block; margin-left: auto; margin-right: auto;"></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                @endforeach

                            </div>
                        </div>

                        {{-- {!! $products->links() !!} --}}
                        {!! $products->appends(array('keyword' => $keyword))->links() !!}

                    </div>
                </div>
            </div>
        </section>
        <!-- Product Shop Section End -->

@endsection