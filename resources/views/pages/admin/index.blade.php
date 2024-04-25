@extends('layouts.parent')

@section('title', 'Dashboard')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">With Home Icon</h5>

            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="index.html"><i class="bi bi-house-door"></i></a></li>
                    <li class="breadcrumb-item"><a href="#">Library</a></li>
                    <li class="breadcrumb-item active">Default</li>
                </ol>
            </nav>
        </div>
    </div>

    </div>
    Hello {{ Auth::user()->name }}
@endsection
