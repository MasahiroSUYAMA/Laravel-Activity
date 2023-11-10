@extends('layouts.app')

@section('title', 'View Post')

@section('header')
    <h1>View Post</h1>
@endsection

@section('content')
    <p>Post ID: {{$post_id}}</p>
    <p>This is the post of {{$myName}}</p>
    <hr>
    <h1>Conditional Directives</h1>

    @if($myName === "john")
        <p>The name is John.</p>
    @elseif($myName === "dave")
        <p>The name is Dave.</p>
    @else 
        <p>The name is not identified</p>
    @endif

    <hr>
    <h1>Loop Directives</h1>
    @while($x <=5)
        <p>foobar</p>
        <p hidden>{{$x++;}}</p>
    @endwhile

    @for($i = 0; $i < 10; $i++)
        <p>Index {{$i}}</p>
    @endfor

    @foreach($countries as $country)
        <li>{{$country}}</li>

    @endforeach

    @forelse($categories as $category)
        <li>{{$category}}</li>
    @empty 
        <p>The category is empty.</p>
    @endforelse



@endsection

@section('footer')
    
@endsection

