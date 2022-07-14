<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Todo;

class CategoryController extends Controller
{
    public function show()
    {
        $categories = Category::all();
        return view('categories/list',['result'=>$categories]);
    }
    public function showTodos(Category $category)
    {

        $todos = Todo::query()->where('category','=',$category->name)->get();
        if (empty($todos->toArray()))
        {
            $todos = 'No Todos Found For This Category!!!';
        }
        return view('todos.list',['todos'=>$todos]);
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
    public function delete(Category $category)
    {
        $todos = Todo::query()->where('category','=',$category->name)->delete();
        $result = $category->delete();
        if ($result){
            request()->session()->flash('massage','Category deleted Successfully');
            return redirect()->route('categories.list');
        }
        request()->session()->flash('massage','Category deletion failed');
        return redirect()->route('categories.list');

    }
    public function edit(Category $category)
    {
        return view('categories/edit',['category'=>$category]);
    }
    public function update(CategoryRequest $request,Category $category)
    {
        $valid_data = $request->validated();
        $result = $category->update([
            'name'=>$valid_data['name']
        ]);
        if ($result){
            request()->session()->flash('massage','Category Edited Successfully');
            return redirect()->route('categories.list');
        }
        request()->session()->flash('massage','Category edition failed');
        return redirect()->route('categories.list');
    }
}
