<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Menushow;
use Illuminate\Http\Request;

class MenushowController extends Controller
{
    public function shop()
    {
        return view('pages.frontends.shop.index'); 
    }

    public function blog()
    {
        return view('pages.frontends.blog.index'); 
    }

    public function about()
    {
        return view('pages.frontends.about-us.index'); 
    }

    public function services()
    {
        return view('pages.frontends.services.index'); 
    }

    public function policy()
    {
        return view('pages.frontends.privacy-policy.index'); 
    }

    public function questions()
    {
        return view('pages.frontends.frequently-questions.index'); 
    }

    public function contact()
    {
        return view('pages.frontends.contact.index'); 
    }

    public function compare()
    {
        return view('pages.frontends.compare.index'); 
    }

    public function condition()
    {
        return view('pages.frontends.condition.index'); 
    }
}
