@extends('layouts.parent')

@section('title', 'User')

@section('content')

<table class="table datatable">
    <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($user as $row)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $row->name }}</td>
                <td>{{ $row->email }}</td>
                <td>
                    <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPasswordUser{{ $row->id }}" type="button">
                        <i class="bi bi-pencil"></i>
                    </button>
                    @include('pages.admin.user.modal-reset-password')
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="4" class="text-center">Data Is Empty</td>
            </tr>
        @endforelse
    </tbody>
</table>

@endsection