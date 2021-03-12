@extends('layouts.admin')

@section('title')
    <title>Edit Produk</title>
@endsection

@section('content')
<main class="main">
    <ol class="breadcrumb">
        <li class="breadcrumb-item">Home</li>
        <li class="breadcrumb-item active">Product</li>
    </ol>
    <div class="container-fluid">
        <div class="animated fadeIn">
          
          	<!-- PASTIKAN MENGIRIMKAN ID PADA ROUTE YANG DIGUNAKAN -->
            <form action="{{ route('product.update', $product->id) }}" method="post" enctype="multipart/form-data" >
                @csrf
              	<!-- KARENA UPDATE MAKA KITA GUNAKAN DIRECTIVE DIBAWAH INI -->
                @method('PUT')

              	<!-- FORM INI SAMA DENGAN CREATE, YANG BERBEDA HANYA ADA TAMBAHKAN VALUE UNTUK MASING-MASING INPUTAN  -->
                <div class="row">
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Edit Produk</h4>
                            </div>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="name">Nama Produk</label>
                                    <input type="text" name="name" class="form-control" value="{{ $product->name }}" required>
                                    <p class="text-danger">{{ $errors->first('name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="description">Deskripsi</label>
                                    <textarea name="description" id="description" class="form-control">{{ $product->description }}</textarea>
                                    <p class="text-danger">{{ $errors->first('description') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="status">Status</label>
                                    <select name="status" class="form-control" required>
                                        <option value="1" {{ $product->status == '1' ? 'selected':'' }}>Publish</option>
                                        <option value="0" {{ $product->status == '0' ? 'selected':'' }}>Draft</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('status') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="category_id">Kategori</label>
                                    <select name="category_id" class="form-control">
                                        <option value="">Pilih</option>
                                        @foreach ($category as $row)
                                        <option value="{{ $row->id }}" {{ $product->category_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('category_id') }}</p>
                                </div>

                                <div class="configurable-attributes">
                                    @if (!empty($configurableAttributes))
                                        <p class="text-primary mt-4">Configurable Attributes</p>
                                        <hr/>
                                        @foreach ($configurableAttributes as $attribute)
                                            <div class="form-group" id={{ $attribute->code }}>
                                                {!! Form::label($attribute->code, $attribute->name) !!}
                                                <select class="form-control" multiple="" name="{{$attribute->code}}[]">

                                                    @if($productAttributeValue != null)

                                                        @foreach($productAttributeValue as $attribute_id => $value)
                                                        
                                                            @if($attribute->id == $attribute_id)

                                                                @foreach($value as $order_id => $val)

                                                                    @foreach($val as $selectedOrNot => $value)

                                                                        @if($selectedOrNot == 'selected')
                                                                        
                                                                            @foreach($value as $attribute_option_id => $val)


                                                                                @foreach($val as $final => $value)
                                                                                    
                                                                                    <option value={{$attribute_option_id}} selected="selected">{{$value}}</option>

                                                                                @endforeach

                                                                            @endforeach

                                                                        @else

                                                                            @foreach($value as $attribute_option_id => $val)


                                                                                @foreach($val as $final => $value)
                                                                                    
                                                                                    <option value={{$attribute_option_id}}>{{$value}}</option>

                                                                                @endforeach

                                                                            @endforeach


                                                                        @endif

                                                                    @endforeach

                                                                @endforeach

                                                            @endif

                                                        @endforeach

                                                    @endif
                                                
                                                </select> 

                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="price">Harga</label>
                                    <input type="number" name="price" class="form-control" value="{{ $product->price }}" required>
                                    <p class="text-danger">{{ $errors->first('price') }}</p>
                                </div>
                                <div class="form-group">
                                    <label for="weight">Berat</label>
                                    <input type="number" name="weight" class="form-control" value="{{ $product->weight }}" required>
                                    <p class="text-danger">{{ $errors->first('weight') }}</p>
                                </div>
                              
                              	<!-- GAMBAR TIDAK LAGI WAJIB, JIKA DIISI MAKA GAMBAR AKAN DIGANTI, JIKA DIBIARKAN KOSONG MAKA GAMBAR TIDAK AKAN DIUPDATE -->
                                <div class="form-group">
                                    <label for="image">Foto Produk</label>
                                    <br>
                                  	<!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('ecommerce/products/' . $product->image) }}" width="100px" height="100px" alt="{{ $product->name }}">
                                    <hr>
                                    <input type="file" name="image" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                    <p class="text-danger">{{ $errors->first('image') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="image2">Foto Produk 2</label>
                                    <br>
                                  	<!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('ecommerce/products/' . $product->image2) }}" width="100px" height="100px" alt="{{ $product->name }}">
                                    <hr>
                                    <input type="file" name="image2" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                    <p class="text-danger">{{ $errors->first('image2') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="image3">Foto Produk 3</label>
                                    <br>
                                  	<!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('ecommerce/products/' . $product->image3) }}" width="100px" height="100px" alt="{{ $product->name }}">
                                    <hr>
                                    <input type="file" name="image3" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                    <p class="text-danger">{{ $errors->first('image3') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="image4">Foto Produk 4</label>
                                    <br>
                                  	<!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('ecommerce/products/' . $product->image4) }}" width="100px" height="100px" alt="{{ $product->name }}">
                                    <hr>
                                    <input type="file" name="image4" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                    <p class="text-danger">{{ $errors->first('image4') }}</p>
                                </div>

                                <div class="form-group">
                                    <label for="image5">Foto Produk 5</label>
                                    <br>
                                  	<!--  TAMPILKAN GAMBAR SAAT INI -->
                                    <img src="{{ asset('ecommerce/products/' . $product->image5) }}" width="100px" height="100px" alt="{{ $product->name }}">
                                    <hr>
                                    <input type="file" name="image5" class="form-control">
                                    <p><strong>Biarkan kosong jika tidak ingin mengganti gambar</strong></p>
                                    <p class="text-danger">{{ $errors->first('image5') }}</p>
                                </div>

                                <div class="form-group">
                                    <button class="btn btn-primary btn-sm">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</main>
@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/4.13.0/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('description');

        showHideConfigurableAttributes();
        $("select[name='category_id']").change(function() {
            showHideConfigurableAttributes();
        });

        function showHideConfigurableAttributes() {

            var category = $("select[name='category_id']").val();
            var categoryName = $("select[name='category_id']").find(":selected").text();

            //console.log(categoryName);
            if (category != '') {

                //1)show only specific attribute based on selected category by checking ajax to database 
                //2)select id from attributes where categoryId = selectedCategory 
                //3)put the values to array arrAttribute
                //4)Loop through arrAttribute, then show only select id which id equals to arrAttribute

                $(".configurable-attributes").show();
                $("#tipe-airpod").show();
                $("#tipe-iphone").show();
                $("#warna-aksesoris").show();
                $("#warna-case-airpod").show();
                $("#warna-case-iphone").show();
                $("#size").show();

                if (categoryName == "Case iPhone")
                {
                    //enable color and iphone attribute
                    $("#tipe-airpod").hide();
                    $("#warna-aksesoris").hide();
                    $("#warna-case-airpod").hide();
                    $("#size").hide();
                }
                else if (categoryName == "Case AirPod")
                {
                    $("#tipe-iphone").hide();
                    $("#warna-aksesoris").hide();
                    $("#warna-case-iphone").hide();
                    $("#size").hide();
                }
                else if (categoryName == "Case iPhone + FunPop")
                {
                    $("#tipe-airpod").hide();
                    $("#warna-aksesoris").hide();
                    $("#warna-case-airpod").hide();
                    $("#size").hide();
                } 
                else if (categoryName == "Aksesoris")
                {
                    $("#tipe-airpod").hide();
                    $("#tipe-iphone").hide();
                    $("#warna-case-airpod").hide();
                    $("#warna-case-iphone").hide();
                    $("#size").hide();
                }
                else if (categoryName == "Strap Apple Watch")
                {
                    $("#tipe-airpod").hide();
                    $("#tipe-iphone").hide();
                    $("#warna-case-airpod").hide();
                    $("#warna-case-iphone").hide();
                    $("#warna-aksesoris").hide();
                }

            } else {
                $(".configurable-attributes").hide();
            }
        }
    </script>
@endsection