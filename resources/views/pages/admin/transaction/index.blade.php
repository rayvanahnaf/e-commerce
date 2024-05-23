@extends('layouts.parent')
@section('title', 'My Transaction')
@section('content')
    <div>
        <div>
            <h3 class="fs-4">My Transaction</h3>
            <nav class="">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                        <th>No</th>
                        <th>Account</th>
                        <th>Reciever Name</th>
                        <th>Email</th>
                        <th>Reciever Phone</th>
                        <th>Payment Url</th>
                        <th>status</th>
                        <th>Total Price</th>
                        <th>Action</th>

                    </tr>
                </thead>
                <tbody>

                    @forelse ($transaction as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->user->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
                            <td>
                                @if ($row->payment_url)
                                    <a href="{{ $row->payment_url }}" target="_blank" class="btn btn-info d-flex justify-content-center">Pay</a>
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @if ($row->status == 'EXPIRED')
                                <span class="badge bg-danger text-uppercast">Expired</span>
                                    @elseif ($row->status == 'PENDING')
                                    <span class="badge bg-warning text-uppercast">Pending</span>
                                    @elseif ($row->status == 'SATTLEMENT')
                                    <span class="badge bg-info text-uppercast">Settlement</span>
                                    @else
                                    <span class="badge bg-success text-uppercast">Success</span>
                                @endif
                            </td>
                            <td>{{ number_format($row->total_price) }}</td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#basicModal{{ $row->id }}">
                                    <i class="bi bi-eye"></i>
                                </button>
                                @include('pages.admin.my-transaction.modal-show')
                            </td>
                        </tr>
                    @empty
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

@endsection
