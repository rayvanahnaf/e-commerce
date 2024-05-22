<div class="modal fade" id="createModalProduct" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Add Product</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="row mb-3">
                <form action="{{route('admin.product.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('POST')
                    <div class="modal-body">
                        <div class="col-12">
                            <label for="productName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="productName" name="name" value="{{old('name')}}">
                        </div>
                        <div class="col-12">
                            <label for="productPrice" class="form-label">Price</label>
                            <input type="number" class="form-control" id="productPrice" value="{{old('price')}}" name="price">
                        </div>
                        <div class="col-12">
                            <label for="productDescription" class="form-label">Description</label>
                            <textarea class="form-control" style="height: 100px" name="description" value="{{old('description')}}" id="productDescription"></textarea>
                        </div>
                        <div class="col-12">
                            <label class="col-sm-2 col-form-label">Chose Category</label>
                            <div class="col-sm-10">
                                <select class="form-select" name="category_id" aria-label="Default select example">
                                    <option selected>--Select Category--</option>
                                    @foreach ($category as $row)
                                    <option value="{{$row->id}}">{{$row->name}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-success">Save <i class="bi bi-check"></i></button>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>