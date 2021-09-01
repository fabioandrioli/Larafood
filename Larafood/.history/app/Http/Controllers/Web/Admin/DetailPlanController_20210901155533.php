<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Plan\Detail\RequestStoreUpdateDetailPlan;
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
    public function store(RequestStoreUpdateDetailPlan $request, $urlPlan)
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
    public function show($urlPlan,$idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->where('id',$idDetail)->first();
        if(!$plan || !$detail){
            return redirect()->back();
        }

        return view("admin.pages.plans.details.show",[
            'plan' => $plan,
            'detail' => $detail,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->where('id',$idDetail)->first();
        if(!$plan || !$detail){
            return redirect()->back();
        }

        return view("admin.pages.plans.details.create_edit",[
            'plan' => $plan,
            'detail' => $detail,
        ]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RequestStoreUpdateDetailPlan $request, $urlPlan, $idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->where('id',$idDetail)->first();
        if(!$plan || !$detail){
            return redirect()->back();
        }

        // $data = $request->all();
        // $data['plan_id'] = $plan->id;
        //dd($request->all());
        // $this->repository->create($data);
        //dd($detail);
        $detail->update($request->all());
        //dd($plan->url);

        return redirect()->route("details.plan.index",$plan->url);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($urlPlan,$idDetail)
    {
        $plan = $this->plan->where('url',$urlPlan)->first();
        $detail = $this->repository->where('id',$idDetail)->first();
        if(!$plan || !$detail){
            return redirect()->back();
        }

        $detail->delete();
        return redirect()
                ->route("details.plan.index",$plan->url)
                ->with('message','Registro deletado com sucesso');
    }
}
