@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/user.profile.css"/>
@endsection

@section('content')
    <main>
        <section>
            <figure>
                <img src="/images/user.png" alt="user icon" />
            </figure>
            <span class="user-information">
            </span>
        </section>

        <article>
            <h2>Tickets</h2>
            <table class="tickets">
            </table>
        </article>
    </main>
    <script type="text/javascript" src="{{asset('js/user.profile.js')}}" ></script>
@endsection
