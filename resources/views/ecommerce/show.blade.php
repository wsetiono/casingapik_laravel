@php use Illuminate\Support\Str; @endphp

@extends('layouts.ecommerce')

@section('title')
    <title>{{ $product->name }} - CasingApik</title>
@endsection

@section('content')

    <!-- Breadcrumb Section Begin -->
    <div class="breacrumb-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb-text product-more">
                        <a href="{{URL::to('/')}}"><i class="fa fa-home"></i> Home</a>
                        <span>{{ $product->name }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Section Begin -->

    <!-- Product Shop Section Begin -->
    <section class="product-shop spad page-details">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="product-pic-zoom">

                                <img class="product-big-img" src="{{ asset('ecommerce/products/' . $product->image) }}" alt="{{ $product->name }}">
                                <div class="zoom-icon">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                            </div>
                            <div class="product-thumbs">
                                <div class="product-thumbs-track ps-slider owl-carousel">
                                    {{-- <div class="pt active" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image) }}" alt="{{ $product->name }}"></div>
                                    <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image) }}" alt="{{ $product->name }}"></div>
                                    <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image) }}" alt="{{ $product->name }}"></div>
                                    <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image) }}" alt="{{ $product->name }}"></div> --}}

                                    {{-- <div class="pt active" data-imgbigurl="{{ asset('ecommerce/products/1597664170funpop-3.jpeg') }}"><img
                                            src="{{ asset('ecommerce/products/1597664170funpop-3.jpeg') }}" alt="{{ $product->name }}"></div>
                                    <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/1597664258case-airpod-1.jpeg') }}"><img
                                            src="{{ asset('ecommerce/products/1597664258case-airpod-1.jpeg') }}" alt="{{ $product->name }}"></div>
                                    <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/1597664298case-airpod-2.jpeg') }}"><img
                                            src="{{ asset('ecommerce/products/1597664298case-airpod-2.jpeg') }}" alt="{{ $product->name }}"></div>
                                    <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/1597664344case-airpod-3.jpeg') }}"><img
                                            src="{{ asset('ecommerce/products/1597664344case-airpod-3.jpeg') }}" alt="{{ $product->name }}"></div>
                                    <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/1597664042casing-3.jpeg') }}"><img
                                        src="{{ asset('ecommerce/products/1597664042casing-3.jpeg') }}" alt="{{ $product->name }}"></div> --}}

                                    @if ($product->image != null)    
                                        <div class="pt active" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image) }}" alt="{{ $product->name }}"></div>
                                    @endif       
                                        
                                    @if ($product->image2 != null)    
                                        <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image2) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image2) }}" alt="{{ $product->name }}"></div>
                                    @endif        

                                    @if ($product->image3 != null)    
                                        <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image3) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image3) }}" alt="{{ $product->name }}"></div>
                                    @endif        

                                    @if ($product->image4 != null)    
                                        <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image4) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image4) }}" alt="{{ $product->name }}"></div>
                                    @endif        

                                    @if ($product->image5 != null)    
                                        <div class="pt" data-imgbigurl="{{ asset('ecommerce/products/' . $product->image5) }}"><img
                                            src="{{ asset('ecommerce/products/' . $product->image5) }}" alt="{{ $product->name }}"></div>
                                    @endif        

                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="product-details">
                                <div class="pd-title">
                                    {{-- <span>oranges</span> --}}
                                    <h3>{{ $product->name }}</h3>
                                    <input type="hidden" value="{{ $imageCount }}" id="hidImageCount">
                                    {{-- <a href="#" class="heart-icon"><i class="icon_heart_alt"></i></a> --}}
                                </div>
                                {{-- <div class="pd-rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <span>(5)</span>
                                </div> --}}
                                <div class="pd-desc">
                                    <p>{!! $product->description !!}</p>
                                    <h4>Rp{{ number_format($product->price, 0) }}
                                    </h4>
                                </div>

                                @if($attribute != null)
                                    @foreach($attribute as $eachAttribute => $value)
                                        <div class="pd-size-choose">
                                            
                                            {{-- <h6>{{ $eachAttribute }}</h6> --}}
                                            <ul class="pd-tags">
                                                <li><span>{{ $eachAttribute }}</span></li>
                                            </ul>

                                            @if(Str::contains($eachAttribute, 'Warna'))

                                                <div class="pd-color-choose">

                                                    @foreach ($value as $val)
                                                        
                                                            @php
                                                                $color = "";
                                                            @endphp

                                                            @if($val->name == "Red")
                                                            
                                                                @php $color = "red"; @endphp
                                                                
                                                            @elseif($val->name == "White" || $val->name == "Jens Chrysan" || $val->name == "Chrysan and Dandelion" || $val->name == "Chrysan and Lilac")
                                                            
                                                                @php $color = "white"; @endphp
                                                                
                                                            @elseif($val->name == "Black")
                                                            
                                                                @php $color = "black"; @endphp

                                                            @elseif($val->name == "Blue")
                                                            
                                                                @php $color = "blue"; @endphp
                                                            
                                                            @elseif($val->name == "Green")
                                                            
                                                                @php $color = "green"; @endphp

                                                            @elseif($val->name == "Lavender")
                                                            
                                                                @php $color = "#bf94e4"; @endphp

                                                            @elseif($val->name == "Peach")
                                                            
                                                                @php $color = "#ffcba4"; @endphp

                                                            @elseif($val->name == "Transparent")
                                                            
                                                                @php $color = "#ced4d3"; @endphp

                                                            @elseif($val->name == "Midnight Green")
                                                            
                                                                @php $color = "#004953"; @endphp

                                                            @elseif($val->name == "Soft Blue")
                                                            
                                                                @php $color = "#add8e6"; @endphp

                                                            @elseif($val->name == "White Gel")
                                                            
                                                                @php $color = "white"; @endphp

                                                            @elseif($val->name == "Grey Gel")
                                                            
                                                                @php $color = "grey"; @endphp

                                                            @elseif($val->name == "Yellow")
                                                            
                                                                @php $color = "yellow"; @endphp

                                                            @elseif($val->name == "Greenmatcha")
                                                        
                                                                @php $color = "#91b500"; @endphp

                                                            @elseif($val->name == "Strawberry")

                                                                @php $color = "#fc5a8d"; @endphp

                                                            @elseif($val->name == "Chocolate")

                                                                @php $color = "#84563c"; @endphp

                                                            @elseif($val->name == "Colorway")

                                                                @php $color = "linear-gradient(to right, violet, white, blue);"; @endphp

                                                            @elseif($val->name == "Pink")
                                                            
                                                                @php $color = "pink"; @endphp

                                                            @elseif($val->name == "White Flower")
                                                            
                                                                @php $color = "white"; @endphp

                                                            @elseif($val->name == "Purple")
                                                            
                                                                @php $color = "purple"; @endphp

                                                            @elseif($val->name == "Mid Green")
                                                            
                                                                @php $color = "#4d8c57"; @endphp

                                                            @elseif($val->name == "Lavender Grey")
                                                            
                                                                @php $color = "#c6c5dc"; @endphp

                                                            @elseif($val->name == "Pink Sand")
                                                            
                                                                @php $color = "#e1c1b1"; @endphp

                                                            @elseif($val->name == "Avocado")
                                                            
                                                                @php $color = "#568203"; @endphp

                                                            @elseif($val->name == "Navy")
                                                            
                                                                @php $color = "#02075d"; @endphp

                                                            @elseif($val->name == "Classic")
                                                            
                                                                @php $color = "#745a43"; @endphp

                                                            @elseif($val->name == "Fuschia")
                                                            
                                                                @php $color = "#cc397b"; @endphp

                                                            @elseif($val->name == "Minnie" || $val->name == "Mickey" || $val->name == "Boy" || $val->name == "Girl")

                                                                @php $color = "linear-gradient(to right, black, red, white);"; @endphp

                                                            @elseif($val->name == "Mc Drink")

                                                                @php $color = "linear-gradient(to right, yellow, white, red);"; @endphp

                                                            @elseif($val->name == "Dingdong Blue")

                                                                @php $color = "linear-gradient(to right, blue, white, red);"; @endphp

                                                            @elseif($val->name == "Dingdong Orange")

                                                                @php $color = "linear-gradient(to right, orange, white, red);"; @endphp

                                                            @elseif($val->name == "Dark Grey")

                                                                @php $color = "#43464b"; @endphp

                                                            @elseif($val->name == "Dark Green")

                                                                @php $color = "#013220"; @endphp

                                                            @elseif($val->name == "Dark Blue")

                                                                @php $color = "#002366"; @endphp

                                                            @elseif($val->name == "Orange")

                                                                @php $color = "#ffa500"; @endphp

                                                            @elseif($val->name == "Light Pink")

                                                                @php $color = "#ffb6c1"; @endphp

                                                            @elseif($val->name == "Cream")

                                                                @php $color = "#edd2a4"; @endphp
                                                                
                                                            @elseif($val->name == "Light Grey")

                                                                @php $color = "#d3d3d3"; @endphp

                                                            @elseif($val->name == "Light Purple")

                                                                @php $color = "#cc99ff"; @endphp

                                                            @elseif($val->name == "Light Blue")

                                                                @php $color = "#b5d3e7"; @endphp

                                                            @elseif($val->name == "Sea Blue")

                                                                @php $color = "#006994"; @endphp

                                                            @elseif($val->name == "Light Red")

                                                                @php $color = "#ff6961"; @endphp

                                                            @elseif($val->name == "Light Pink 2")

                                                                @php $color = "#fda182"; @endphp

                                                            @elseif($val->name == "Shining Leopard")

                                                                @php $color = "linear-gradient(to right, pink, gold);"; @endphp

                                                            @elseif($val->name == "Label")

                                                                @php $color = "linear-gradient(to right, red, yellow, green, white);"; @endphp

                                                            @elseif($val->name == "Dahlia Brown")

                                                                @php $color = "linear-gradient(to right, pink, brown, white);"; @endphp

                                                            @elseif($val->name == "Turqoise")

                                                                @php $color = "#40E0D0"; @endphp
                                                                

                                                            @endif

                                                            <div class="sc-item">
                                                                <input type="radio" id="sm-size">
                                                                <label for="sm-size">

                                                                    <div style="display: inline-block; margin-right: 10px;">

                                                                        <input type="radio" id="" style="position: absolute; visibility: hidden;">
                                                                        <label for="cc-{{ $val->name }}" id="lblColor" class="cc-{{ $val->name }}" style="background: {{ $color }}; border-color: black; border-width: 1px; border-style: solid; height: 20px; width: 20px; border-radius: 50%; cursor: pointer; margin-bottom: 0"></label>
                                                                        
                                                                    </div>

                                                                    {{ $val->name }}
                                                                
                                                                </label>
                                                            </div>
                                                        
                                                    @endforeach

                                                </div>
                                            
                                            @else

                                                @foreach ($value as $val)

                                                    <div class="sc-item">
                                                        <input type="radio" id="sm-size">
                                                        <label for="sm-size">{{ $val->name }}</label>
                                                    </div>

                                                @endforeach

                                            @endif

                                        </div>
                                    @endforeach
                                @endif

                                <div class="pd-size-choose">
                                    <ul class="pd-tags">
                                        <li><span>CATEGORIES</span></li>
                                    </ul>

                                    <div class="sc-item">
                                        <input type="radio" id="sm-size">
                                        <label for="sm-size">{{ $product->category->name }}</label>
                                    </div>

                                </div>

                                {{-- <div class="pd-share">
                                    <div class="pd-social">
                                        <a href="#"><i class="ti-facebook"></i></a>
                                        <a href="#"><i class="ti-twitter-alt"></i></a>
                                        <a href="#"><i class="ti-linkedin"></i></a>
                                    </div>
                                </div> --}}
                                <div style="text-align: left">
                                    <a href="https://wa.me/6289651061361?text=HALLO!%20Selamat%20datang%20di%20@casingapik%0A%0ASEMUA%20case%20yang%20dijual%20READY%20STOCK%20dan%20SIAP%20DIPESAN%20yaa%20:)%0A%0AFORMAT%20PESANAN:%0ANama:%0ANo Hp:%0AAlamat :%0AKecamatan:%0AKota :%0AOrder:%20nama%20case%20/%20warna,%20motif%20/%20tipe%20hp%0A%0ACHECK%20KOLEKSI%20DI%20INSTAGRAM:%20@casingapik%0A%0APengiriman:%0ASENIN-JUMAT%20(closed%20order:%2015:00)%0ASABTU%20:%2013:00)%0ALayanan%20chat:%2010:00%20-%2020:00"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png" style="width: 30%; display: block; margin-left: auto; margin-right: auto;"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="product-tab">
                        <div class="tab-item" style="border-bottom: 1px solid #ebebeb;">
                            <ul class="nav" role="tablist">
                                <li>
                                    <a class="active" data-toggle="tab" href="#tab-1" role="tab">DESCRIPTION</a>
                                </li>
                            </ul>
                        </div>
                        <div class="tab-item-content">
                            <div class="tab-content">
                                <div class="tab-pane fade-in active" id="tab-1" role="tabpanel">
                                    <div class="product-content">
                                        <div class="row">
                                            <div class="col-lg-7">
                                                {!! $product->description !!}
                                            </div>
                                            <div class="col-lg-5">
                                                <img src="img/product-single/tab-desc.jpg" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-2" role="tabpanel">
                                    <div class="specification-table">
                                        <table>
                                            <tr>
                                                <td class="p-catagory">Customer Rating</td>
                                                <td>
                                                    <div class="pd-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                        <span>(5)</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Price</td>
                                                <td>
                                                    <div class="p-price">$495.00</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Add To Cart</td>
                                                <td>
                                                    <div class="cart-add">+ add to cart</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Availability</td>
                                                <td>
                                                    <div class="p-stock">22 in stock</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Weight</td>
                                                <td>
                                                    <div class="p-weight">1,3kg</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Size</td>
                                                <td>
                                                    <div class="p-size">Xxl</div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Color</td>
                                                <td><span class="cs-color"></span></td>
                                            </tr>
                                            <tr>
                                                <td class="p-catagory">Sku</td>
                                                <td>
                                                    <div class="p-code">00012</div>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="tab-3" role="tabpanel">
                                    <div class="customer-review-option">
                                        <h4>2 Comments</h4>
                                        <div class="comment-option">
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-1.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Brandon Kelley <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                            <div class="co-item">
                                                <div class="avatar-pic">
                                                    <img src="img/product-single/avatar-2.png" alt="">
                                                </div>
                                                <div class="avatar-text">
                                                    <div class="at-rating">
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star"></i>
                                                        <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <h5>Roy Banks <span>27 Aug 2019</span></h5>
                                                    <div class="at-reply">Nice !</div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="personal-rating">
                                            <h6>Your Ratind</h6>
                                            <div class="rating">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star-o"></i>
                                            </div>
                                        </div>
                                        <div class="leave-comment">
                                            <h4>Leave A Comment</h4>
                                            <form action="#" class="comment-form">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Name">
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <input type="text" placeholder="Email">
                                                    </div>
                                                    <div class="col-lg-12">
                                                        <textarea placeholder="Messages"></textarea>
                                                        <button type="submit" class="site-btn">Send message</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </section>
    <!-- Product Shop Section End -->

    <!-- Related Products Section End -->
    <div class="related-products spad2">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Anda Mungkin Juga Menyukai</h2>
                    </div>
                </div>
            </div>
            
            <div class="row">

                <div class="product-slider owl-carousel">

                    
                    {{-- <div class="product-item">
                        <div class="pi-pic">
                            <img src="http://localhost/casingapik/public/ecommerce/products/1597916764casing-4-1.jpeg" alt="">
                            <div class="sale">Sale</div>
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Coat</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $14.00
                                <span>$35.00</span>
                            </div>
                        </div>
                    </div>
                
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="http://localhost/casingapik/public/ecommerce/products/1597916764casing-4-1.jpeg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Shoes</div>
                            <a href="#">
                                <h5>Guangzhou sweater</h5>
                            </a>
                            <div class="product-price">
                                $13.00
                            </div>
                        </div>
                    </div>
               
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="http://localhost/casingapik/public/ecommerce/products/1597916764casing-4-1.jpeg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Pure Pineapple</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div>
               
                    <div class="product-item">
                        <div class="pi-pic">
                            <img src="http://localhost/casingapik/public/ecommerce/products/1597916764casing-4-1.jpeg" alt="">
                            <div class="icon">
                                <i class="icon_heart_alt"></i>
                            </div>
                            <ul>
                                <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                <li class="quick-view"><a href="#">+ Quick View</a></li>
                                <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                            </ul>
                        </div>
                        <div class="pi-text">
                            <div class="catagory-name">Towel</div>
                            <a href="#">
                                <h5>Converse Shoes</h5>
                            </a>
                            <div class="product-price">
                                $34.00
                            </div>
                        </div>
                    </div> --}}

                    @foreach($relatedProduct as $eachRelatedProduct)

                        <div class="product-item">
                            <div class="pi-pic">
                                {{-- <img src="http://localhost/casingapik/public/ecommerce/products/1597916764casing-4-1.jpeg" alt=""> --}}
								<a href="{{ url('/product/' . $eachRelatedProduct->slug) }}"><img src="{{ asset('ecommerce/products/' . $eachRelatedProduct->image) }}" alt="{{ $eachRelatedProduct->name }}" width="264px" height="264px"><a href="{{ url('/product/' . $eachRelatedProduct->slug) }}">
                                {{-- 
                                <div class="icon">
                                    <i class="icon_heart_alt"></i>
                                </div>
                                <ul>
                                    <li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
                                    <li class="quick-view"><a href="#">+ Quick View</a></li>
                                    <li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
                                </ul> --}}
                            </div>
                            <div class="pi-text">
                                {{-- <div class="catagory-name">Towel</div> --}}
                                <a href="{{ url('/product/' . $eachRelatedProduct->slug) }}">
                                    <h5>{{ $eachRelatedProduct->name }}</h5>
                                </a>
                                <div class="product-price">
                                    Rp{{ number_format($eachRelatedProduct->price, 0) }}
                                </div>
                                <div style="text-align: center">
                                    <a href="https://wa.me/6289651061361?text=HALLO!%20Selamat%20datang%20di%20@casingapik%0A%0ASEMUA%20case%20yang%20dijual%20READY%20STOCK%20dan%20SIAP%20DIPESAN%20yaa%20:)%0A%0AFORMAT%20PESANAN:%0ANama:%0ANo Hp:%0AAlamat :%0AKecamatan:%0AKota :%0AOrder:%20nama%20case%20/%20warna,%20motif%20/%20tipe%20hp%0A%0ACHECK%20KOLEKSI%20DI%20INSTAGRAM:%20@casingapik%0A%0APengiriman:%0ASENIN-JUMAT%20(closed%20order:%2015:00)%0ASABTU%20:%2013:00)%0ALayanan%20chat:%2010:00%20-%2020:00"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png" style="width: 50%; display: block; margin-left: auto; margin-right: auto;"></a>
                                </div>
                            </div>
                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    </div>
    <!-- Related Products Section End -->


@endsection

@section('js')
    <script>
        $(document).ready(function(){

            //var imageCount = 5;
            var imageCount = parseInt($("#hidImageCount").val());

            $(".ps-slider").owlCarousel({
                loop: false,
                margin: 10,
                nav: true,
                items: imageCount,
                dots: false,
                navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>'],
                smartSpeed: 1200,
                autoHeight: false,
                autoplay: true,
            });
        });
    </script>
@endsection
