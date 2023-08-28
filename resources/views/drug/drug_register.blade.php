@extends('layouts.app')
@section('title', 'Register and store drugs Page')
@section('content')
<form action="{{ route('drug.register') }}" method="post">
    @csrf
    <input type="text" name="name" id="" placeholder="Name of the drug"><br><br>
    <input type="text" name="actual_price" id="" placeholder="Pharmacist price"><br><br>
    <input type="text" name="quantity" id="" placeholder="Quantity of drugs to reqister"><br><br>
    <input type="submit" value="Register">
</form>
<p>Drugs already registered? Update quantity in store <a href="{{ route('drug.update') }}">here</a></p>
@endsection