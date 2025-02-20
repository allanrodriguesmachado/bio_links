<h1 class="text-2xl font-bold mb-4">Dashboard</h1>


<x-app>

    @if($message = session()->get('message'))
        <div class="mb-4">
            <h1 class="text-green-600">{{$message}}</h1>
        </div>
    @endif

    <div class="flex">
        <ul class="">
            @foreach($links as $link)
                <li>

                    @unless($loop->last)
                        <form action="{{route('link.down', $link)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button>Down</button>
                        </form>
                    @endunless

                    @unless($loop->first)
                        <form action="{{route('link.up', $link)}}" method="post">
                            @csrf
                            @method('PATCH')
                            <button>UP</button>
                        </form>
                    @endunless

                    <div class="flex items-center justify-between border-b pb-2">
                        <a href="{{ route('link.edit', $link) }}" class="text-blue-500 hover:text-blue-700">
                            {{$link['name']}}
                        </a>
                        <form onsubmit="return confirm('Tem Certeza')" action="{{ route('link.destroy', $link) }}" method="post" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700">
                                X
                            </button>
                        </form>
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
</x-app>
