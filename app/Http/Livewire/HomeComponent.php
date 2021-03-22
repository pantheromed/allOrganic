<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\HomeCategory;
use App\Models\HomeSlider;
use App\Models\Product;
use App\Models\Sale;
use Livewire\Component;

class HomeComponent extends Component
{
    public function render()
    {
        $sliders = HomeSlider::where('status', 1)->get();
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(5);
        $category = HomeCategory::find(1);
        $cats = explode(',',$category->sel_categories);
        $categories = Category::whereIn('id',$cats)->get();
        $no_products = $category->no_products;
        $sproducts = Product::where('sale_price', '>', 0)->inRandomOrder()->get()->take(5);
        $sale = Sale::find(1);
        return view('livewire.home-component', ['sliders'=>$sliders, 'lproducts'=>$lproducts, 'categories'=>$categories, 'no_products'=>$no_products,'sproducts'=>$sproducts, 'sale'=>$sale])->layout('layouts.base');
    }
}
