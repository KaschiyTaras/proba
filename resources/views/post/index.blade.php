@extends('layouts.main')
@section('content')
    <div>
        <div>
            <a href="{{route('family.create')}}" class="btn btn-primary mb-3">Добавити</a>
        </div>
        @foreach($posts as $post)
            <div>
                <a href="{{route('family.show',$post->id)}}"> {{$post->id}} . {{$post->name}}</a>
            </div>
        @endforeach
    </div>

@endsection

