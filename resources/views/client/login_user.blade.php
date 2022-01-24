@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/login.user.css" />
    <link rel="stylesheet" type="text/css" href="/css/components/message.box.css" />
@endsection

@section('content')
    <main>
        <div class="error-message">
            Email or password incorrect, try again
        </div>
        <form>
            <h1>Login here</h1>

            <input type="email" name="email" id="email" required placeholder="Email..." />
            <input type="password" name="password" id="password" required placeholder="Password..." />

            <button type="button" id="btnLogin">Login</button>
        </form>
    </main>

    <script type="text/javascript" src="{{asset('js/login.user.js')}}"></script>
@endsection
