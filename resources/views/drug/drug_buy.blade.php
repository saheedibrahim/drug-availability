@extends('layouts.app')
@section('title', 'Drug bought in Store Page')
@section('content')
<form action="{{ route('drug.buy') }}" method="post">
    @method('PUT')
    @csrf
    <input type="text" name="name" id="" value="{{ $quantityInStore->name }}"><br><br>
    <input type="text" name="quantity" id="" placeholder="Quantity to buy"><br><br>
    <input type="submit" value="Buy Drug">
</form>
@endsection