<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DetailPlan;
use App\Models\Plan;

class DetailPlanController extends Controller
{


    protected $repository, $plan;


    public function __construct(DetailPlan $detailPlan,Plan $plan){
        $this->repository = $detailPlan;
        $this->plan = $plan;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first()){
            return redirect()->back();
        }

        $details = $plan->details()->paginate();

        return view("admin.pages.plans.details.index",[
            'plan' => $plan,
            'details' => $details,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first()){
            return redirect()->back();
        }

        return view("admin.pages.plans.details.create_edit",[
            'plan' => $plan,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $urlPlan)
    {
        if(!$plan = $this->plan->where('url',$urlPlan)->first()){
            return redirect()->back();
        }

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;
        // $this->repository->create($data);
        $plan->details()->create($request->all());

        return redirect()->route("details.plan.index", $plan->url);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first()
        $detail = $this->plan->where('id',$idDetail)->first()
        if(!$plan || !$detail){
            return redirect()->back();
        }

        return view("admin.pages.plans.details.create_edit",[
            'plan' => $plan,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
