<?php

namespace App\Http\Controllers;

use App\Services\OrderService;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class PaymentController extends Controller
{
    public function __construct(private readonly OrderService $order)
    {
    }
    public function createPaymentIntent(Request $request)
    {
        Stripe::setApiKey(env('STRIPE_SECRET'));

        $paymentIntent = PaymentIntent::create([
            'amount'   => $request['items']['amount'],
            'currency' => 'usd',
            'metadata' => ['integration_check' => 'accept_a_payment'],
        ]);

        return response()->json([
            'clientSecret' => $paymentIntent->client_secret,
        ]);
    }

    public function complete(Request $request, $order_id)
    {
        if($request['redirect_status'] == 'succeeded'){
            $this->order->updateOrderStatus($order_id);

            return view('payment.complete');
        }

        return view('payment.incomplete');
    }
}
