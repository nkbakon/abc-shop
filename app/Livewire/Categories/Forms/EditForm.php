<?php

namespace App\Livewire\Categories\Forms;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EditForm extends Component
{
    public $category;
    public $name;

    public function rules()
    {
        return [
            'name' => 'required|unique:categories,name,' . $this->category->id,
        ];
    }

    public function mount($category)
    {
        $this->category = $category;
        $this->name = $category->name;
    }

    public function update()
    {
        $validatedData = $this->validate($this->rules());
        $data['name'] = $this->name;
        $data['edit_by'] = Auth::user()->id;
        
        $this->category->update($data);        
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function render()
    {
        return view('categories.components.edit-form');
    }
}

