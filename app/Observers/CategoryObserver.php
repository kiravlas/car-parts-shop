<?php

namespace App\Observers;

use App\Models\Category;
use App\Supervisors\CategorySupervisor;

class CategoryObserver
{
    public function __construct(
        protected CategorySupervisor $supervisor
    ) {}

    public function created(Category $category): void
    {
        $this->supervisor->clearCategoriesCache();
    }

    public function updated(Category $category): void
    {
        $this->supervisor->clearCategoriesCache();
    }

    public function deleted(Category $category): void
    {
        $this->supervisor->clearCategoriesCache();
    }
}
