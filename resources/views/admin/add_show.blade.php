@extends('layout')

@section('css')
    <link rel="stylesheet" type="text/css" href="/css/create.announcer.user.css" />
    <link rel="stylesheet" type="text/css" href="/css/components/message.box.css"/>
@endsection
@section('content')
    <main>
        <div class="success-message">
            Show with success... <br />
            you will be redirected in few seconds
        </div>
        <div class="error-message">Error in create user</div>

        <form>
            <h1>Add your show here </h1>
            <input placeholder="show name" type="text" name="show_name" value="" id="show_name" required />
            <input type="date" name="show_date" value="" id="show_date" required />
            <input type="time" name="start_time" value="" id="start_time" required />
            <input type="time" name="end_time" value="" id="end_time" required />
            <textarea placeholder="description" name="description" value="" id="description" required></textarea>
            <select name="category" id="category">
                <option value="business">business</option>
                <option value="health">health</option>
                <option value="tecnology">tecnology</option>
                <option value="education">education</option>
                <option value="entertainments">entertainments</option>
                <option value="others">others</option>
            </select>
            <input placeholder="person limit" type="number" min="1" name="person_limit" id="person_limit" required/>
            <button type="button" id="btnRegister">Register</button>
        </form>
    </main>
    <script type="text/javascript" src="{{asset('js/add.show.js')}}"></script>
@endsection
