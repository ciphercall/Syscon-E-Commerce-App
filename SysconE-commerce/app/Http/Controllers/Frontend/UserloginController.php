<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserloginController extends Controller
{
    public function index()
    {
        return view('pages.frontends.user-login.index');
        
    }
}
