@extends('layouts.app')
@section('title', 'Doctor Login Page')
@section('content')
    <form action="{{ route('doctor.login') }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Email or Name of hospital">
        <input type="password" name="password" placeholder="Password" id="">
        <input type="submit" value="Login">    
    </form>
    <p>Don't have an account <a href="{{ route('doctor.signup') }}">Signup Here</a></p>
@endsection