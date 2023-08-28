@extends('layouts.app')
@section('title', 'Update Drug in Store Page')
@section('content')
<form action="{{ route('drug.update') }}" method="post">
    @method('PUT')
    @csrf
    <input type="text" name="name" id="" placeholder="Name of the drug"><br><br>
    <input type="text" name="new_price" id="" placeholder="Pharmacist new price"><br><br>
    <input type="text" name="quantity" id="" placeholder="Quantity to add to store"><br><br>
    <input type="submit" value="Update">
</form>
@endsection