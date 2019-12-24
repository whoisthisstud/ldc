@extends('layouts.public')

@section('page-title', '{{ $city->name }} - {{ $business->name }}')

@section('content')
    <h3>{{ $discount->code }}</h3>
@endsection
