<?php

namespace App\Observers\Category;
use Illuminate\Support\Str;

class CategoryObserve
{
     /**
     * Handle the Category "created" event.
     *
     * @param  \App\Models\Models\Category $category
     * @return void
     */
    public function creating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }

    /**
     * Handle the Category "updated" event.
     *
     * @param  \App\Models\Models\Category $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }
}
