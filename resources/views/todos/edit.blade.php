@extends('layoutes.main')
@section('content')
    <h2 class="text-center text-primary">Edit Todo</h2>
    @if($errors->any())
        <div class="text-warning bg-gradient border rounded-3 text-center border border-secondary">
            <ol>
                @if(is_iterable($errors->all()))
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                @else
                    {{$errors}}
                @endif
            </ol>
        </div>
    @endif
    <form method="post" action="{{route('todos.update',['todo'=>$todo])}}">
        @csrf
        @method('put')
        <div class="mb-3 mt-3">
            <label for="title">Title:</label>
            <input  type="text" class="form-control" id="title" value="{{$todo->title}}" placeholder="Enter Todo New Title" name="title">
        </div>
        <div class="mb-3 mt-3">
            <label for="description">Description:</label>
            <textarea rows="5" class="form-control" id="description" name="description">{{$todo->description}}</textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="currentCategory">Current Category:</label>
            <input readonly  type="text" class="form-control" id="currentCategory" value="{{$todo->category}}" placeholder="Current Category" name="currentCategory">
        </div>
        <div class="mb-3 mt-3">
            <label for="category">Select New Category:</label>
            <select class="form-control" id="category" name="category" size="3">
                @foreach($categories as $category)
                    <option value="{{$category->name}}">{{$category->id}} : {{$category->name}}</option>
                @endforeach
                <option value="New Category">0 : New Category</option>
            </select>
        </div>
        <div class="mb-3 mt-3">
            <label for="new category">New Category:</label>
            <input  type="text" class="form-control" id="new category" placeholder="Enter New Category Name" name="newCategory">
        </div>
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
