<div>
    <h1>Criar um link</h1>

    <form action="{{route('link.update', $link)}}" method="post">
        @csrf
        @method("PUT")

        @if($message = session()->get('message'))
            <div>
                <h1>{{$message}}</h1>
            </div>
        @endif

        <div>
            <label for="name">E-mail</label>
            <input type="text" name="name" placeholder="Username" value="{{old('name', $link->name)}}">
            @error('name') <span class="text-red-600">{{$message}}</span> @enderror
        </div>

        <br>

        <div>
            <label for="link">E-mail</label>
            <input type="text" name="link" placeholder="Link" value="{{old('link', $link->link)}}">
            @error('link') <span class="text-red-600">{{$message}}</span> @enderror
        </div>

        <br>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</div>
