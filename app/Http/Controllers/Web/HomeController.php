<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view('Web.index');
    }
    //==========================================================
    public function about(){
        if (!auth()->check() ){
            my_toaster('You are not logged in','warning');
            return redirect('login');
        }
        return view('Web.about');
    }
    //==========================================================
}
