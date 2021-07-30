<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;
use Illuminate\Support\Str;

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


    public function store(Request $request){
        $data = $request->all();
        $data['url'] = Str::kebab($data['name']);
        $this->repository->create($data);

        return redirect()->route('plans.index');
    }

    public function show($url){
        $plan = $this->repository->where('url',$url)->first();
        if(!$plan)
            return redirect()->back();
        return view('admin.pages.plans.show',compact('plan'));
    }

    public function edit($id){
        $plan = $this->repository->find($id);
        if(!$plan)
            return redirect()->back();
        return view('admin.pages.plans.create_edit',compact('plan'));

    }

    public function update($id, Request $request){
        $plan = $this->repository->find($id);
        $data = $request->all();
        if(!$plan)
            return redirect()->back();

        $data['url'] = Str::kebab($data['name']);
        $this->repository->update($data);
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
