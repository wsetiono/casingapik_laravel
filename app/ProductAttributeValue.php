<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
    protected $fillable = [
        'product_id',
        'attribute_id',
        'text_value',
        'boolean_value',
        'integer_value',
        'float_value',
        'datetime_value',
        'date_value',
        'json_value',
        'attribute_options_id',
    ];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    public function attribute()
    {
        return $this->belongsTo('App\Attribute');
    }

    public static function getAttributeOptions($product, $attributeCode)
    {
        $productVariantIDs = $product->variants->pluck('id');
        $attribute = Attribute::where('code', $attributeCode)->first();

        $attributeOptions = ProductAttributeValue::where('attribute_id', $attribute->id)
                            ->whereIn('product_id', $productVariantIDs)
                            ->get();

        return $attributeOptions;
    }


}
