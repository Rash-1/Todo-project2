<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use Illuminate\Http\Request;
use App\Models\Todo;
use App\Models\Category;

class TodoController extends Controller
{
    public function show()
    {
      $result = Todo::all();
      return view('todos/list',['todos' => $result]);
    }
    public function detail(Todo $todo)
    {
      return view('todos.detail',['todo'=>$todo]);
    }
    public function check(Todo $todo)
    {
      $result = $todo->update([
          'status'=>'done',
          'checked_at'=>now()
      ]);
      if ($result){
          session()->flash('massage','Todo Checked Successfully');
          return redirect()->route('todos.detail',['todo'=>$todo]);
      }
        session()->flash('massage','Todo Checked Failed');
        return redirect()->route('todos.detail',['todo'=>$todo]);
    }
    public function create()
    {
        $categories = Category::query()->where('name','!=','default')->get();
        return view('todos.create',['categories'=>$categories]);
    }
    public function store(TodoRequest $request)
    {
        $valid_data = $request->validated();
        $category = '';
        if ($request->category == 'New Category')
        {
            Category::create([
                'name' => $request->newCategory
            ]);
            $category = $request->newCategory;
        }elseif ($request->category == null)
        {
            $category = 'default';
            if (Category::query()->where('name','==','default')->count() != 0 )
            {
                Category::create([
                    'name'=>'default'
                ]);
            }
        }else
        {
            $category = $request->category;
        }
        $result = Todo::create([
            'title'=>$valid_data['title'],
            'description'=>$valid_data['description'],
            'category' =>$category
        ]);
        if ($result){
            $request->session()->flash('massage','Todo Created Successfully');
            return redirect()->route('todos.list');
        }
        $request->session()->flash('massage','Todo Creation failed');
        return redirect()->route('todos.list');
    }
    public function delete(Todo $todo)
    {
        $result = $todo->delete();
        if ($result){
            session()->flash('massage','Todo Deleted Successfully');
            return redirect()->route('todos.list');
        }
        session()->flash('massage','Todo Deletion failed');
        return redirect()->route('todos.list');
    }
    public function edit(Todo $todo)
    {
        $categories = Category::query()->where('name','!=','default')->get();
        return view('todos.edit',['todo'=>$todo,'categories'=>$categories]);
    }
    public function update(Todo $todo,TodoRequest $request)
    {
        $valid_date = $request->validated();
        $newCategory = '';
        if ($request->category == 'New Category')
        {
            Category::create(['name'=>$valid_date['newCategory']]);
            $newCategory = $valid_date['newCategory'];
        }elseif ($request->category == null && $request->newCategory == null)
        {
            $newCategory = $request->currentCategory;
        }else
        {
            $newCategory = $valid_date['category'];
        }
        $result = $todo->update([
            'title' => $valid_date['title'],
            'description' => $valid_date['description'],
            'category' => $newCategory,
        ]);
        if ($result){
            session()->flash('massage','Todo Edited Successfully');
            return redirect()->route('todos.list');
        }
        session()->flash('massage','Todo Edition failed');
        return redirect()->route('todos.list');
    }
}
