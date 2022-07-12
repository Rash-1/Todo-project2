<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function show()
    {
        $result = Category::all()->toArray();
        return view('main',['result'=>$result]);
    }
}
