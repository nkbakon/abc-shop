<?php

namespace App\Livewire\Products\Forms;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class CreateForm extends Component
{
    public $name;    
    public $amount;
    public $category_id;
    public $all_categories;
    public $note;

    public function mount()
    {
        $this->all_categories = Category::all();
        $this->category_id = '';
    }

    protected $rules = [
        'name' => 'required',
        'category_id' => 'required',
        'amount' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function store()
    {   
        $validatedData = $this->validate($this->rules);
        $data['category_id'] = $this->category_id;
        $data['name'] = $this->name;
        $data['amount'] = $this->amount;
        $data['note'] = $this->note;
        $data['add_by'] = Auth::user()->id;

        $product = Product::create($data);
        if($product){
            return redirect()->route('products.index')->with('status', 'Product created successfully.');  
        }
        return redirect()->route('products.index')->with('delete', 'Product create faild, try again.');       
        
    }

    public function render()
    {
        return view('products.components.create-form');
    }
}
