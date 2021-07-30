<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan){
        $this->repository = $plan;
    }

    public function index(){
        $plans = $this->repository->all();
        return view('admin.pages.plan.index',compact('plans'));
    }
}
