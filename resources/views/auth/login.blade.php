<div>
    <form action="/login" method="post">
        @csrf

        <label for="username">Username</label>
        <input type="text" name="username" placeholder="Username" value="{{old('username')}}">

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" value="{{old('password')}}">

        <div>
            <button type="submit">Logar</button>
        </div>
    </form>
</div>
