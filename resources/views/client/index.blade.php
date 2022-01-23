@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/index.css" />
@endsection

@section('content')
    <main>
        <section>
            <h1>Ingressoteca</h1>
            <p>The best place to find and watch your favorites show in you own house</p>
            <button type="button"><a href="{{env('APP_URL')}}/create/user/account">Register now </a></button>
            <a href="{{env('APP_URL')}}/user/login">Already has a account ? login here</a>
        </section>

        <figure>
            <img src="/images/watching_show.svg" alt="Person watching a movie" />
        </figure>
    </main>
@endsection
