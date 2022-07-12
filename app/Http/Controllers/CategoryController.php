<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('categories/list',['result'=>$categories]);
    }
    public function create()
    {
        return view('categories.create');
    }
    public function store(CategoryRequest $request)
    {
        $valid_data = $request->validated();
        $result = Category::create(['name'=>$valid_data['name']]);
        if ($result){
            $request->session()->flash('massage','Category Created Successfully');
            return redirect()->route('categories.list');
        }
        $request->session()->flash('massage','Category Creation failed');
        return redirect()->route('categories.list');
    }
    public function delete(Category $category){
        $result = $category->delete();
        if ($result){
            request()->session()->flash('massage','Category deleted Successfully');
            return redirect()->route('categories.list');
        }
        request()->session()->flash('massage','Category deletion failed');
        return redirect()->route('categories.list');

    }
}
