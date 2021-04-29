<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;

class CheckoutComponent extends Component
{
    
    public function render()
    {
        $lproducts = Product::orderBy('created_at', 'DESC')->get()->take(3);
        return view('livewire.checkout-component', [ 'lproducts'=>$lproducts])->layout("layouts.base");
    }
}
