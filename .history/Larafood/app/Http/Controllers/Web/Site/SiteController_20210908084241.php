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
        $plans = Plan::with('details')->orderBy('price','ASC')->paginate();
        return view('site.home.index',compact('plans'));
    }

    public function subscription($url){
        if ($plan = Plan::where('url',$url)->first()){
            return redirect()->back();
        }

        session()->put('plan',$plan);

        return redirect()->route("register");
    }
}
