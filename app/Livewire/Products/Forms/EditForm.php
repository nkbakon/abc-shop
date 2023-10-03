<?php

namespace App\Livewire\Products\Forms;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EditForm extends Component
{
    public $product;
    public $name;    
    public $amount;
    public $category_id;
    public $all_categories;
    public $note;

    public function rules()
    {
        return [
            'category_id' => 'required',
            'name' => 'required',
            'amount' => 'required',
        ];
    }

    public function mount($product)
    {
        $this->all_categories = Category::all();        
        $this->product = $product;
        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->amount = $product->amount;
        $this->note = $product->note;
    }

    public function update()
    {
        $validatedData = $this->validate($this->rules());
        $data['category_id'] = $this->category_id;
        $data['name'] = $this->name;
        $data['amount'] = $this->amount;
        $data['note'] = $this->note;
        $data['edit_by'] = Auth::user()->id;
        
        $this->product->update($data);        
        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function render()
    {
        return view('products.components.edit-form');
    }
}