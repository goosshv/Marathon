@extends('layouts.app')

@section('title')
    Marathon
@endsection

@section('content')
    <h1>Images</h1>
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('image-form', $data->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="row">

            <div class="col-md-6">
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-md-6">
                <button type="submit" class="btn btn-success">Upload</button>
            </div>

        </div>
    </form>
@endsection
