<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>
<body>
    @include('includes.header')

    @if(Request::is('/'))
        @include('includes.hero')
    @endif

    <div class="container mt-5">
        @include('message')
        <div class="row">
            <div class="col-8">
                @yield('content')
            </div>
{{--            <div class="col-4">--}}
{{--                @include('includes.aside')--}}
{{--            </div>--}}
        </div>
    </div>
    @include('includes.footer')
</body>
</html>
