@extends('layouts.app')

@section('title')
    Marathon
@endsection

@section('content')

    <form action="{{route('marathonUpdateSubmit', $data->id)}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Marathon name</label>
            <input class="form-control" value={{$data->name}} type="text" name="name" placeholder="Your name" id="name">
        </div>
        <div class="form-group">
            <label for="date">Date</label>
            <input class="form-control" value={{$data->date}} type="date" name="date" placeholder="Date" id="date">
        </div>

        <div class="form-group">
            <label for="length">Length</label>
            <input class="form-control" value={{$data->length}} type="number" name="length" placeholder="length" id="length">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
    </form>
@endsection
