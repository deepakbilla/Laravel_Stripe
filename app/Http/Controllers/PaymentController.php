<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Stripe\Charge;
use Stripe\Stripe;
use Stripe\PaymentIntent;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Charges;

class PaymentController extends Controller
{
    public function charge(Request $request,product $product)
    {
        Stripe::setApiKey(config('services.stripe.secret'));
        $token = $request->input('stripeToken');
        $user = Auth::user();
        try {
            $paymentIntent = PaymentIntent::create([
                'amount' => $product->price * 100, 
                'currency' => 'usd',
            ]);
            Charges::create([
                'user_id' => $user->id,
                'stripe_charge_id' => $paymentIntent->id,
                'amount' => $paymentIntent->amount,
                'currency' => $paymentIntent->currency,
            ]);
       
            return view('products.confirmation');


        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
           
        }
    }
}
