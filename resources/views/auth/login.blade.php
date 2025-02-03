<div>
    <form action="/login" method="post">
        @csrf

        <label for="username">E-mail</label>
        <input type="email" name="email" placeholder="E-mail" value="{{old('email')}}">

        <label for="password">Password</label>
        <input type="password" name="password" placeholder="Password" value="{{old('password')}}">

        <div>
            <button type="submit">Logar</button>
        </div>
    </form>
</div>
