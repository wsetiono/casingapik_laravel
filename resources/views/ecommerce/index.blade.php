@extends('layouts.ecommerce')

@section('title')
    <title>Case iPhone Premium, Aksesoris iPhone | Casing Apik</title>
@endsection

@section('content')

	<!-- Hero Section Begin -->
	<section class="hero-section">
		<div class="hero-items owl-carousel">
			<div class="single-hero-items set-bg" data-setbg="{{ asset('ecommerce/img/hero-1.jpg') }}">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							<h1>Best Seller AirPod Case of the Month</h1>
							<p>Silakan Pilih Desain AirPod Case yang paling sesuai dengan gaya hidup anda. Desain yang kami hadirkan akan selalu kami update sehingga anda nyaman untuk selalu tampil trendi dengan desain terbaru kami.</p>
							<a href="collections?sortBy=newest&category=case-airpod" class="primary-btn">Shop Now</a>
						</div>
					</div>
					<div class="off-card">
						<a href="collections?sortBy=newest&category=case-airpod"><h2>Shop <span>Now</span></h2></a>
					</div>
				</div>
			</div>
			<div class="single-hero-items set-bg" data-setbg="{{ asset('ecommerce/img/hero-2.jpg') }}">
				<div class="container">
					<div class="row">
						<div class="col-lg-5">
							{{-- <span>Bag,kids</span> --}}
							<h1>Best Seller iPhone Case of the Month</h1>
							<p>Sesuaikan Warna dan Gaya Anda Dengan Case iPhone pilihan anda. Kami menghadirkan desain premium case yang selalu update dan menarik sesuai gaya hidup anda.</p>
							<a href="collections?sortBy=newest&category=case-iphone" class="primary-btn">Shop Now</a>
						</div>
					</div>
					<div class="off-card">
						<a href="collections?sortBy=newest&category=case-iphone"><h2>Shop <span>Now</span></h2></a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Hero Section End -->

 <!-- Instagram Section Begin -->
 <div class="container">
	<div class="row">
		<div class="col-lg-12">
			<div class="section-title">
				<h2>Selebgram Testimonial</h2>
			</div>
		</div>
	</div>
	<div class="instagram-photo">
		<div class="insta-item set-bg" data-setbg="{{ asset('ecommerce/img/insta-1.jpg') }}">
			<div class="inside-text">
				<a href="https://www.instagram.com/stories/highlights/17860457569661384/"><i class="ti-instagram"></i></a>
				<h5><a href="https://www.instagram.com/stories/highlights/17860457569661384/">Review Selebgram Amanda Kohar</a></h5>
			</div>
		</div>
		<div class="insta-item set-bg" data-setbg="{{ asset('ecommerce/img/insta-4.jpg') }}">
			<div class="inside-text">
				<a href="https://www.instagram.com/stories/highlights/17851155133505714/"><i class="ti-instagram"></i></a>
				<h5><a href="https://www.instagram.com/stories/highlights/17851155133505714/">Review Selebgram</a></h5>
			</div>
		</div>
		<div class="insta-item set-bg" data-setbg="{{ asset('ecommerce/img/insta-2.jpg') }}">
			<div class="inside-text">
				<a href="https://www.instagram.com/stories/highlights/18106810444089261/"><i class="ti-instagram"></i></a>
				<h5><a href="https://www.instagram.com/stories/highlights/18106810444089261/">Testimoni Customer</a></h5>
			</div>
		</div>
		<div class="insta-item set-bg" data-setbg="{{ asset('ecommerce/img/insta-3.jpg') }}">
			<div class="inside-text">
				<a href="https://www.instagram.com/stories/highlights/17848490347258506/"><i class="ti-instagram"></i></a>
				<h5><a href="https://www.instagram.com/stories/highlights/17848490347258506/">Testimoni Customer 2</a></h5>
			</div>
		</div>
		<div class="insta-item set-bg" data-setbg="{{ asset('ecommerce/img/insta-5.jpg') }}">
			<div class="inside-text">
				<a href="https://www.instagram.com/stories/highlights/17861542585915695/"><i class="ti-instagram"></i></a>
				<h5><a href="https://www.instagram.com/stories/highlights/17861542585915695/">Best Seller Product</a></h5>
			</div>
		</div>
		<div class="insta-item set-bg" data-setbg="{{ asset('ecommerce/img/insta-6.jpg') }}">
			<div class="inside-text">
				<a href="https://www.instagram.com/stories/highlights/17887742869556389/"><i class="ti-instagram"></i></a>
				<h5><a href="https://www.instagram.com/stories/highlights/17887742869556389/">Review Product</a></h5>
			</div>
		</div>
	</div>
