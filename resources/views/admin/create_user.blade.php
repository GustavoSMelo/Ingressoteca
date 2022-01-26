@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/create.announcer.user.css" />
    <link rel="stylesheet" type="text/css" href="/css/components/message.box.css"/>
@endsection
@section('content')
    <main>
        <div class="success-message">
            Announcer Created with success... <br />
            you will be redirected in few seconds
        </div>
        <div class="error-message">Error in create user</div>

        <form>
            <h1>Create your admin account here</h1>
            <input placeholder="name" type="text" name="name" value="" id="name" required />
            <input placeholder="Email... " type="email" name="email" value="" id="email" required />
            <input placeholder="Passowrd... " type="password" name="password" value="" id="password" required />
            <button type="button" id="btnRegister">Register</button>
        </form>
    </main>
    <script type="text/javascript" src="{{asset('js/create.announcer.account.js')}}"></script>
@endsection
