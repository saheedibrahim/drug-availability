@extends('layouts.app')
@section('title', 'Pharmacy home page')
@section('content')
<p>welcome</p>
<p>Register your drugs an quantity <a href="{{ route('drug.register') }}">here</a></p>
@endsection