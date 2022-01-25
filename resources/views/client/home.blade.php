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
                <span>Welcome User</span>
                <img src="/images/user.png" alt="user icon" />
            </li>
        </ul>
    </header>
    <main>
        <nav>
            <ul>
                <li>
                    Health
                </li>
                <li>
                    Tecnology
                </li>
                <li>
                    Business
                </li>
                <li>
                    Education
                </li>
                <li>
                    Entertainments
                </li>
                <li>
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
