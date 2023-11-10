@extends('layouts.app')

@section('title', '{{$myName}}')

@section('header')
    <h1>{{$myName}} Post</h1>
@endsection

@section('content')
    <p>Post ID: {{$post_id}}</p>
    <p>This is the post of {{$myName}}</p>


@endsection

@section('footer')
    
@endsection