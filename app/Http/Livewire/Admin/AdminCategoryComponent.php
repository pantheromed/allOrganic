<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use Livewire\Component;

class AdminCategoryComponent extends Component
{

    public function deleteCategory($id)
    {
        $category = Category::find($id);
        $category->delete();
        session()->flash('message', 'Categorie bien supprimee !');
    }

    public function render()
    {
        $categories = Category::all();
        return view('livewire.admin.admin-category-component', ['categories'=>$categories])->layout('layouts.base');
    }
}
