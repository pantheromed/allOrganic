<?php

namespace App\Http\Livewire;

use App\Models\Product;
use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;
use Cart;

class CategoryComponent extends Component
{

    public $category_slug;

    public function mount($category_slug)
    {
        $this->category_slug = $category_slug;
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
        $category = Category::where('slug', $this->category_slug)->first();
        $category_id = $category->id;
        $category_name = $category->name;

        $products = Product::where('category_id', $category_id)->paginate(12);
        $categories = Category::all();
        return view('livewire.category-component',['products'=>$products, 'categories'=>$categories,'category_name'=>$category_name])->layout("layouts.base");
    }

}
