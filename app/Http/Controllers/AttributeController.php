<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Attribute;
use App\AttributeOption;

use App\Http\Requests\AttributesRequest;
use App\Http\Requests\AttributeOptionsRequest;

use Session;
use Illuminate\Support\Str;

class AttributeController extends Controller
{

    public function __construct()
    {
        // parent::__construct();

        $this->data['currentAdminMenu'] = 'catalog';
        $this->data['currentAdminSubMenu'] = 'attribute';

        $this->data['types'] = Attribute::types();
        $this->data['booleanOptions'] = Attribute::booleanOptions();
        $this->data['validations'] = Attribute::validations();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->data['attributes'] = Attribute::orderBy('name', 'ASC')->paginate(10);

        return view('attributes.index', $this->data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AttributesRequest $request)
    {
        $params = $request->except('_token');
        $params['is_required'] = (bool) $params['is_required'];
        $params['is_unique'] = (bool) $params['is_unique'];
        $params['is_configurable'] = (bool) $params['is_configurable'];
        $params['is_filterable'] = (bool) $params['is_filterable'];

        if (Attribute::create($params)) {
            Session::flash('success', 'Attribute has been saved');
        }

        return redirect('administrator/attributes');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);

        $this->data['attribute'] = $attribute;
        
        return view('attributes.edit', $this->data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AttributesRequest $request, $id)
    {
        $params = $request->except('_token');
        $params['is_required'] = (bool) $params['is_required'];
        $params['is_unique'] = (bool) $params['is_unique'];
        $params['is_configurable'] = (bool) $params['is_configurable'];
        $params['is_filterable'] = (bool) $params['is_filterable'];

        unset($params['code']);
        unset($params['type']);

        $attribute = Attribute::findOrFail($id);

        if ($attribute->update($params)) {
            Session::flash('success', 'Attribute has been saved');
        }

        return redirect('administrator/attributes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::findOrFail($id);

        if ($attribute->delete()) {
            Session::flash('success', 'Attribute has been deleted');
        }

        return redirect('administrator/attributes');
    }

    public function options($attributeID)
    {
        if (empty($attributeID)) {
            return redirect('administrator/attributes');
        }

        $attribute = Attribute::findOrFail($attributeID);
        $this->data['attribute'] = $attribute;

        return view('attributes.options', $this->data);
    }

    public function store_option(AttributeOptionsRequest $request, $attributeID)
    {
        if (empty($attributeID)) {
            return redirect('administrator/attributes');
        }
        
        $maxOrderId = AttributeOption::where('attribute_id', $attributeID)->max('order_id');

        $params = [
            'attribute_id' => $attributeID,
            'name' => $request->get('name'),
            'order_id' => (int)$maxOrderId + 1,
            'slug' => Str::slug($request->get('name')),
        ];

        if (AttributeOption::create($params)) {
            Session::flash('success', 'option has been saved');
        }

        return redirect('administrator/attributes/'. $attributeID .'/options');
    }

    public function edit_option($optionID)
    {
        $option = AttributeOption::findOrFail($optionID);

        $this->data['attributeOption'] = $option;
        $this->data['attribute'] = $option->attribute;

        return view('attributes.options', $this->data);
    }

    public function update_option(AttributeOptionsRequest $request, $optionID)
    {
        $option = AttributeOption::findOrFail($optionID);
        
        // $params = $request->except('_token');

        $params = [
            'name' => $request->get('name'),
            'slug' => Str::slug($request->get('name')),
        ];

        if ($option->update($params)) {
            Session::flash('success', 'Option has been updated');
        }

        return redirect('administrator/attributes/'. $option->attribute->id .'/options');
    }

    public function remove_option($optionID)
    {
        if (empty($optionID)) {
            return redirect('administrator/attributes');
        }

        $option = AttributeOption::findOrFail($optionID);

        if ($option->delete()) {
            Session::flash('success', 'option has been deleted');
        }

        return redirect('administrator/attributes/'. $option->attribute->id .'/options');
    }
}
