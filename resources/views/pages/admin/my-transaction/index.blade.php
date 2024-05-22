@extends('layouts.parent')
@section('title', 'My Transaction')
@section('content')
<div>
    <div>
        <h3 class="fs-4">My Transaction</h3>
        <nav class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Transaction</a></li>
                <li class="breadcrumb-item active">My Transaction</li>
            </ol>
        </nav>
    </div>
</div>
<div class="card">
    <div class="card-body">
        <h3 class="card-title">
            <i class="bi bi-cart"></i> List Transaction
        </h3>

        <table class="table datatable table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Account</th>
                    <th scope="col">Reciever Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Phone</th>
                    <th scope="col">Total Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @forelse ($mytransaction as $row)
                    <td>{{ $loop->iteration }}</td>
                        <td>{{ auth()->user()->name }}</td>
                        <td>{{ $row->name }}</td>
                        <td>{{ $row->email }}</td>
                        <td>{{ $row->phone }}</td>
                        <td></td>
                        <td></td>
                    @empty
                    
                    @endforelse

                </tr>
            </tbody>
        </table>
    </div>
</div>

@endsection