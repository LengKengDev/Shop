<?php

namespace App\Observers;

use App\Category;

class CategoryObserver
{
    /**
     * Listen to the Category created event.
     *
     * @param Category $category
     * @return void
     */
    public function created(Category $category)
    {
        if ($category->parent == null) {
            $category->update(['position' => Category::mainCategories()->count()]);
        } else {
            $category->update(['position' => $category->parent->childs->count()]);
        }

    }
}
