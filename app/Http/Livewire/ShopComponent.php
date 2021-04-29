<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class ShopComponent extends Component
{
    public function store($product_id, $product_name, $product_price)
    {
        Cart::instance('cart')->add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('succes_message', 'Produit Ajoute au panier');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $products = Product::paginate(12);
        $categories = Category::all();
        return view('livewire.shop-component',['products'=>$products, 'categories'=>$categories])->layout("layouts.base");
    }

    
}
