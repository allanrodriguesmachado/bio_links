<h1>Dashboard</h1>




@foreach($links AS $link)
    @if($message = session()->get('message'))
        {{dd($message)}}
        <div>
            <h1>{{$message}}</h1>
        </div>
    @endif
    <ul>

        <li><a href="{{route('link.edit', $link)}}">{{$link['name']}}</a></li>
    </ul>
@endforeach
