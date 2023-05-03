<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Checkout;
use App\Models\Products;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    
    public function checkout()
    {
        return view('pages.frontends.checkout.index');
    }
}
