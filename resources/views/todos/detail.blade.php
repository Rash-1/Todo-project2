@extends('layoutes.main')
@section('content')

    <h2 class="text-center text-primary">Todo Details</h2>
    @if(session()->has('massage'))
        <div class="text-center text-white bg-success mb-2 border rounded-3">
            {{session('massage')}}
        </div>
    @endif
    <form>
        <div class="mb-3 mt-3">
            <label for="title">Title:</label>
            <input  type="text" class="form-control" id="title" value="{{$todo->title}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="description">Description:</label>
            <textarea rows="5" class="form-control" id="description">{{$todo->description}}</textarea>
        </div>
        <div class="mb-3 mt-3">
            <label for="status">status:</label>
            <input  type="text" class="form-control text-center" id="status" value="{{$todo->status}}">
        </div>
        <div class="mb-3 mt-3">
            <label for="category">Category:</label>
            <input  type="text" class="form-control text-center" id="category" value="{{$todo->category}}">
        </div>
        @if($todo->status == 'done')
            <div class="mb-3 mt-3">
                <label for="check time">Check Time:</label>
                <input  type="text" class="form-control text-center" id="check time" value="{{$todo->checked_at}}">
            </div>
        @endif
        @if($todo->status == 'not done')
            <div class="mb-3 mt-3">
                <a class="btn btn-success form-control" href="{{route('todos.check',['todo'=>$todo])}}">Check</a>
            </div>
        @endif
    </form>
@endsection
