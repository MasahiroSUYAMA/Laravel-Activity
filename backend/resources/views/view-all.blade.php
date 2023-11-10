@extends('layouts.app')

@section('title', 'All Posts')

@section('header')
    <h1>All Posts</h1>
@endsection

@section('content')
    <!-- <p>This is the main content.</p> -->
    @if($post_titles)
        <ul>
            @foreach($post_titles as $title)
                <li>{{$title}}</li>
            @endforeach
        </ul>
    @endif
@endsection

@section('footer')
    <p>This is the footer</p>
@endsection