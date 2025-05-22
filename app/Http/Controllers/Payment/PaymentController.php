<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use Stripe\Charge;
use Stripe\Stripe;

class PaymentController extends Controller
{
    public function checkout(Request $request, Book $book)
    {   
        $request->validate([
            'stripeToken' => 'required'
        ]);

        Stripe::setApiKey(config('services.stripe.secret'));

        Charge::create([
            'amount' => $book->price*100,
            'currency' =>'usd',
            'description' => 'Bying the book: '.$book->title,
            'source' => $request->stripeToken,
        ]);

        return response()->json(['message'=>'charge completed']);
    }
}
