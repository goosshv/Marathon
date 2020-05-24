@extends('layouts.app')

@section('title')
    Marathon
@endsection

@section('content')
    <h1>Marathon</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('marathon-form')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Marathon name</label>
            <input class="form-control" type="text" name="name" placeholder="Your name" id="name">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input class="form-control" type="date" name="date" placeholder="Date" id="date">
        </div>

        <div class="form-group">
            <label for="length">Length</label>
            <input class="form-control" type="number" name="length" placeholder="length" id="length">
        </div>

        <button type="submit" class="btn btn-success">Send</button>
    </form>
@endsection
