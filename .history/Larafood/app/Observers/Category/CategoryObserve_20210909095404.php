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
    public function creating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }

    /**
     * Handle the Plan "updated" event.
     *
     * @param  \App\Models\Models\Category $category
     * @return void
     */
    public function updating(Category $category)
    {
        $category->url = Str::kebab($category->name);
    }
}
