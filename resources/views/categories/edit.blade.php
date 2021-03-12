@extends('layouts.admin')

@section('title')
    <title>Edit Kategori</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Edit Kategori</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Kategori</h4>
                        </div>
                        <div class="card-body">
                          	<!-- ROUTINGNYA MENGIRIMKAN ID CATEGORY YANG AKAN DIEDIT -->
                            <form action="{{ route('category.update', $category->id) }}" method="post" enctype="multipart/form-data" >
                                @csrf
                                @method('PUT')
                                 
                                <div class="form-group">
                                    <label for="name">Kategori</label>
                                    <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="parent_id">Kategori</label>
                                    <select name="parent_id" class="form-control">
                                        <option value="">None</option>
                                        @foreach ($parent as $row)
                                      
                                      	<!-- TERDAPAT TERNARY OPERATOR UNTUK MENGECEK JIKA PARENT_ID SAMA DENGAN ID CATEGORY PADA LIST PARENT, MAKA OTOMATIS SELECTED -->
                                        <option value="{{ $row->id }}" {{ $category->parent_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>

                                <!--william-->
                                <!-- GAMBAR TIDAK LAGI WAJIB, JIKA DIISI MAKA GAMBAR AKAN DIGANTI, JIKA DIBIARKAN KOSONG MAKA GAMBAR TIDAK AKAN DIUPDATE -->
                                <div class="form-group">
                                    <label for="image">Foto Kategori</label>
                                    <br>
                                  	<!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('ecommerce/categories/' . $category->image) }}" width="100px" height="100px" alt="{{ $category->name }}">
                                    <hr>
                                    <input type="file" name="image" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection