<div class="modal fade" id="editModalCategory{{$row->id}}" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change {{$row->name}} Category</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('admin.category.update',$row->id)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="col-12">
                            <label for="categoryImage" class="form-label">Category Name</label>
                            <input type="text" class="form-control" id="categoryImage" name="name" value="{{$row->name}}">
                        </div>
                        <div class="col-12">
                            <label for="categoryName" class="form-label">Category Image</label>
                            <input type="file" class="form-control" id="categoryName" name="image">
                        </div>
                        <div class="col-12">
                            <img src="#" alt="category-img" id="preview-logo" class="visually-hidden img-thumbnaiil">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Change <i class="bi bi-check-lg"></i></button>
                    </div>
                </form>
            </div>
    </div>
        </div>
    </div>