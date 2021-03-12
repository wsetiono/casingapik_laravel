@extends('layouts.ecommerce')

@section('title')
    @if($attribute_options_name != null)
        <title>{{ $category_name }} - {{ $attribute_options_name }} - CasingApik</title>
    @else
        <title>{{ $category_name }} - CasingApik</title>
    @endif
        
@endsection

@section('content')
    
        <input type="hidden" id="hidCategorySlug" value="{{ $category_slug }}">
        <input type="hidden" id="hidAttributeOptionsSlug" value="{{ $attribute_options_slug }}">

        <!-- Breadcrumb Section Begin -->
        <div class="breacrumb-section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="breadcrumb-text">
                            <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a>
                            {{-- <span>{{ $category_name }} - {{ $attribute_options_name }}</span> --}}
                            @if($attribute_options_name != null)
                                <span>{{ $category_name }} - {{ $attribute_options_name }}</span>
                            @else
                                <span>{{ $category_name }}</span>
                            @endif
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
                    {{-- <div class="col-lg-3 col-md-6 col-sm-8 order-2 order-lg-1 produts-sidebar-filter">
                        <div class="filter-widget">
                            <h4 class="fw-title">Categories</h4>
                            <ul class="filter-catagories">
                                <li><a href="#">Men</a></li>
                                <li><a href="#">Women</a></li>
                                <li><a href="#">Kids</a></li>
                            </ul>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Brand</h4>
                            <div class="fw-brand-check">
                                <div class="bc-item">
                                    <label for="bc-calvin">
                                        Calvin Klein
                                        <input type="checkbox" id="bc-calvin">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-diesel">
                                        Diesel
                                        <input type="checkbox" id="bc-diesel">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-polo">
                                        Polo
                                        <input type="checkbox" id="bc-polo">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="bc-item">
                                    <label for="bc-tommy">
                                        Tommy Hilfiger
                                        <input type="checkbox" id="bc-tommy">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Price</h4>
                            <div class="filter-range-wrap">
                                <div class="range-slider">
                                    <div class="price-input">
                                        <input type="text" id="minamount">
                                        <input type="text" id="maxamount">
                                    </div>
                                </div>
                                <div class="price-range ui-slider ui-corner-all ui-slider-horizontal ui-widget ui-widget-content"
                                    data-min="33" data-max="98">
                                    <div class="ui-slider-range ui-corner-all ui-widget-header"></div>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                    <span tabindex="0" class="ui-slider-handle ui-corner-all ui-state-default"></span>
                                </div>
                            </div>
                            <a href="#" class="filter-btn">Filter</a>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Color</h4>
                            <div class="fw-color-choose">
                                <div class="cs-item">
                                    <input type="radio" id="cs-black">
                                    <label class="cs-black" for="cs-black">Black</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-violet">
                                    <label class="cs-violet" for="cs-violet">Violet</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-blue">
                                    <label class="cs-blue" for="cs-blue">Blue</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-yellow">
                                    <label class="cs-yellow" for="cs-yellow">Yellow</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-red">
                                    <label class="cs-red" for="cs-red">Red</label>
                                </div>
                                <div class="cs-item">
                                    <input type="radio" id="cs-green">
                                    <label class="cs-green" for="cs-green">Green</label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Size</h4>
                            <div class="fw-size-choose">
                                <div class="sc-item">
                                    <input type="radio" id="s-size">
                                    <label for="s-size">s</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="m-size">
                                    <label for="m-size">m</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="l-size">
                                    <label for="l-size">l</label>
                                </div>
                                <div class="sc-item">
                                    <input type="radio" id="xs-size">
                                    <label for="xs-size">xs</label>
                                </div>
                            </div>
                        </div>
                        <div class="filter-widget">
                            <h4 class="fw-title">Tags</h4>
                            <div class="fw-tags">
                                <a href="#">Towel</a>
                                <a href="#">Shoes</a>
                                <a href="#">Coat</a>
                                <a href="#">Dresses</a>
                                <a href="#">Trousers</a>
                                <a href="#">Men's hats</a>
                                <a href="#">Backpack</a>
                            </div>
                        </div>
                    </div> --}}
                    <div class="col-lg-12 order-1 order-lg-2">
                        <div class="product-show-option">
                            <div class="row">
                                <div class="col-lg-7 col-md-7">
                                    <div class="select-option">
                                        <div style="margin-top: 8px; font-size: 16px;">Sort By</div>
                                        &nbsp;&nbsp;
                                        <select class="sorting">
                                            <option value="newest">Newest</option>
                                            <option value="price-ascending">Price Ascending</option>
                                            <option value="price-descending">Price Descending</option>
                                        </select>
                                    </div>
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
                                                <a href="{{ url('/product/' . $eachProduct->slug) }}">
                                                    <h5>{{ $eachProduct->name }}</h5>
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

                        {!! $products->appends(array('sortBy' => $sortBy, 'category' => $category_slug, 'attribute_options' => $attribute_options_slug ))->links() !!}

                    </div>
                </div>
            </div>
        </section>
        <!-- Product Shop Section End -->

@endsection