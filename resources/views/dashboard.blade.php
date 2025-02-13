<h1>Dashboard</h1>

@foreach($links AS $link)
    <ul>
        <li>{{$link['name']}}</li>
        <li>{{$link['link']}}</li>
    </ul>
@endforeach
