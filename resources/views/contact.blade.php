@extends('layouts.app')

@section('title')
    Contact
@endsection

@section('content')
<h1>Contact</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{route('contact-form')}}" method="post">
        @csrf
        <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Choose the marathon you want</label>
        <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="marathon">
            @foreach($data as $marathon)
                <option value="{{$marathon->id}}">{{$marathon->name}}</option>
            @endforeach
        </select>
        <div class="form-group">
            <label for="name">Your name</label>
            <input class="form-control" type="text" name="name" placeholder="Your name" id="name">
        </div>
        <div class="form-group">
            <label for="email">Your email</label>
            <input class="form-control" type="text" name="email" placeholder="Your email" id="email">
        </div>

        <button type="submit" class="btn btn-success">Send</button>
    </form>
@endsection
