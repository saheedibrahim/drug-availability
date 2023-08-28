@extends('layouts.app')
@section('title', 'Pharmacy Signup Page')
@section('content')
    <form action="{{ route('pharmacy.signup') }}" method="post">
        @csrf
        <input type="text" name="pharmacist" placeholder="Pharmacist">
        @if($errors->has('pharmacist'))
            <span>{{ $errors->first('pharmacist') }}</span>
        @endif <br><br>
        <input type="email" name="email" placeholder="Email">
        @if($errors->has('email'))
            <span>{{ $errors->first('email') }}</span>
        @endif <br><br>
        <input type="text" name="phone_number" placeholder="Phone number">
        @if($errors->has('phone_number'))
            <span>{{ $errors->first('phone_number') }}</span>
        @endif <br><br>
        <input type="text" name="pharmacy" placeholder="Name of pharmacy">
        @if($errors->has('pharmacy'))
            <span>{{ $errors->first('pharmacy') }}</span>
        @endif <br><br>
        <input type="text" name="address" placeholder="Address of hospital">
        @if($errors->has('address'))
            <span>{{ $errors->first('address') }}</span>
        @endif <br><br>
        <input type="password" name="password" placeholder="Password" id="">
        @if($errors->has('password'))
            <span>{{ $errors->first('password') }}</span>
        @endif <br><br>
        <input type="password" name="password_confirmation" placeholder="Confirm Password" id="">
        <input type="submit" value="Signup">    
    </form>
    <p>If you already have an account <a href="{{ route('pharmacy.login') }}">Login Here</a></p>
@endsection