<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Str;

class AdminEditCategoryComponent extends Component
{
    public $name;
    public $slug;
    public $category_id;

    public function mount($category_slug)
    {
        $category = Category::where('slug', $category_slug)->first();
        $this->name = $category->name;
        $this->slug = $category->slug;
        $this->category_id = $category->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name, '-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
    }

    public function updateCategory()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:categories'
        ]);
        
        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->slug = $this->slug;

        $category->save();
        session()->flash('message', 'Categorie bien mis a jour!');
    }

    public function render()
    {
        return view('livewire.admin.admin-edit-category-component')->layout('layouts.base');
    }
}
