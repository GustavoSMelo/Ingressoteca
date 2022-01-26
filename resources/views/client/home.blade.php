@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/home.css" />
@endsection

@section('content')
    <header>
        <figure>
            <img src="/images/ingressoteca.png" alt="logo" />
        </figure>
        <ul>
            <li>
                <a href="{{env('APP_URL')}}/user/profile">
                    <span>Welcome</span>
                    <img src="/images/user.png" alt="user icon" />
                </a>
            </li>
        </ul>
    </header>
    <main>
        <nav>
            <ul>
                <li onclick="filterCategory('health')">
                    Health
                </li>
                <li onclick="filterCategory('tecnology')">
                    Tecnology
                </li>
                <li onclick="filterCategory('business')">
                    Business
                </li>
                <li onclick="filterCategory('education')">
                    Education
                </li>
                <li onclick="filterCategory('entertainments')">
                    Entertainments
                </li>
                <li onclick="filterCategory('others')">
                    Others
                </li>
            </ul>
        </nav>
        <span>
            <h2>Awesome shows to you see: </h2>
            <section class="show-grid">
                <ul class="show-grid-ul">
                </ul>
            </section>
        </span>
    </main>
    <script type="text/javascript" src="{{asset('js/home.js')}}"></script>
@endsection
