@extends('layouts.app')
@section('title', 'Doctor Signup Page')
@section('content')
    <form action="{{ route('doctor.signup') }}" method="post">
        @csrf
        <input type="text" name="name" placeholder="Fullname">
        @if($errors->has('name'))
            <span>{{ $errors->first('name') }}</span>
        @endif<br><br>
        <input type="text" name="email" placeholder="Email">
        @if($errors->has('email'))
            <span>{{ $errors->first('email') }}</span>
        @endif<br><br>
        <input type="text" name="phone_number" placeholder="Phone number">
        @if($errors->has('phone_number'))
            <span>{{ $errors->first('phone_number') }}</span>
        @endif<br><br>
        <input type="text" name="hospital" placeholder="Name of hospital">
        @if($errors->has('hospital'))
            <span>{{ $errors->first('hospital') }}</span>
        @endif<br><br>
        <input type="text" name="address" placeholder="Address of hospital">
        @if($errors->has('address'))
            <span>{{ $errors->first('address') }}</span>
        @endif<br><br>
        <input type="password" name="password" placeholder="Password" id="">
        @if($errors->has('password'))
            <span>{{ $errors->first('password') }}</span>
        @endif<br><br>
        <input type="password" name="confirm_password" placeholder="Password Confirmation" id=""><br><br>
        <input type="submit" value="Signup">    
    </form>
    <p>If you already have an account <a href="{{ route('doctor.login') }}">Login Here</a></p>
@endsection