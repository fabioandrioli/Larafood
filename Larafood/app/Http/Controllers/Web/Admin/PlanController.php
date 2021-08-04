<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Plan\StoreUpdatePlanRequest;
use Illuminate\Http\Request;
use App\Models\Plan;


class PlanController extends Controller
{

    private $repository;

    public function __construct(Plan $plan){

        $this->repository = $plan;
    }

    public function index(){

        $plans = $this->repository->latest()->paginate(10);
        return view('admin.pages.plans.index',compact('plans'));
    }

    public function create(){

        return view('admin.pages.plans.create_edit');
    }


    public function store(StoreUpdatePlanRequest $request){

        $this->repository->create($request->all());
        return redirect()->route('plans.index');
    }

    public function show($url){

        $plan = $this->repository->where('url',$url)->first();

        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.show',compact('plan'));
    }

    public function edit($url){

        $plan = $this->repository->where('url',$url)->first();

        if(!$plan)
            return redirect()->back();

        return view('admin.pages.plans.create_edit',compact('plan'));

    }

    public function update($id, StoreUpdatePlanRequest $request){

        $plan = $this->repository->find($id);

        if(!$plan)
            return redirect()->back();

        $plan->update($request->all());
        return redirect()->route('plans.index');
    }


    public function search(Request $request){

        $filters = $request->except('_token');
        $plans = $this->repository->search($request->filter);

        return view('admin.pages.plans.index',compact('plans','filters'));
    }

    public function destroy($url){
        
        $plan = $this->repository->where('url',$url)->first();
        if(!$plan)
            return redirect()->back();

        $plan->delete();
        return redirect()->route('plans.index');
    }
}
