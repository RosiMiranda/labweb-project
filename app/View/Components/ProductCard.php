<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ProductCard extends Component
{
    public $description;
    public $price;
    public $file_path;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(string $description, float $price)
    {
        $this->description = $description;
        $this->price = $price;
    }
    

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.product-card');
    }
}