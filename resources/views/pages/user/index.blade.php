@extends('layouts.parent')

@section('title', 'Dashboard - Home')

@section('content')
<h1>User</h1>
<p>Hallo, Welcome :) {{ Auth::user()->name }}!</p>
@endsection