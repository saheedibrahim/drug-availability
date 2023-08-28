@extends('layouts.app')
@section('title', 'Drug Search Page')
@section('content')
<form action="{{ route('drug.buy') }}" method="get">
    @csrf
    <input type="text" name="name" id="" placeholder="Name of the drug"><br><br>
    <input type="submit" value="Search">
</form>
@endsection