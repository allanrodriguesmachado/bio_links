<div>
    <form action="{{route('login')}}" method="post">
        @csrf


        @if($message = session()->get('message'))
            <div>{{$message}}</div>
        @endif


       <div>
           <label for="username">E-mail</label>
           <input type="email" name="email" placeholder="E-mail" value="{{old('email')}}">
           @error('email') <span class="text-red-600">{{$message}}</span> @enderror
       </div>

        <br>

        <div>
            <label for="password">Password</label>
            <input type="password" name="password" placeholder="Password" value="{{old('password')}}">
            @error('password') <span class="text-red-600">{{$message}}</span> @enderror
        </div>

        <div>
            <button type="submit">Logar</button>
        </div>
    </form>
</div>
