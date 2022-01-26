@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/admin.home.css" />
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
            <button type="button">
                <a href="{{env('APP_URL')}}/admin/add/show">Create new show</a>
            </button>
            <table>
                <thead>
                    <tr class="title">
                        <th>Show Name</th>
                        <th>Show Date</th>
                        <th>Start time</th>
                        <th>End time</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Person Limit</th>
                    </tr>
                </thead>
                <tbody id="tablebody"></tbody>
            </table>
        </article>
    </main>
    <script type="text/javascript" src="{{asset('js/home.admin.js')}}"></script>
@endsection
