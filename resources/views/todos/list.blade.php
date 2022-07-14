@extends('layoutes.main')
@section('content')
    <h2 class="text-center text-primary">Todos List</h2>
    @if(session()->has('massage'))
        <div class="text-center text-white bg-success mb-2 border rounded-3">
            {{session('massage')}}
        </div>
    @endif
    <table class="table table-dark table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th scope="col">Category</th>
            <th scope="col">Title</th>
            <th scope="col">Detail</th>
            <th scope="col">Status</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @if(is_iterable($todos))
            @foreach($todos as $todo)
                <tr>
                    <td>
                        {{$todo->category}}
                    </td>
                    <td>
                        {{$todo->title}}
                    </td>
                    <td>
                        <a class="btn btn-info" href="{{route('todos.detail',['todo'=>$todo])}}">Detail</a>
                    </td>
                    <td>
                        {{$todo->status}}
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('todos.edit',['todo'=>$todo])}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('todos.delete',['todo'=>$todo])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        @else
            <h2 class="border border-secondary rounded-3 text-white bg-warning">{{$todos}}</h2>
        @endif
        </tbody>
        <caption>
            *< Todos >*
        </caption>
    </table>

    <div class="text-end">
        <a href="{{route('todos.create')}}" class="btn border rounded-pill border-secondary pb-1 text-info">
            New Todo
        </a>
        <a href="{{route('categories.list')}}" class="btn border rounded-pill border-secondary pb-1 text-info">
            Filter
        </a>
    </div>
@endsection

