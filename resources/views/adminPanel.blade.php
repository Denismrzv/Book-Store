@extends('layouts.app')
@section('content')
<button>create</button>
<div>
    <ul>
        @foreach($books as $book)
        <div>
            <li><a href="{{route('show',$book->id)}}">{{$book->title}}</a></li>
            <a href="{{route('update',$book->id)}}">update</a>
        </div>
        @endforeach
    </ul>
</div>
@endsection