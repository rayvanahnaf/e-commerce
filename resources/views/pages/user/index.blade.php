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

<div class="section dashboard">
    <div class="row">
        <div class="col-md-4">
            
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Pending <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $pending }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-md-4">
            
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Settlement <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart-check-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $settlement }}</h6>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>

        <div class="col-md-4">
            
            <div class="card info-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Expired <span>| Total</span></h5>
                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-file-person-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $expired }}</h6>
                        </div>
                    </div>
                    <div class="">
                        <a href="http://127.0.0.1:8000/admin/userList" class="btn btn-primary">See All User</a>
                    </div>  
                </div>
            </div>
            
        </div>

    </div>
</div>  

@endsection