@extends('layouts.parent')

@section('title', 'category')
@section('content')
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Category</h5>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="#">Product</a></li>
                    <li class="breadcrumb-item active">Data Category</li>
                </ol>
            </nav>
            {{-- Button modal create category --}}

            <!-- Basic Modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModalCategory">
                <i class="bi bi-plus"></i>
                Add Category
            </button>
            @include('pages.admin.category.modalCreate')

            {{-- End Button modal create category --}}

            <table class="table datatable">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($category as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td><img src="" alt="{{ $row->name }}" class="img-thumbnail" srcset=""></td>
                            <td>
                                <button class="btn btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <form action="#" method="post" class="d-inline">
                                    <button class="btn btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center">Data is Empty</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('script')
    <script src="text/javascript">
        ;

        function($) {
            function readURL(input) {
                var $prev = $('preview-logo')
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $prev.attr('src', e.target.result);
                    }
                    reader.readAsDataURL(input.files[0]);
                    $prev.attr('class', '')

                } else {
                    $prev.attr('class', 'visually-hidden')
                }
            }
            $('#image').on('change', function() {
                readURL(this);
            });
        }(jQuery);
    </script>
@endpush
