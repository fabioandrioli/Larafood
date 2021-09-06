<?php

namespace App\Http\Controllers\Web\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class SiteController extends Controller
{
    private $plan;

    public function __construct(Plan $plan){
        $this->plan = $plan;
    }

    public function index(){
        $plans = Plan::paginate();
        return view('site.home.index',compact('plans'));
    }

    public function subscription(){
        return " subscription";
    }
}
