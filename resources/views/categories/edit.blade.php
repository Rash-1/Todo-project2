@extends('layoutes.main')
@section('content')
    <h2 class="text-center text-primary">Edit Category</h2>
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
    <form method="post" action="{{route('categories.update',['category'=>$category])}}">
        @csrf
        @method('put')
        <div class="mb-3 mt-3">
            <label for="name">Name:</label>
            <input  type="text" class="form-control" id="name" value="{{$category->name}}" placeholder="Enter Category Name" name="name">
        </div>
        <button type="submit" class="btn btn-primary">Edite</button>
    </form>
@endsection
