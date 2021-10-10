<?php

namespace App\Http\Controllers;

use App\Models\Eshop;
use App\Models\StoreCategory;
use App\Models\StoreSubCategory;
use Illuminate\Http\Request;

class EshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
        $data['categories'] = StoreCategory::all();
        return view('welcome',$data);
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Eshop  $eshop
     * @return \Illuminate\Http\Response
     */
    public function show(Eshop $eshop)
    {
        //
    }

    public function categories()
    {

    }
    public function payrmall()
    {
        return view('store/payrmall');
    }
    public function flashsale()
    {
        return view('store/flash_sale');
    }
    public function category($category=null)
    {
        $cat = StoreCategory::where('category_slug',$category)->get()->first();
        if($cat!=null){
          $cat = json_decode($cat);
        $subCat = StoreSubCategory::where('parent_id',$cat->id)->get();
        $data = array(
            'category' => $cat,
            'sub_categories' => $subCat
        );

        return view('store/category/index',$data);
        }
        else{
            return view('store/category/404');
        }

    }

    public function product($product=null)
    {
        return view('store/products/product_details');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Eshop  $eshop
     * @return \Illuminate\Http\Response
     */
    public function edit(Eshop $eshop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Eshop  $eshop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Eshop $eshop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Eshop  $eshop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Eshop $eshop)
    {
        //
    }
}
