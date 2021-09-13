<?php

namespace App\Observers\Category;

class CategoryObserve
{
     /**
     * Handle the Plan "created" event.
     *
     * @param  \App\Models\Models\Category $category
     * @return void
     */
    public function creating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }

    /**
     * Handle the Plan "updated" event.
     *
     * @param  \App\Models\Models\Category $category
     * @return void
     */
    public function updating(Plan $plan)
    {
        $plan->url = Str::kebab($plan->name);
    }
}
