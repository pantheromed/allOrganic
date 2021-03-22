<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithPagination;
use Cart;

class SearchComponent extends Component
{
    public $search;
    public $product_cat;
    public $product_cat_id;

    public function mount(){
        $this->fill(request()->only('search','product_cat', 'product_cat_id'));
    }

    public function store($product_id, $product_name, $product_price)
    {
        Cart::add($product_id, $product_name, 1, $product_price)->associate('App\Models\Product');
        session()->flash('succes_message', 'Produit Ajoute au panier');
        return redirect()->route('product.cart');
    }

    use WithPagination;
    public function render()
    {
        $products = Product::where('name','like','%'.$this->search.'%')->where('category_id','like', '%'.$this->product_cat_id.'%')->paginate(12);
        $categories = Category::all();
        return view('livewire.search-component',['products'=>$products, 'categories'=>$categories])->layout("layouts.base");
    }

    
}
