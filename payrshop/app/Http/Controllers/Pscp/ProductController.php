<?php

namespace App\Http\Controllers\Pscp;

use App\Http\Controllers\Controller;
use App\Models\RoProduct;
use App\Models\StoreCategory;
use App\Models\StoreSubCategory;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $this->adminAccess($request);
        $data['page_name'] = "all products";
        $data['category_name'] = "products";
        $data['has_scrollspy'] = 0;
        $data['products'] = RoProduct::all();
        $data['categories'] = StoreCategory::all();
        $data['subcategories'] = StoreSubCategory::all();
        return view('pscp/pages/products/index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $this->adminAccess($request);
        $data['page_name'] = "add product";
        $data['category_name'] = "products";
        $data['has_scrollspy'] = 0;
        $data['categories'] = StoreCategory::all();
        $data['subcategories'] = StoreSubCategory::all();
        return view('pscp/pages/products/form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->hasfile('filename'))
        {

            foreach($request->file('filename') as $image)
            {
                $name=uniqid().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/images/products', $name);  
                $data[] = $name;  
            }
        }

        $product_image = json_encode($data);

        $product = new RoProduct();

        $product->product_name        = $request->product_name;
        $product->product_sku         = $request->product_sku;
        $product->category_id         = $request->category_id;
        $product->subcategory_id      = $request->subcategory_id;
        $product->price               = $request->price;
        $product->discount            = $request->discount;
        $product->currency            = $request->currency;
        $product->product_stock       = $request->product_stock;
        $product->payrmall            = (isset($request->payrmall)) ? 1 : 0;;
        $product->flash_sale          = (isset($request->flash_sale)) ? 1 : 0;;
        $product->all_products        = (isset($request->all_products)) ? 1 : 0;;
        $product->affiliate           = (isset($request->affiliate)) ? 1 : 0;;
        $product->country             = $request->country;
        $product->payment_getway      = $request->payment_getway;
        $product->cod                 = (isset($request->cod)) ? 1 : 0;;
        $product->product_delevery    = $request->product_delevery;
        $product->product_description = $request->product_description;
        $product->buy_return_policy   = $request->buy_return_policy;
        $product->product_image       = $request->product_image;
        $product->status              = 1;
        $product->added_by            = 1;
        $product->approved_by         = 1;
        $product->store_id            = 0;
        $product->product_image       = $product_image;

        $product->save();

        return redirect()->back()->with('product_added','New Product Added');
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
  
        $data['page_name'] = "add product";
        $data['category_name'] = "products";
        $data['has_scrollspy'] = 0;
        $data['categories'] = StoreCategory::all();
        $data['subcategories'] = StoreSubCategory::all();
        $product = RoProduct::where('id', $id)->first();
        return view('pscp/pages/products/edit',$data, compact('product'));
    }

    public function edit_product(Request $request)
    {

        $product = RoProduct::find($request->id);

        if($request->hasfile('filename'))
        {

            foreach($request->file('filename') as $image)
            {
                $name=uniqid().'.'.$image->getClientOriginalExtension();
                $image->move(public_path().'/images/products', $name);  
                $data[] = $name;  
            }

            $product->product_image = json_encode($data);

        }

        $product->product_name        = $request->product_name;
        $product->product_sku         = $request->product_sku;
        $product->category_id         = $request->category_id;
        $product->subcategory_id      = $request->subcategory_id;
        $product->price               = $request->price;
        $product->discount            = $request->discount;
        $product->currency            = $request->currency;
        $product->product_stock       = $request->product_stock;
        $product->payrmall            = (isset($request->payrmall)) ? 1 : 0;;
        $product->flash_sale          = (isset($request->flash_sale)) ? 1 : 0;;
        $product->all_products        = (isset($request->all_products)) ? 1 : 0;;
        $product->affiliate           = (isset($request->affiliate)) ? 1 : 0;;
        $product->country             = $request->country;
        $product->payment_getway      = $request->payment_getway;
        $product->cod                 = (isset($request->cod)) ? 1 : 0;;
        $product->product_delevery    = $request->product_delevery;
        $product->product_description = $request->product_description;
        $product->buy_return_policy   = $request->buy_return_policy;
        $product->status              = 1;
        $product->added_by            = 1;
        $product->approved_by         = 1;
        $product->store_id            = 0;


        $product->save();

        return redirect()->back()->with('product_edited','Product Edited Successffully');

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $product = RoProduct::where('id', $id)->first();
        $product->delete();


        return redirect()->to('pscp/products')->with('product_delete', 'Product Deleted Successfully!');;
        exit();
    }
    public function pending(Request $request)
    {
        //
        $this->adminAccess($request);
        $data['page_name'] = "pending products";
        $data['category_name'] = "products";
        $data['has_scrollspy'] = 0;
        $data['products'] = RoProduct::where('status',0);
        return view('pscp/pages/products/pending',$data);
    }
}
