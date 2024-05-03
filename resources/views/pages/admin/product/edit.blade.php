@extends('layouts.parent')

@section('title', 'Product-Edit')

@section('content')

    <div class="row">
        <div class="card p-4">
            <h3>Product Edit {{ $product->name }}</h3>

            <form action="{{ route('admin.product.update', $product->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-2">
                    <label for="inputName" class="form-label">product Name</label>
                    <input type="text" class="form-control" id="inputName" name="name" value="{{ $product->name }}">
                </div>

                <div class="mb-2">
                    <label class="col col-form-label">Select</label>
                    <div class="col ">
                        <select class="form-select" aria-label="Default select example" name="category_id">
                            <option selected>===== Choose Category =====</option>
                            @foreach ($category as $row)
                                @if ($product->category_id == $row->id)
                                    <option value="{{ $row->id }}" selected>{{ $row->name }}</option>
                                @else
                                    <option value="{{ $row->id }}">{{ $row->name }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="mb-2">
                    <label for="inputDescription" class="form-label">Product Description</label>
                    <textarea type="text" class="form-control" id="inputDescription" name="description">{{ $product->description }}</textarea>
                </div>

                <div class="mb-2">
                    <label for="inputPrice" class="form-label">Product Price</label>
                    <input type="text" class="form-control" id="inputPrice" name="price" value="{{ $product->price }}">
                </div>



                <div class="d-flex justify-content-end">
                    <button class="btn btn-primary" type="submit">
                        <i class="bi bi-plus"></i>
                        Edit Product
                    </button>
                </div>

                <div class="container">
                    <div class="d-flex justify-content-end">
                        <a href="{{ route('admin.product.index') }}" class="btn btn-primary mt-3 ">
                            <i class="bi bi-arrow-left"></i>Back</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection