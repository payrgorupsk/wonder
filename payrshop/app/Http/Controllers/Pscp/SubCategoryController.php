<?php

namespace App\Http\Controllers\Pscp;

use App\Http\Controllers\Controller;
use App\Models\StoreCategory;
use App\Models\StoreSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
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
        $data['page_name'] = "all subcategories";
        $data['category_name'] = "subcategories";
        $data['has_scrollspy'] = 0;
        $data['subcategories'] = StoreSubCategory::all();
        return view('pscp/pages/subcategory/index',$data);
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

        $data['page_name'] = "add subcategory";
        $data['category_name'] = "subcategories";
        $data['has_scrollspy'] = 0;
        $data['categories'] = StoreCategory::all();
        return view('pscp/pages/subcategory/form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $thumb = '';
        $banner = '';

        $image = $request->file('sub_category_thumb');
        $destinationPath = public_path('images/product_subcategory'); 
        $thumb = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $thumb);

        $image = $request->file('sub_category_banner');
        $destinationPath = public_path('images/product_subcategory'); 
        $banner = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $banner);

        $subcategory = new StoreSubCategory();
        $subcategory->sub_category_thumb = "images/product_subcategory/".$thumb;
        $subcategory->sub_category_banner = "images/product_subcategory/".$banner;
        $subcategory->parent_id = $request->parent_id;
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->sub_category_slug = $request->sub_category_slug;
        $subcategory->sub_category_order = $request->sub_category_order;
        // $subcategory->created_by = 1;
        $subcategory->created_at = date('Y-m-d H:i:s');
        $subcategory->save();

        return redirect()->to('pscp/subcategories')->with('alert', 'Category Added Successfully!');
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
        //
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
    public function destroy($id)
    {
        //
    }
}
