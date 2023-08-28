@extends('layouts.app')
@section('title', 'Pharmacy Signup Page')
@section('content')
    <form action="{{ route('pharmacy.login') }}" method="post">
        @csrf
        <input type="text" name="email" placeholder="Email or Name of pharmacy">
        <input type="password" name="password" placeholder="Password" id="">
        <input type="submit" value="Login">
    </form>
    <p>Don't have an account <a href="{{ route('pharmacy.signup') }}">Signup Here</a></p>
@endsection