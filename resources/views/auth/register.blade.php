<div>
    <h1>Register</h1>

    <form action="{{route('register')}}" method="post">
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
            <label for="email">E-mail</label>
            <input type="email" name="email" placeholder="E-mail" value="{{old('email')}}">
            @error('email') <span class="text-red-600">{{$message}}</span> @enderror
        </div>

        <br>

        <div>
            <label for="email_confirmation">E-mail confirmation</label>
            <input type="email" name="email_confirmation" placeholder="E-mail" >
        </div>

        <br>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" value="{{old('password')}}">
            @error('password') <span class="text-red-600">{{$message}}</span> @enderror
        </div>

        <div>
            <button type="submit">Register</button>
        </div>
    </form>
</div>
