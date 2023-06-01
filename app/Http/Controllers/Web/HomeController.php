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
        return view('Web.about');
    }
    //==========================================================
}
