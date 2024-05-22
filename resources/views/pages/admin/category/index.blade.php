
@extends('layouts.parent')
@section('title', 'category')
@section('content')
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Category</h5>
        <nav class="">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Dashboard</a></li>
                <li class="breadcrumb-item"><a href="#">Product</a></li>
                <li class="breadcrumb-item active">Category</li>
            </ol>
        </nav>
        <!-- button modal crate category -->
        <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#createModalCategory">
            <i class="bi bi-plus"></i>Add category
        </button>
        @include('pages.admin.category.modal-create')
        <!-- end -->

        <table class="table datatable">
            <thead>
                <tr>
                    <th>No</th>
                    <th>
                        <b>N</b>ame
                    </th>
                    <th>Images</th>
                    <th>Action</th>

                </tr>
            </thead>
            <tbody>
                @forelse ($category as $row )
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{$row->name}}</td>
                    <td><img src="{{ url('storage/category/', $row->image) }}" class="img-fluid" width="75px"></td>
                    <td>
                        <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editModalCategory{{$row->id}}" type="button"><i class="bi bi-pencil"></i></button>
                        @include('pages.admin.category.modal-edit')
                        <form action="{{route('admin.category.destroy', $row->id)}}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>

                </tr>
                @empty
                <tr>
                    <td colspan="4" class="text-center">Empty 😭</td>
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

    (function($) {
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
                $prev.attr('class', 'visually-hiden')
            }

        }
        $('#image').on('change', function() {
            readURL(this);
        });

    })(jQuery);
</script>
@endpush