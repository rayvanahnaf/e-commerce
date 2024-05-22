@extends('layouts.parent')

@section('title', 'Admin - Product')

@section('content')
<div class="card">
    <div class="card-body">
        <h2 class="card-title fs-2">Product</h2>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Product</a></li>
                <li class="breadcrumb-item active">Data Product</li>
            </ol>
        </nav>

        <!-- Button to trigger modal for creating a new product -->
      <div class="d-flex justify-content-end">  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModalProduct">
            <i class="bi bi-plus"></i> Add Product

        </button></div>
      
        @include('pages.admin.Product.product-create')
        <!-- Include the modal for creating a new product -->


    </div>
    <table class="table datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    
                    <th>Price</th>
                    <th>Category</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($product as $row)
                                        <tr>
                                            <td><p class="text-center bg-primary text-white  rounded-5">{{ $loop->iteration }}</p></td>
                                            <td>{{ $row->name }}</td>
                                            <td>{{ $row->price }}</td>
                                            <td>{{ $row->category->name }}</td>
                                            
                                            <td class="d-flex justify-content-evenly">
                                            <form action="{{ route('admin.product.destroy', $row->id) }}" method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        <i class="bi bi-trash text-white"></i>
                                                    </button>
                                                </form>
                                                <a href="{{route('admin.product.gallery.index', $row->id)}}" class="btn btn-primary">
                                                    <i class="bi bi-images"></i>
                                                </a>
                                                <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModalProduct{{ $row->id }}">
                                                    <i class="bi bi-pencil text-white"></i>
                                                </button>

                                                @include('pages.admin.Product.product-edit')
                                             

                                            </td>
                                        </tr>
                                    @empty
                                        <tr> 
                                            <td colspan="4" class="text-center fs-2 fw-bold ">Empty, No
                                                Items Found</td>
                                        </tr>
                                    @endforelse
            </tbody>
        </table>

</div>
@endsection