@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/create.user.css" />
    <link rel="stylesheet" type="text/css" href="/css/components/message.box.css"/>
@endsection
@section('content')
    <main>
        <div class="success-message">
            User Created with success... <br />
            you will be redirected in few seconds
        </div>
        <div class="error-message">Error in create user</div>

        <form>
            <h1>Create your account here</h1>
            <input placeholder="First name... " type="text" name="first_name" value="" id="first_name" required />
            <input placeholder="Last name... " type="text" name="last_name" value="" id="last_name" required />
            <input placeholder="Email... " type="email" name="email" value="" id="email" required />
            <input placeholder="Passowrd... " type="password" name="password" value="" id="password" required />
            <button type="button" id="btnRegister">Register</button>
        </form>
    </main>
    <script type="text/javascript" src="{{asset('js/create.user.account.js')}}"></script>
@endsection
