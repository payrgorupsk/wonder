<?php

namespace App\Http\Controllers;

use App\Models\Eshop;
use App\Models\StoreCategory;
use App\Models\RoProduct;
use App\Models\RoOrders;
use App\Models\StoreSubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use DB;
use Illuminate\Support\Str;
use Srmklive\PayPal\Services\ExpressCheckout;

class EshopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $data['categories'] = StoreCategory::all();
        $data['flash_sales'] = RoProduct::all()->where('flash_sale', 1);
        $data['new_products'] = RoProduct::orderBy('id', 'desc')->take(10)->get();
        $data['all_products'] = RoProduct::all();
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

    $data['product'] = RoProduct::find($product);
    return view('store/products/product_details', $data);
}


public function order(Request $request)
{
    $products = $request->products;

    $data['products'] = RoProduct::whereIn('id', $products)->get();

    return view('store/order', $data);
}

public function place_order(Request $request)
{

    $unique_id = Str::random(20);

    $paypal_amount = (float)$request->paypal_amount;

    $order = new RoOrders();
    $order->unique_id = $unique_id;
    $order->user_id = Session::get('user_id');
    $order->products = json_encode($request->products);
    $order->quantity = json_encode($request->quantity);
    $order->name = $request->name;
    $order->address = $request->address;
    $order->city = $request->city;
    $order->country = $request->country;
    $order->phone = $request->phone;
    $order->email = $request->email;
    $order->payment_method = $request->payment_method;
    $order->pay_number = $request->pay_number;
    $order->trx_id = $request->trx_id;
    $order->status = 'Pending';
    $order->save();

    if($request->payment_method == 'paypal'){

        $product = [];

        $product['items'] = [

            [
                'name' => '',
                'price' => $paypal_amount,
                'desc'  => '',
                'qty' => ''

            ]

        ];

        $product['invoice_id'] = $unique_id;
        $product['invoice_description'] = '';
        $product['return_url'] = route('success.paypal');
        $product['cancel_url'] = route('cancel.paypal');
        $product['total'] = $paypal_amount;

        // dd($product);

        $paypalModule = new ExpressCheckout();

        // dd($paypalModule);

        $res = $paypalModule->setExpressCheckout($product);
        // $res = $paypalModule->setExpressCheckout($product, true);

        return redirect($res['paypal_link']);
    }

    else{

        echo '<script>
        alert("Your Order is done. Wait for our review !!");
        window.location = "'.route('home').'"
        </script>';
        
        exit();
    }

}


}
