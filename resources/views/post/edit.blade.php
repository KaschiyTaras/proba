@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('family.update',$post->id)}}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input type="text" name="name" class="form-control" id="Name" placeholder="Name" value="{{$post->name}}">
            </div>

            <div class="mb-3">
                <label for="Age" class="form-label">Age</label>
                <input type="text" name="age" class="form-control" id="Age" placeholder="Age" value="{{$post->age}}">
            </div>
            <div class="mb-3">
                <label for="Category" class="form-label">Категорія</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option
                            {{$category->id === $post->category->id ?'selected' : ''}}
                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Оновити</button>
        </form>
    </div>
@endsection

