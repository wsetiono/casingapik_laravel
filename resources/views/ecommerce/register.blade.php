@extends('layouts.ecommerce')

@section('title')
    <title>Login - DW Ecommerce</title>
@endsection

@section('content')
    <!--================Home Banner Area =================-->
	<section class="banner_area">
		<div class="banner_inner d-flex align-items-center">
			<div class="container">
				<div class="banner_content text-center">
					<h2>Login/Register</h2>
					<div class="page_link">
                        <a href="{{ url('/') }}">Home</a>
                        <a href="{{ route('customer.login') }}">Login</a>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!--================End Home Banner Area =================-->

	<!--================Login Box Area =================-->
	<section class="login_box_area p_120">
		<div class="container">
			<div class="row">
				<div class="offset-md-3 col-lg-6">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

					<div class="login_form_inner">
						<h3>Register</h3>
						<form class="row login_form" action="{{ route('customer.post_register') }}" method="post" id="contactForm" novalidate="novalidate">
							@csrf
							<div class="col-md-12 form-group">
								<label for="email">Email:</label>
								<input type="email" class="form-control" id="email" name="email" placeholder="">
                            </div>
                            <div class="col-md-12 form-group">
								<label for="fullname">Nama Lengkap:</label>
								<input type="text" class="form-control" id="fullname" name="fullname" placeholder="">
                            </div>
                            <div class="col-md-12 form-group">
								<label for="telephone">No Telp:</label>
								<input type="text" class="form-control" id="password" name="telephone" placeholder="">
							</div>
							<div class="col-md-12 form-group">
								<label for="password">Password:</label>
								<input type="password" class="form-control" id="password" name="password" placeholder="">
                            </div>
                            <div class="col-md-12 form-group">
								<label for="confirmpassword">Konfirmasi Password:</label>
								<input type="password" class="form-control" id="confirmpassword" name="confirmpassword" placeholder="">
							</div>
							<div class="col-md-12 form-group">
								<button type="submit" value="submit" class="btn submit_btn">Register</button>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
