<?php

namespace App\Http\Controllers\Web\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Profile,
    Plan,
};

class PlanProfileController extends Controller
{
    
    public function __construct(Profile $profile, Plan $plan){

        $this->$profile = $profile;
        $this->$plan = $plan;
    }

    public function profiles($id){

        $profile = Profile::find($id);
        $plans = $profile->plans()->paginate();

        return view('admin.pages.profiles.plan.index',compact('profile','plans'));
    }

    public function plans($id){

        $plan = plan::find($id);
        $profiles = $plan->profiles()->paginate();

        return view('admin.pages.plans.profile.index',compact('plan','profiles'));
    }

    public function linkNewplan(Request $request,$id){
        $profile = Profile::find($id);
    
        if(!$profile){
            return redirect()->back();
        }
     
        $filters = $request->except('_token');


        $plans = $profile->plansAvailable($request->filter);

        return view('admin.pages.profiles.plan.linkNewplan',compact('profile','plans','filters'));
    }

    public function linkNewplanStore(Request $request, $id){
        $profile = Profile::find($id);
        if(!$profile){
            return redirect()->back();
        }

        if(!$request->plans || count($request->plans) == 0){
            return redirect()
                    ->back()
                    ->with("error" , "Precisa escolher pelo menos uma permissão");
        }

        $profile->plans()->attach($request->plans);

        return redirect()->route("profiles.plans", $profile->id);
    }

    public function unbindplan($idProfile, $idplan){
        $profile = Profile::find($idProfile);
        $plan = plan::find($idplan);
        if(!$profile || !$plan){
            return redirect()->back();
        }

        $profile->plans()->detach($plan);
        return redirect()->route("profiles.plans", $profile->id);
    }
}
