<div>
    <h1>Criar um link</h1>

    <form action="{{route('links.create')}}" method="post">
        @csrf


        @if($message = session()->get('message'))
            <div>{{$message}}</div>
        @endif

        <div>
            <label for="name">E-mail</label>
            <input type="text" name="name" placeholder="Username" value="{{old('name')}}">
            @error('name') <span class="text-red-600">{{$message}}</span> @enderror
        </div>

        <br>

        <div>
            <label for="link">E-mail</label>
            <input type="text" name="link" placeholder="Link" value="{{old('link')}}">
            @error('link') <span class="text-red-600">{{$message}}</span> @enderror
        </div>

        <br>

        <div>
            <button type="submit">Register</button>
        </div>

        <div>
            <a href="{{route('welcome')}}">
                <button>Voltar</button>
            </a>
        </div>
    </form>
</div>
