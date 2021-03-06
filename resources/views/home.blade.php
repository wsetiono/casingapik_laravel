<!-- FUNGSI EXTENDS DIGUNAKAN UNTUK ME-LOAD MASTER LAYOUTS YANG ADA, KARENA INI ADALAH HALAMAN HOME MAKA KITA ME-LOAD LAYOUTS ADMIN.BLADE.PHP -->
<!-- KETIKA MELOAD FILE BLADE, MAKA EKSTENSI .BLADE.PHP TIDAK PERLU DITULISKAN -->
@extends('layouts.admin')

<!-- TAG YANG DIAPIT OLEH SECTION('TITLE') AKAN ME-REPLACE @YIELD('TITLE') PADA MASTER LAYOUTS -->
@section('title')
    <title>Dashboard</title>
@endsection

<!-- TAG YANG DIAPIT OLEH SECTION('CONTENT') AKAN ME-REPLACE @YIELD('CONTENT') PADA MASTER LAYOUTS -->
@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Dashboard</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Dashboard Casing Apik</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="callout callout-info">
                                        <a href="{{ route('category.index') }}">
                                            <small class="text-muted" style="font-size: 50px;">Kategori</small>
                                        </a>
                                        <br>
                                        {{-- <strong class="h4">Rp 0</strong> --}}
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="callout callout-danger">
                                        <a href="{{ route('attributes.index') }}">
                                            <small class="text-muted" style="font-size: 50px;">Attribute</small>
                                        </a>
                                        <br>
                                        {{-- <strong class="h4">0</strong> --}}
                                    </div>
                                </div>
                                {{-- <div class="col-md-3">
                                    <div class="callout callout-primary">
                                        <small class="text-muted">Perlu Dikirim</small>
                                        <br>
                                        <strong class="h4">0</strong>
                                    </div>
                                </div> --}}
                                <div class="col-md-3">
                                    <div class="callout callout-success">
                                        <a href="{{ route('product.index') }}">
                                            <small class="text-muted" style="font-size: 50px;">Produk</small>
                                        </a>
                                        <br>
                                        {{-- <strong class="h4">0</strong> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection