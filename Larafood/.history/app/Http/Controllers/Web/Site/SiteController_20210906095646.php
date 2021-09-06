<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class SiteController extends Controller
{
    public function __construct(){

    }

    public function index(){
        $plans = Plans::paginate();
        return view('site.home.index',compact('plans'));
    }
}
