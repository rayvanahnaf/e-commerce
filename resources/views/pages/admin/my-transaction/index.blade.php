@extends('layouts.parent')
@section('title', 'My Transaction')
@section('content')
    <div>
        <div>
            <h3 class="fs-4">My Transaction</h3>
            <nav class="">
                <ol class="breadcrumb">
                    @if (Auth::user()->role == 'admin')
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    @else
                    <li class="breadcrumb-item"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                    @endif
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
                        <th>Phone</th>
                        <th>Status</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                    @forelse ($mytransaction as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ auth()->user()->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->email }}</td>
                            <td>{{ $row->phone }}</td>
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
                            <td>
                                @if (Auth::user()->role == 'admin')
                                    <a href="{{ route('admin.mytransaction.showDataBySlugAndId', [$row->slug, $row->id]) }}" class="btn btn-info"><i class="bi bi-eye">detail</i></a>
                                @else
                                <a href="{{ route('user.mytransaction.showDataBySlugAndId', [$row->slug, $row->id]) }}" class="btn btn-info"><i class="bi bi-eye">detail</i></a>
                                @endif
                            </td>
                        </tr>
                    @empty
                    @endforelse


                </tbody>
            </table>
        </div>
    </div>

@endsection
