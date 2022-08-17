@extends('layouts.main')
@section('content')
    <div>

            <div>
                {{$post->id}} . {{$post->name}}  {{$post->age}}
            </div>

    </div>
    <div>
        <a href="{{route('family.edit', $post->id)}}">Редагуати</a>
    </div>
    <div>
       <form action="{{route('family.delete',$post->id)}}" method="post">
           @csrf
           @method('delete')
           <input type="submit" value="Delete" class="btn btn-danger">
       </form>
    </div>
    <div>
        <a href="{{route('family.index')}}">Назад</a>
    </div>

@endsection

