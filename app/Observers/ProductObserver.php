<?php

namespace App\Observers;

use App\Models\Product;
use App\Supervisors\ProductSupervisor;

class ProductObserver
{
    public function __construct(protected ProductSupervisor $supervisor) {}

    /**
     * Handle the Product "created" event.
     */
    public function created(Product $product): void
    {
        $this->supervisor->clearHomeCache();
    }

    /**
     * Handle the Product "updated" event.
     */
    public function updated(Product $product): void
    {
        $this->supervisor->clearHomeCache();
    }

    /**
     * Handle the Product "deleted" event.
     */
    public function deleted(Product $product): void
    {
        $this->supervisor->clearHomeCache();
    }
}
