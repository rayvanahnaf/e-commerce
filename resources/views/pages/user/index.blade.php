@extends('layouts.parent')
@section('title', 'User')

@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Category</h5>
        <nav class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Library</a></li>
                <li class="breadcrumb-item active">Product</li>
            </ol>
        </nav>
    </div>
</div>
@endsection