@extends('layoutes.main')
@section('content')
    @if(session()->has('massage'))
       <div class="text-center text-white bg-success mb-2 border rounded-3">
           {{session('massage')}}
       </div>
    @endif
    <table class="table table-dark table-striped table-bordered table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Delete</th>
                <th scope="col">Edit</th>
            </tr>
        </thead>
        <tbody>
            @foreach($result as $category)
                <tr>
                    <td>
                        {{$category->id}}
                    </td>
                    <td>
                        {{$category->name}}
                    </td>
                    <td>
                        <a class="btn btn-warning" href="{{route('categories.edit',['category'=>$category])}}">Edit</a>
                    </td>
                    <td>
                        <form action="{{route('categories.delete',['category'=>$category])}}" method="post">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
        <caption>
           *< Categories >*
        </caption>
    </table>
    <div class="text-end">
        <a href="{{route('categories.create')}}" class="btn border rounded-pill border-secondary pb-1 text-info">
            New Category
        </a>
    </div>
@endsection
