@extends('layouts.app')

@section('title')
    Home page
@endsection

@section('content')
    @if(Auth::check())
    <h1>Welcome, {{Auth::user()->name}}</h1>
    @endif

    @if(Auth::user()->role->id == 1)
    <h1>You are admin</h1>
    @endif

    @if(Auth::user()->role->id == 2)
        <h1>You are runner</h1>
    @endif
@endsection

@section('aside')
    @parent
    <p>Some text</p>
    @endsection
