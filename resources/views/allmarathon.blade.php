@extends('layouts.app')

@section('title')
    All Marathons
@endsection

@section('content')

    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">ID</th>
            <th scope="col">Name</th>
            <th scope="col">Date</th>
            <th scope="col">Length</th>
            @if(Auth::check() && Auth::user()->role->id == 1)
            <th>Change</th>
            @endif
            @if(Auth::check() && Auth::user()->role->id == 1)
                <th>Delete</th>
            @endif
            @if(Auth::check() && Auth::user()->role->id == 2)
                <th>Images</th>
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($data as $marathon)
        <tr>
            <th scope="row">{{$marathon->id}}</th>
            <td>{{$marathon->name}}</td>
            <td>{{$marathon->date}}</td>
            <td>{{$marathon->length}}</td>
            @if(Auth::check() && Auth::user()->role->id == 1)
            <td> <a href="{{ route('marathon-update', $marathon->id) }}"> <button  class="btn btn-success">Update</button> </a></td>
            @endif
            @if(Auth::check() && Auth::user()->role->id == 1)
                <td> <a href="{{ route('marathon-delete', $marathon->id) }}"> <button  class="btn btn-danger">Delete</button> </a></td>
            @endif
            @if(Auth::check() && Auth::user()->role->id == 2)
                <td> <a href="{{ route('AllImages', $marathon->id) }}"> <button  class="btn btn-warning">Upload Image</button> </a></td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>



    <style>
        body{background:url(/images/bg/bg-1.png)}

        .img-sm {
            width: 46px;
            height: 46px;
        }
        .panel {
            box-shadow: 0 2px 0 rgba(0,0,0,0.075);
            border-radius: 0;
            border: 0;
            margin-bottom: 15px;
        }
        .panel .panel-footer, .panel>:last-child {
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
        }
        .panel .panel-heading, .panel>:first-child {
            border-top-left-radius: 0;
            border-top-right-radius: 0;
        }
        .panel-body {
            padding: 25px 20px;
        }
        .media-block .media-left {
            display: block;
            float: left
        }
        .media-block .media-right {
            float: right
        }
        .media-block .media-body {
            display: block;
            overflow: hidden;
            width: auto
        }
        .middle .media-left,
        .middle .media-right,
        .middle .media-body {
            vertical-align: middle
        }
        .thumbnail {
            border-radius: 0;
            border-color: #e9e9e9
        }
        .tag.tag-sm, .btn-group-sm>.tag {
            padding: 5px 10px;
        }
        .tag:not(.label) {
            background-color: #fff;
            padding: 6px 12px;
            border-radius: 2px;
            border: 1px solid #cdd6e1;
            font-size: 12px;
            line-height: 1.42857;
            vertical-align: middle;
            -webkit-transition: all .15s;
            transition: all .15s;
        }
        .text-muted, a.text-muted:hover, a.text-muted:focus {
            color: #acacac;
        }
        .text-sm {
            font-size: 0.9em;
        }
        .text-5x, .text-4x, .text-5x, .text-2x, .text-lg, .text-sm, .text-xs {
            line-height: 1.25;
        }
        .btn-trans {
            background-color: transparent;
            border-color: transparent;
            color: #929292;
        }
        .btn-icon {
            padding-left: 9px;
            padding-right: 9px;
        }
        .btn-sm, .btn-group-sm>.btn, .btn-icon.btn-sm {
            padding: 5px 10px !important;
        }
        .mar-top {
            margin-top: 15px;
        }
    </style>

    <section class="container">
        <div class="row">

            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-body">
                        <form action="{{route('comment-form', Auth::user()->id)}}" method="post">
                            @csrf
                            <textarea class="form-control" rows="2" placeholder="Добавьте Ваш комментарий" name="body" id="body"></textarea>
                            <div class="mar-top clearfix">
                                <button class="btn btn-sm btn-primary pull-right" type="submit"><i class="fa fa-pencil fa-fw"></i> Добавить</button>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="panel">
                    @foreach($comments as $com)
                    <div class="panel-body">
                        <!-- Содержание Новостей -->
                        <!--===================================================-->
                        <div class="media-block">
                            <a class="media-left" href="#"><img class="img-circle img-sm" alt="Профиль пользователя" src="https://bootstraptema.ru/snippets/icons/2016/mia/1.png"></a>
                            <div class="media-body">
                                <div class="mar-btm">
                                    <a href="#" class="btn-link text-semibold media-heading box-inline">{{Auth::user()->find($com->user->id)->name}} </a>
                                    <p class="text-muted text-sm"><i class="fa fa-mobile fa-lg"></i> {{$com->created_at}}</p>
                                </div>
                                <p>{{$com->body}}</p>
                                <div class="pad-ver">
                                    <a class="btn btn-sm btn-default btn-hover-primary" href="#">Ответить</a>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                        @endforeach
                </div>
            </div>

        </div><!-- /.row -->
    </section><!-- /.container -->
@endsection
