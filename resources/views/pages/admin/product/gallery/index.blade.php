@extends('layouts.parent')

@section('title', 'Admin - ProductGallery')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title fs-2">Product Gallery >> {{$product->name}}</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Product</a></li>
                <li class="breadcrumb-item active">Product Gallery</li>
            </ol>
        </nav>

        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
            <i class="bi bi-plus"></i> Add Images
        </button>
        @include('pages.admin.Product.gallery.modal-create')
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($product->product_galleries as $row )
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td><img src="{{url ('storage/product/gallery/',$row->image) }}"  class="img-fluid" width="100px"     alt="{{ $row->name }}"></td>

                    <td>
                        <form action="{{ route('admin.product.gallery.destroy', [$product->id,$row->id]) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i> Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td class="text-center" colspan="3">
                        Data Not Found
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
        <div class="d-flex justify-content-end">
        <a href="{{route('admin.product.index')}}" class="btn btn-outline-warning"><i class="bi bi-back"></i> Back</a>
        </div>
    </div>
</div>
@endsection