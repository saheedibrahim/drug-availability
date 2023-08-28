@extends('layouts.app')
@section('title', 'Doctor home page')
@section('content')
<p>welcome</p>
<p>Search for your drug availabilty <a href="{{ route('drug.search') }}">here</a></p>
<a href="{{ route('doctor.logout') }}">Logout</a>
@endsection