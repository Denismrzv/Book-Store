@extends('layouts.app')
@section('content')
<a href="{{route('adminPanel')}}">Admin panel</a>
<ul>
@foreach($books as $book)
<li><a href="{{route('show',$book->id)}}">{{$book->title}}</a></li>
@endforeach
</ul>
@endsection