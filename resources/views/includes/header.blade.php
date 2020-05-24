<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Marathonphoto.ru</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{route('home')}}">Home</a>
        <a class="p-2 text-dark" href="{{route('about')}}">About us</a>
        <a class="p-2 text-dark" href="{{route('contact-list')}}">Support Marathon</a>
        @if(Auth::check() && Auth::user()->role->id == 1)
            <a class="p-2 text-dark" href="{{route('marathon')}}">Add marathon</a>
        @endif
        <a class="p-2 text-dark" href="{{route('AllMarathons')}}">All marathons</a>
    </nav>
    @if(!Auth::check())
    <a class="btn btn-outline-primary mr-3" href="/register">Sign up</a>
    <a class="btn btn-outline-secondary" href="/login">Sign in</a>
    @endif
    @if(Auth::check())
    <a class="btn btn-outline-danger" href="/logout">Sign out</a>
    @endif
</div>
