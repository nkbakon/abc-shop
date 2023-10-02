<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        return view('categories.index');
    }

    public function create()
    {
        return view('categories.create');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function destroy(Request $request)
    {
        $category = Category::find($request->data_id);
        if($category)
        {
            $category->delete();
            return redirect()->route('categories.index')->with('delete', 'Category deleted successfully.');
        }
        else
        {
            return redirect()->route('categories.index')->with('delete', 'No Category found!.');
        }    
    }
}

