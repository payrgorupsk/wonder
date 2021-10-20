<?php

namespace App\Http\Controllers\Pscp;

use App\Http\Controllers\Controller;
use App\Models\StoreCategory;
use App\Models\StoreSubCategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
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
        $data['page_name'] = "all categories";
        $data['category_name'] = "categories";
        $data['has_scrollspy'] = 0;
        $data['categories'] = StoreCategory::all();
        return view('pscp/pages/category/index',$data);
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
        $data['page_name'] = "add category";
        $data['category_name'] = "categories";
        $data['has_scrollspy'] = 0;
        return view('pscp/pages/category/form',$data);
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

        $image = $request->file('category_thumb');
        $destinationPath = public_path('images/product_category'); 
        $thumb = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $thumb);

        $image = $request->file('category_banner');
        $destinationPath = public_path('images/product_category'); 
        $banner = uniqid() . "." . $image->getClientOriginalExtension();
        $image->move($destinationPath, $banner);

        $category = new StoreCategory();
        $category->category_thumb = "images/product_category/".$thumb;
        $category->category_banner = "images/product_category/".$banner;
        $category->category_name = $request->category_name;
        $category->category_slug = $request->category_slug;
        $category->category_order = $request->category_order;
        $category->allowed_in_home = (isset($request->allowed_in_home)) ? 1 : 0;
        $category->created_by = 1;
        $category->created_at = date('Y-m-d H:i:s');
        $category->save();

        return redirect()->to('pscp/categories')->with('alert', 'Category Added Successfully!');;


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
        $data['page_name'] = "add category";
        $data['category_name'] = "categories";
        $data['has_scrollspy'] = 0;
        $category = StoreCategory::where('id', $id)->first();
        return view('pscp/pages/category/edit',$data, compact('category'));
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
        $category = StoreCategory::where('id', $id)->first();
        $category->delete();

        $subcategory = StoreSubCategory::where('parent_id', $id);
        $subcategory->delete();

        return redirect()->to('pscp/categories')->with('alert', 'Category Deleted Successfully!');;
        exit();
    }
}
