<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product; //LOAD MODEL PRODUCT
use App\Category;
use App\Attribute;
use App\AttributeOption;
use App\ProductAttributeValue;

use Illuminate\Support\Str;
use File;
use App\Jobs\ProductJob;

use App\Imports\ProductImport; //IMPORT CLASS PRODUCTIMPORT YANG AKAN MENG-HANDLE FILE EXCEL
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{

    public function __construct()
	{
		//parent::__construct();

		$this->data['currentAdminMenu'] = 'catalog';
		$this->data['currentAdminSubMenu'] = 'product';

		$this->data['types'] = Product::types();
	}

    //
    public function index()
    {
        //BUAT QUERY MENGGUNAKAN MODEL PRODUCT, DENGAN MENGURUTKAN DATA BERDASARKAN CREATED_AT
        //KEMUDIAN LOAD TABLE YANG BERELASI MENGGUNAKAN EAGER LOADING WITH()
        //ADAPUN CATEGORY ADALAH NAMA FUNGSI YANG NNTINYA AKAN DITAMBAHKAN PADA PRODUCT MODEL
        $product = Product::with(['category'])->orderBy('created_at', 'DESC');
      
        //JIKA TERDAPAT PARAMETER PENCARIAN DI URL ATAU Q PADA URL TIDAK SAMA DENGAN KOSONG
        if (request()->q != '') {
            //MAKA LAKUKAN FILTERING DATA BERDASARKAN NAME DAN VALUENYA SESUAI DENGAN PENCARIAN YANG DILAKUKAN USER
            $product = $product->where('name', 'LIKE', '%' . request()->q . '%');
        }
        //TERAKHIR LOAD 10 DATA PER HALAMANNYA
        $product = $product->paginate(10);
        //LOAD VIEW INDEX.BLADE.PHP YANG BERADA DIDALAM FOLDER PRODUCTS
        //DAN PASSING VARIABLE $PRODUCT KE VIEW AGAR DAPAT DIGUNAKAN
        return view('products.index', compact('product'));
    }

    public function create()
    {
        //QUERY UNTUK MENGAMBIL SEMUA DATA CATEGORY
        $category = Category::orderBy('name', 'DESC')->get();
        //LOAD VIEW create.blade.php` YANG BERADA DIDALAM FOLDER PRODUCTS
        //DAN PASSING DATA CATEGORY
        //return view('products.create', compact('category'));

        //william
		$configurableAttributes = $this->_getConfigurableAttributes();

        // $this->data['category'] = $category->toArray();
		$this->data['category'] = $category;
		$this->data['product'] = null;
		$this->data['productID'] = 0;
		$this->data['categoryIDs'] = [];
		$this->data['configurableAttributes'] = $configurableAttributes;

        return view('products.create', $this->data);

        //william

    }

    private function _getConfigurableAttributes()
	{
		return Attribute::where('is_configurable', true)->get();
	}

    public function store(Request $request)
    {
    
        //dd($request);

        //VALIDASI REQUESTNYA
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id', //CATEGORY_ID KITA CEK HARUS ADA DI TABLE CATEGORIES DENGAN FIELD ID
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpeg,jpg', //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG

            'image2' => 'nullable|image|mimes:png,jpeg,jpg', //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
            'image3' => 'nullable|image|mimes:png,jpeg,jpg', //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
            'image4' => 'nullable|image|mimes:png,jpeg,jpg', //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG
            'image5' => 'nullable|image|mimes:png,jpeg,jpg' //GAMBAR DIVALIDASI HARUS BERTIPE PNG,JPG DAN JPEG

        ]);

        $filename = null;
        $filename2 = null;
        $filename3 = null;
        $filename4 = null;
        $filename5 = null;

        //JIKA FILENYA ADA
        if ($request->hasFile('image')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file = $request->file('image');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename = time() . Str::slug($request->name) . '-1' . '.' . $file->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file->storeAs('ecommerce/products', $filename);

        }

        if ($request->hasFile('image2')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file2 = $request->file('image2');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename2 = time() . Str::slug($request->name) . '-2' . '.' . $file2->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file2->storeAs('ecommerce/products', $filename2);

        }

        if ($request->hasFile('image3')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file3 = $request->file('image3');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename3 = time() . Str::slug($request->name) . '-3' . '.' . $file3->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file3->storeAs('ecommerce/products', $filename3);

        }

        if ($request->hasFile('image4')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file4 = $request->file('image4');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename4 = time() . Str::slug($request->name) . '-4' . '.' . $file4->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file4->storeAs('ecommerce/products', $filename4);

        }

        if ($request->hasFile('image5')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file5 = $request->file('image5');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename5 = time() . Str::slug($request->name) . '-5' . '.' . $file5->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file5->storeAs('ecommerce/products', $filename5);

        }

        //SETELAH FILE TERSEBUT DISIMPAN, KITA SIMPAN INFORMASI PRODUKNYA KEDALAM DATABASE

        //get latest order id of specific attribute (color/iphone)
        $configurableAttributes = $this->_getConfigurableAttributes();
            
        $product = Product::create([
            'name' => $request->name,
            'slug' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
            'image' => $filename, //PASTIKAN MENGGUNAKAN VARIABLE FILENAM YANG HANYA BERISI NAMA FILE SAJA (STRING)

            'image2' => $filename2,
            'image3' => $filename3,
            'image4' => $filename4,
            'image5' => $filename5,

            'price' => $request->price,
            'weight' => $request->weight,
            'status' => $request->status
        ]);

        //william
        $this->_generateProductVariants($product, $request);

        //william

        //JIKA SUDAH MAKA REDIRECT KE LIST PRODUK
        return redirect(route('product.index'))->with(['success' => 'Produk Baru Ditambahkan']);

    }

    private function _generateProductVariants($product, $params)
	{
        

        $configurableAttributes = $this->_getConfigurableAttributes();

        $variantAttributes = [];

        foreach ($configurableAttributes as $attribute) {
            $variantAttributes[$attribute->code] = $params[$attribute->code];
        }

        //------------------------william--------------------
        //$variants = $this->_generateAttributeCombinations($variantAttributes);
        
        //----------ATTRIBUTE 
        $variants = $variantAttributes;

        //Do select query which has product id of it
        //If there is any record in prodattrvalue which has product id of it, 
        //then delete any record which product id 
        $matchThese = ['product_id' => $product->id];
        if (ProductAttributeValue::where($matchThese)->count() > 0) {
            ProductAttributeValue::where('product_id',$product->id)->delete();
        }

        //dd($variants);

        if ($variants) {
			foreach ($variants as $variant) {
                if($variant)
                {
                    $this->_saveProductAttributeValues($product, $variant);
                }
			}
		}
    }

    /**
	 * Generate attribute combination depend on the provided attributes
	 *
	 * @param array $arrays attributes
	 *
	 * @return array
	 */
	private function _generateAttributeCombinations($arrays)
	{
		$result = [[]];
		foreach ($arrays as $property => $property_values) {
			$tmp = [];
			foreach ($result as $result_item) {
				foreach ($property_values as $property_value) {
					$tmp[] = array_merge($result_item, array($property => $property_value));
				}
			}
			$result = $tmp;
		}
		return $result;
    }
    
    /**
	 * Convert variant attributes as variant name
	 *
	 * @param array $variant variant
	 *
	 * @return string
	 */
	private function _convertVariantAsName($variant)
	{
		$variantName = '';
		
		foreach (array_keys($variant) as $key => $code) {
			$attributeOptionID = $variant[$code];
			$attributeOption = AttributeOption::find($attributeOptionID);
			
			if ($attributeOption) {
				$variantName .= ' - ' . $attributeOption->name;
			}
		}

		return $variantName;
	}

    
    private function _saveProductAttributeValues($product, $variant)
	{

		foreach (array_values($variant) as $attributeOptionID) {
			$attributeOption = AttributeOption::find($attributeOptionID);
		   
			$attributeValueParams = [
				'product_id' => $product->id,
				'attribute_id' => $attributeOption->attribute_id,
                'attribute_options_id' => $attributeOption->id,
            ];

            //cek pada table jika product_id exist dan attribute_id dan text_value sudah ada di record maka jgn insert data lagi
            $matchThese = ['product_id' => $product->id, 'attribute_id' => $attributeOption->attribute_id, 'attribute_options_id' => $attributeOption->id];
            if (ProductAttributeValue::where($matchThese)->count() == 0) {
                ProductAttributeValue::create($attributeValueParams);
            }

		}
	}

    public function destroy($id)
    {
        $product = Product::find($id); //QUERY UNTUK MENGAMBIL DATA PRODUK BERDASARKAN ID
        //HAPUS FILE IMAGE DARI STORAGE PATH DIIKUTI DENGNA NAMA IMAGE YANG DIAMBIL DARI DATABASE
        File::delete(storage_path('app/public/products/' . $product->image));
        //KEMUDIAN HAPUS DATA PRODUK DARI DATABASE
        $product->delete();
        //DAN REDIRECT KE HALAMAN LIST PRODUK
        return redirect(route('product.index'))->with(['success' => 'Produk Sudah Dihapus']);
    }

    public function massUploadForm()
    {
        $category = Category::orderBy('name', 'DESC')->get();
        return view('products.bulk', compact('category'));
    }

    public function massUpload(Request $request)
    {
        //VALIDASI DATA YANG DIKIRIM
        $this->validate($request, [
            'category_id' => 'required|exists:categories,id',
            'file' => 'required|mimes:xlsx' //PASTIKAN FORMAT FILE YANG DITERIMA ADALAH XLSX
        ]);

        //JIKA FILE-NYA ADA
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $filename = time() . '-product.' . $file->getClientOriginalExtension();
            $file->storeAs('public/uploads', $filename); //MAKA SIMPAN FILE TERSEBUT DI STORAGE/APP/PUBLIC/UPLOADS

            //BUAT JADWAL UNTUK PROSES FILE TERSEBUT DENGAN MENGGUNAKAN JOB
            //ADAPUN PADA DISPATCH KITA MENGIRIMKAN DUA PARAMETER SEBAGAI INFORMASI
            //YAKNI KATEGORI ID DAN NAMA FILENYA YANG SUDAH DISIMPAN
            
            //Run via job
            ProductJob::dispatch($request->category_id, $filename);

            return redirect()->back()->with(['success' => 'Upload Produk Dijadwalkan']);
        }
    }

    public function edit($id)
    {
        $product = Product::find($id); //AMBIL DATA PRODUK TERKAIT BERDASARKAN ID
        $category = Category::orderBy('name', 'DESC')->get(); //AMBIL SEMUA DATA KATEGORI
        
        $configurableAttributes = $this->_getConfigurableAttributes();
        
        //loop through all the record in table attributes

        $attrOptions = null;

        foreach($configurableAttributes as $attr)
        {

            $attributeOption = AttributeOption::where('attribute_id', $attr->id)->get();

            $orderId = 1;
            
            if ($attributeOption)
            {
                foreach($attributeOption as $attrOption)
                {

                    $matchThese = ['product_id' => $product->id, 'product_attribute_values.attribute_id' => $attr->id, 'attribute_options.order_id' => $orderId];

                    $productAttributeValue = ProductAttributeValue::where($matchThese)
                                        ->join('attribute_options', 'product_attribute_values.attribute_options_id', '=', 'attribute_options.id')
                                        ->get();    


                    //if selected
                    if ($productAttributeValue->count() > 0) {
                        $attrOptions[$attr->id][$attrOption->order_id]['selected'][$attrOption->id] = [$attrOption->name];
                    }
                    //if not selected 
                    else {
                        $attrOptions[$attr->id][$attrOption->order_id]['notselected'][$attrOption->id] = [$attrOption->name];

                    }


                    $orderId++;
                }
            } 

        }

        /*
        Make it like this

       array -> 
            1 (attribute_id)
                -> 
                    1 (order_id)
                    ->
                        1 (selected)
                        ->
                            1 (attribute_option_id)
                            ->
                                Merah (attribute_name)

        */


		$this->data['category'] = $category;
		$this->data['product'] = $product;
		$this->data['productID'] = $product->id;
		$this->data['categoryIDs'] = $product->category_id;
        $this->data['configurableAttributes'] = $configurableAttributes;
        $this->data['productAttributeValue'] = $attrOptions;
        

        return view('products.edit', $this->data);
    }

    public function update(Request $request, $id)
    {

    //VALIDASI DATA YANG DIKIRIM
        $this->validate($request, [
            'name' => 'required|string|max:100',
            'description' => 'required',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|integer',
            'weight' => 'required|integer',
            'image' => 'nullable|image|mimes:png,jpeg,jpg', //IMAGE BISA NULLABLE
            'image2' => 'nullable|image|mimes:png,jpeg,jpg', //IMAGE BISA NULLABLE
            'image3' => 'nullable|image|mimes:png,jpeg,jpg', //IMAGE BISA NULLABLE
            'image4' => 'nullable|image|mimes:png,jpeg,jpg', //IMAGE BISA NULLABLE
            'image5' => 'nullable|image|mimes:png,jpeg,jpg' //IMAGE BISA NULLABLE
        ]);

        $product = Product::find($id); //AMBIL DATA PRODUK YANG AKAN DIEDIT BERDASARKAN ID
        
        $filename = $product->image; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
    
        $filename2 = $product->image2; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
        $filename3 = $product->image3; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
        $filename4 = $product->image4; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI
        $filename5 = $product->image5; //SIMPAN SEMENTARA NAMA FILE IMAGE SAAT INI

        //JIKA ADA FILE GAMBAR YANG DIKIRIM
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . Str::slug($request->name) . '-1' . '.' . $file->getClientOriginalExtension();
            //MAKA UPLOAD FILE TERSEBUT
            $file->storeAs('ecommerce/products', $filename);
            //DAN HAPUS FILE GAMBAR YANG LAMA
            File::delete(storage_path('app/public/products/' . $product->image));
        }

        if ($request->hasFile('image2')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file2 = $request->file('image2');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename2 = time() . Str::slug($request->name) . '-2' . '.' . $file2->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file2->storeAs('ecommerce/products', $filename2);

            File::delete(storage_path('app/public/products/' . $product->image2));

        }

        if ($request->hasFile('image3')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file3 = $request->file('image3');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename3 = time() . Str::slug($request->name) . '-3' . '.' . $file3->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file3->storeAs('ecommerce/products', $filename3);

            File::delete(storage_path('app/public/products/' . $product->image3));

        }

        if ($request->hasFile('image4')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file4 = $request->file('image4');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename4 = time() . Str::slug($request->name) . '-4' . '.' . $file4->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file4->storeAs('ecommerce/products', $filename4);

            File::delete(storage_path('app/public/products/' . $product->image4));

        }

        if ($request->hasFile('image5')) {
            //MAKA KITA SIMPAN SEMENTARA FILE TERSEBUT KEDALAM VARIABLE FILE
            $file5 = $request->file('image5');

            //KEMUDIAN NAMA FILENYA KITA BUAT CUSTOMER DENGAN PERPADUAN TIME DAN SLUG DARI NAMA PRODUK. ADAPUN EXTENSIONNYA KITA GUNAKAN BAWAAN FILE TERSEBUT
            $filename5 = time() . Str::slug($request->name) . '-5' . '.' . $file5->getClientOriginalExtension();

            //SIMPAN FILENYA KEDALAM FOLDER PUBLIC/PRODUCTS, DAN PARAMETER KEDUA ADALAH NAMA CUSTOM UNTUK FILE TERSEBUT
            $file5->storeAs('ecommerce/products', $filename5);

            File::delete(storage_path('app/public/products/' . $product->image5));

        }

    //KEMUDIAN UPDATE PRODUK TERSEBUT
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'category_id' => $request->category_id,
            'price' => $request->price,
            'weight' => $request->weight,
            'image' => $filename,
            'image2' => $filename2,
            'image3' => $filename3,
            'image4' => $filename4,
            'image5' => $filename5
        ]);

        //william
        $this->_generateProductVariants($product, $request);
        //william

        return redirect(route('product.index'))->with(['success' => 'Data Produk Diperbaharui']);
    }


}