</div>
<!-- Instagram Section End -->

	 <!-- Banner Section Begin -->
	 <div class="banner-section spad">
        <div class="container-fluid">
            <div class="row">
				
				<!-- PROSES LOOPING DATA KATEGORI -->
				@foreach ($categories as $category)
					<!-- JIKA CHILDNYA ADA, MAKA KATEGORI INI AKAN MENG-EXPAND DATA DIBAWAHNYA -->
					{{-- <a href="{{ $category->child_count > 0 ? '#':url('/category/' . $category->slug) }}">{{ $category->name }}</a> --}}
					
					<div class="col-lg-2">
						<div class="single-banner">
							<img src="{{ asset('ecommerce/categories/' . $category->image) }}" alt="{{ $category->name }}" width="305px" height="305px">

							<div class="inner-text">

								{{-- <h4 style="color: white; font-weight: 900px"><a style="color: inherit; background-color: black; opacity: 0.6;" href="{{ $category->child_count > 0 ? '#':url('/category/' . $category->slug) }}">{{ $category->name }}</a></h4> --}}
								{{-- <h4 style="font-size: 23px; color: white; background: black; opacity: 0.6;"><a style="color: inherit;" href="{{ $category->child_count > 0 ? '#':url('/category/' . $category->slug) }}">{{ $category->name }}</a></h4> --}}
                                <h4 style="font-size: 23px; color: white; background: black; opacity: 0.6;"><a style="color: inherit;" href="collections?sortBy=newest&category={{ $category->slug }}">{{ $category->name }}</a></h4>                                                        

							</div>
						</div>
					</div> 

					  <!-- PROSES LOOPING DATA CHILD KATEGORI -->
					{{-- @foreach ($category->child as $child)
					<ul class="list">
						<li>
							<a href="{{ url('/category/' . $child->slug) }}">{{ $child->name }}</a>
						</li>
					</ul>
					@endforeach --}}
				@endforeach

            </div>
        </div>
    </div>
    <!-- Banner Section End -->

	<!--Banner Category-->
	@php
		$counter = 0;
	@endphp
	@foreach ($categories as $category)

		@if($counter % 2 == 0)         
			<section class="women-banner spad">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
								<div class="product-large set-bg" data-setbg="{{ asset('ecommerce/categories/' . $category->image) }}" width="327px" height="620px">
								<h2><a style="font-size: 46px; color: white; background: black; opacity: 0.6;" href="collections?sortBy=newest&category={{ $category->slug }}">{{ $category->name }}</a></h2>
                                <a style="font-size: 23px; color: white; background: black; opacity: 0.6;" href="collections?sortBy=newest&category={{ $category->slug }}">Discover More</a>
							</div>
						</div>
						<div class="col-lg-8 col-lg-offset-1">
							<div class="filter-control">
								<ul>
                                    <li class="active" style="font-size: 35px;"><a href="collections?sortBy=newest&category={{ $category->slug }}">{{ $category->name }}</a></li>
								</ul>
							</div>
                            <div class="product-slider owl-carousel">

								<!--start of loop through product with that category-->

								@php
									$productsByCurrentCategory = App\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
								@endphp

								@foreach ($productsByCurrentCategory as $eachProduct) 

									<div class="product-item">
										<div class="pi-pic">
                                            <a href="{{ url('/product/' . $eachProduct->slug) }}">
											    <img src="{{ asset('ecommerce/products/' . $eachProduct->image) }}" alt="{{ $eachProduct->name }}" width="264px" height="264px">
                                            </a>

											<div class="sale">Sale</div>
											{{-- <div class="icon">
												<i class="icon_heart_alt"></i>
											</div>
											<ul>
												<li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
												<li class="quick-view"><a href="#">+ Quick View</a></li>
												<li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
											</ul> --}}
										</div>
										<div class="pi-text">
                                            {{-- <div class="catagory-name">{{ $eachProduct->category->name }}</div> --}}
                                            
                                            <a href="{{ url('/product/' . $eachProduct->slug) }}">
											    <h5>{{ $eachProduct->name }}</h5>
											</a>
											<div class="product-price">
                                                Rp{{ number_format($eachProduct->price, 0) }}
											</div>
											<div style="text-align: center">
												<a href="https://wa.widget.web.id/12d644" target="_blank"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png" style="width: 50%; display: block; margin-left: auto; margin-right: auto;"></a>
											</div>

										</div>
									</div><!--product item-->

								@endforeach

								<!--end of loop through product with that category-->

							</div><!--product slider-->
						</div>
					</div>
				</div>
			</section>        
		@else

			<section class="women-banner2 spad">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-3">
								<div class="product-large set-bg" data-setbg="{{ asset('ecommerce/categories/' . $category->image) }}" width="327px" height="620px">
								<h2><a style="font-size: 46px; color: white; background: black; opacity: 0.6;" href="collections?sortBy=newest&category={{ $category->slug }}">{{ $category->name }}</a></h2>
								<a style="font-size: 23px; color: white; background: black; opacity: 0.6;" href="collections?sortBy=newest&category={{ $category->slug }}">Discover More</a>
							</div>
						</div>
						<div class="col-lg-8 col-lg-offset-1">
							<div class="filter-control">
								<ul>
									<li class="active" style="font-size: 35px;"><a href="collections?sortBy=newest&category={{ $category->slug }}">{{ $category->name }}</a></li>
								</ul>
							</div>
							<div class="product-slider owl-carousel">

								<!--start of loop through product with that category-->

								@php
									$productsByCurrentCategory = App\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
								@endphp

								@foreach ($productsByCurrentCategory as $eachProduct) 

									<div class="product-item">
										<div class="pi-pic">
											<a href="{{ url('/product/' . $eachProduct->slug) }}">
												<img src="{{ asset('ecommerce/products/' . $eachProduct->image) }}" alt="{{ $eachProduct->name }}" width="264px" height="264px">
											</a>

											<div class="sale">Sale</div>
											{{-- <div class="icon">
												<i class="icon_heart_alt"></i>
											</div>
											<ul>
												<li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
												<li class="quick-view"><a href="#">+ Quick View</a></li>
												<li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
											</ul> --}}
										</div>
										<div class="pi-text">
											{{-- <div class="catagory-name">{{ $eachProduct->category->name }}</div> --}}
											
											<a href="{{ url('/product/' . $eachProduct->slug) }}">
												<h5>{{ $eachProduct->name }}</h5>
											</a>
											<div class="product-price">
												Rp{{ number_format($eachProduct->price, 0) }}
											</div>
											<div style="text-align: center">
												<a href="https://wa.widget.web.id/12d644" target="_blank"><img src="https://wa.widget.web.id/assets/img/tombol-wa.png" style="width: 50%; display: block; margin-left: auto; margin-right: auto;"></a>
											</div>

										</div>
									</div><!--product item-->

								@endforeach

								<!--end of loop through product with that category-->

							</div><!--product slider-->
						</div>
					</div>
				</div>
			</section>

			<section class="man-banner spad">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-8">
							<div class="filter-control">
								<ul>
									{{-- <li class="active">Clothings</li>
									<li>HandBag</li>
									<li>Shoes</li>
                                    <li>Accessories</li> --}}
                                    <li class="active" style="font-size: 35px;"><a href="collections?sortBy=newest&category={{ $category->slug }}">{{ $category->name }}</a></li>
								</ul>
							</div>
							<div class="product-slider owl-carousel">

								<!--start of loop through product with that category-->

								@php
									$productsByCurrentCategory = App\Product::where('category_id', $category->id)->orderBy('id', 'DESC')->get();
								@endphp

								@foreach ($productsByCurrentCategory as $eachProduct) 

									<div class="product-item">
										<div class="pi-pic">
											<a href="{{ url('/product/' . $eachProduct->slug) }}">
											    <img src="{{ asset('ecommerce/products/' . $eachProduct->image) }}" alt="{{ $eachProduct->name }}" width="264px" height="264px">
                                            </a>
											<div class="sale">Sale</div>
											{{-- <div class="icon">
												<i class="icon_heart_alt"></i>
											</div>
											<ul>
												<li class="w-icon active"><a href="#"><i class="icon_bag_alt"></i></a></li>
												<li class="quick-view"><a href="#">+ Quick View</a></li>
												<li class="w-icon"><a href="#"><i class="fa fa-random"></i></a></li>
											</ul> --}}
										</div>
										<div class="pi-text">
											<a href="#">
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
								
								@endforeach

								<!--end of loop through product with that category-->

							</div>
						</div>
						<div class="col-lg-3 col-lg-offset-1">
							<div class="product-large set-bg" data-setbg="{{ asset('ecommerce/categories/' . $category->image) }}" width="327px" height="620px">
								<h2><a style="font-size: 46px; color: white; background: black; opacity: 0.6;" href="collections?sortBy=newest&category={{ $category->slug }}">{{ $category->name }}</a></h2>
                                <a style="font-size: 23px; color: white; background: black; opacity: 0.6;" href="collections?sortBy=newest&category={{ $category->slug }}">Discover More</a>
							</div>
						</div>
					</div>
				</div>
			</section>        
		@endif

		
		@php
			$counter++;
		@endphp
	@endforeach
	<!--Banner Category-->

    <!-- Deal Of The Week Section Begin-->
    {{-- <section class="deal-of-week set-bg spad" data-setbg="{{ asset('ecommerce/img/time-bg.jpg') }}">
        <div class="container">
            <div class="col-lg-6 text-center">
                <div class="section-title">
                    <h2>Deal Of The Week</h2>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed<br /> do ipsum dolor sit amet,
                        consectetur adipisicing elit </p>
                    <div class="product-price">
                        $35.00
                        <span>/ HanBag</span>
                    </div>
                </div>
                <div class="countdown-timer" id="countdown">
                    <div class="cd-item">
                        <span>56</span>
                        <p>Days</p>
                    </div>
                    <div class="cd-item">
                        <span>12</span>
                        <p>Hrs</p>
                    </div>
                    <div class="cd-item">
                        <span>40</span>
                        <p>Mins</p>
                    </div>
                    <div class="cd-item">
                        <span>52</span>
                        <p>Secs</p>
                    </div>
                </div>
                <a href="#" class="primary-btn">Shop Now</a>
            </div>
        </div>
    </section> --}}
    <!-- Deal Of The Week Section End -->

   

    <!-- Latest Blog Section Begin -->
    <section class="latest-blog spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Real User Testimonial</h2>
                    </div>
                </div>
            </div>
            
            {{-- <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.44.08.jpeg">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.44.07.jpeg">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.44.06.jpeg">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.44.09.jpeg">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.45.11.jpeg">
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-blog">
                        <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.45.24.jpeg">
                    </div>
                </div>
            </div> --}}

            <div class="spad3">
                <div class="container">
                    <div class="row">
                <div class="product-slider owl-carousel">

                    <div class="product-item testi">
                        <div class="pi-pic">
                            <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.44.06.jpeg" alt="{{ $eachProduct->name }}" width="264px" height="264px">
                        </div>
                    </div><!--product item-->

                    <div class="product-item testi">
                        <div class="pi-pic">
                            <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.44.07.jpeg" alt="{{ $eachProduct->name }}" width="264px" height="264px">
                        </div>
                        
                    </div><!--product item-->

                    <div class="product-item testi">
                        <div class="pi-pic">
                            <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.44.08.jpeg" alt="{{ $eachProduct->name }}" width="264px" height="264px">
                        </div>
                    </div><!--product item-->

                    <div class="product-item testi">
                        <div class="pi-pic">
                            <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.44.09.jpeg" alt="{{ $eachProduct->name }}" width="264px" height="264px">
                        </div>
					</div><!--product item-->
					
					<div class="product-item testi">
                        <div class="pi-pic">
                            <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.45.11.jpeg" alt="{{ $eachProduct->name }}" width="264px" height="264px">
                        </div>
					</div><!--product item-->
					
					<div class="product-item testi">
                        <div class="pi-pic">
                            <img src="ecommerce/testimoni/WhatsApp Image 2020-08-23 at 08.45.24.jpeg" alt="{{ $eachProduct->name }}" width="264px" height="264px">
                        </div>
                    </div><!--product item-->
                
                </div><!--product slider-->
                    </div>
                </div>
            </div>
            
        </div>
    </section>
    <!-- Latest Blog Section End -->


@endsection