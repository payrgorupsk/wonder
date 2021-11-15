<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\RoOrders;
use Srmklive\PayPal\Services\ExpressCheckout;


class PayPalPaymentController extends Controller
{

    public function handlePayment()

    {

        $product = [];

        $product['items'] = [

            [
                'name' => 'Nike Joyride 2',
                'price' => 112,
                'desc'  => 'Running shoes for Men',
                'qty' => 2

            ]

        ];



        $product['invoice_id'] = 1;
        $product['invoice_description'] = 'Order Bill';
        $product['return_url'] = route('success.payment');
        $product['cancel_url'] = route('cancel.payment');
        $product['total'] = 224;

        $paypalModule = new ExpressCheckout();
        $res = $paypalModule->setExpressCheckout($product);
        $res = $paypalModule->setExpressCheckout($product, true);

        return redirect($res['paypal_link']);

    }



    public function paymentCancel(Request $request)
    {
        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
        $unique_id = $response['INVNUM'];

        $order = RoOrders::where('unique_id' ,$unique_id)->first();
        $order->status = 'cancelled';
        $order->save();

        echo '<script>
        alert("Your Order is Cancelled");
        window.location = "'.route('home').'"
        </script>';
        
        exit();
    }

    public function paymentSuccess(Request $request)
    {

        $paypalModule = new ExpressCheckout;
        $response = $paypalModule->getExpressCheckoutDetails($request->token);
        $unique_id = $response['INVNUM'];

        $order = RoOrders::where('unique_id' ,$unique_id)->first();
        $order->status = 'paid';
        $order->save();

        echo '<script>
        alert("Your Order is Placed Successfully");
        window.location = "'.route('home').'"
        </script>';
        
        exit();

    }

}