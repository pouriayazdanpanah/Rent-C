<nav aria-label="breadcrumb">
    <ol class="breadcrumb bg-transparent ">
{{--       <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a></li>--}}
        <div class="d-flex">
            <i class="fas fa-angle-double-right breadcrumb-item"></i>
            @php
                $segments = '';
            @endphp
            @foreach(request()->segments() as $segment)
                @php
                    $segments .= '/'.$segment
                @endphp
                <li class="breadcrumb-item" ><a href="{{$segments}}">{{$segment}}</a></li>
            @endforeach
        </div>
    </ol>
</nav>
