<?php

namespace App\Livewire\Categories\Forms;

use Livewire\Component;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CreateForm extends Component
{
    public $name;

    protected $rules = [
        'name' => 'required|unique:categories,name',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {   
        $validatedData = $this->validate($this->rules);
        $data['name'] = $this->name;
        $data['add_by'] = Auth::user()->id;

        $category = Category::create($data);
        if($category){
            return redirect()->route('categories.index')->with('status', 'Category created successfully.');  
        }
        return redirect()->route('categories.index')->with('delete', 'Category create faild, try again.');       
        
    }

    public function render()
    {
        return view('categories.components.create-form');
    }
}
