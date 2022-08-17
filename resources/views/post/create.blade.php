@extends('layouts.main')
@section('content')
    <div>
        <form action="{{route('family.store')}}" method="post">
            @csrf
            <div class="mb-3">
                <label for="Name" class="form-label">Name</label>
                <input

                    value="{{ old('name') }}"

                    type="text" name="name" class="form-control" id="Name" placeholder="Name">
                @error('name')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>

            <div class="mb-3">
                <label for="Age" class="form-label">Age</label>
                <input

                    value="{{ old('age') }}"

                    type="text" name="age" class="form-control" id="Age" placeholder="Age">
                @error('age')
                <p class="text-danger">{{$message}}</p>
                @enderror
            </div>
            <div class="mb-3">
                <label for="Category" class="form-label">Категорія</label>
                <select class="form-control" id="category" name="category_id">
                    @foreach($categories as $category)
                        <option

                            {{old('category_id') == $category->id ? 'selected' : ""}}

                            value="{{$category->id}}">{{$category->title}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="tags">Tags</label>
                <select multiple class="form-control" id="tags" name="tags[]">
                    @foreach($tags as $tag)
                        <option value="{{$tag->id}}">{{$tag->title}}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create</button>
        </form>


    </div>
@endsection

