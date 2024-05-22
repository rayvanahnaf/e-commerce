@extends('layouts.parent')
@section('title', 'Dashboard - Admin')
@section('content')
<div class="section dashboard">
    <div class="card revenue-card sales-card">
        <div class="card-body">
            <h5 class="card-title fs-3">{{Auth::user()->name}} <span class="badge text-uppercase bg-success text-light"><i class="bi bi-check-circle me-1"></i>
                    {{Auth::user()->role}} </span></h5>

            <div class="d-flex align-items-center">
                <div class="card-icon rounded-circle d-flex  align-items-center justify-content-center">
                    @if (Auth::check() && Auth::user()->role == 'admin')
                    <i class="ri-customer-service-2-fill"></i> {{-- Ikon untuk admin --}}
                    @else
                    <i class="ri-account-pin-circle-fill"></i> {{-- Ikon untuk non-admin --}}
                    @endif
                </div>
                <div class="ps-3">
                    <h4 class="fs-3">{{Auth::user()->email}}</h4>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="section dashboard">
    <div class="row">
        <div class="col-md-6">
            <div class="card info-card customers-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Jam Sekarang</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-clock-fill"></i>
                        </div>
                        <div class="ps-3">
                            <h6 id="current-time">...</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
                    <div class="card info-card  sales-card">
                        <div class="card-body">
                            <h5 class="card-title">Tanggal Hari Ini</h5>

                            <div class="d-flex align-items-center"> 
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-calendar"></i> 
                                </div>
                                <div class="ps-3">
                                    <h6 id="current-date">...</h6> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
</div>

<div class="section dashboard">
    <div class="row">
        <div class="col-md-4">
            <div class="card info-card customers-card sales-card">
                <div class="card-body">
                    <h5 class="card-title">Category</h5>

                    <div class="d-flex align-items-center ">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="bi bi-cart"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{$category}} Category</h6>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-md-4">
            <div class="card info-card  sales-card">



                <div class="card-body">
                    <h5 class="card-title">Product</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle  d-flex align-items-center justify-content-center">
                            <i class="ri-gift-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $product }} Items</h6>
                        </div>
                    </div>
                </div>

            </div>

        </div>
        <div class="col-md-4">
            <div class="card info-card  revenue-card">



                <div class="card-body">
                    <h5 class="card-title">Users</h5>

                    <div class="d-flex align-items-center">
                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                            <i class="ri-user-5-line"></i>
                        </div>
                        <div class="ps-3">
                            <h6>{{ $user }} Users</h6>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</div>
<div class="card">
    <div class="card-body">
        <h3 class="card-title fs-2">All users</h3>
        <table class="table text-center  table-hover">
            <thead class="table table-primary">
                <tr>
                    <th>No</th>
                    <th>User</th>
                    <th>Email</th>
                    <th>Title</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $row)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $row->name }}</td>
                    <td>{{ $row->email }}</td>
                    <td>{{ $row->role }}</td>
                    <td>
                        <button type="button" class="btn btn-warning " data-bs-toggle="modal" data-bs-target="#basicModal{{$row->id}}">
                            <i class="bi bi-exclamation-triangle"></i>
                            Reset Password
                        </button>
                        <div class="modal fade" id="basicModal{{$row->id}}" tabindex="-1">p
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Reset Password {{$row->name}} ?</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Default Password Become to
                                        <strong>password</strong>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <form action="{{route('admin.resetpassword',$row->id)}}" method="post">
                                            @csrf
                                            @method('PUT')
                                            <button type="submit" class="btn btn-success">Reset <i class="bi bi-check-circle me-1"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- script -->
<script>
    function updateClock() {
        const now = new Date();
        const hours = now.getHours().toString().padStart(2, '0');
        const minutes = now.getMinutes().toString().padStart(2, '0');
        const seconds = now.getSeconds().toString().padStart(2, '0');
        const currentTime = `${hours}:${minutes}:${seconds}`;
        document.getElementById('current-time').textContent = currentTime;
    }

    setInterval(updateClock, 1000); // Memperbarui setiap detik
    updateClock(); // Memperbarui saat halaman dimuat
</script>
<script>
    function getCurrentDate() {
        const now = new Date();
        const day = now.getDate().toString().padStart(2, '0');
        const month = (now.getMonth() + 1).toString().padStart(2, '0'); // Januari = 0
        const year = now.getFullYear();
        return `${day}/${month}/${year}`; // Format tanggal DD/MM/YYYY
    }

    document.getElementById('current-date').textContent = getCurrentDate(); // Menampilkan tanggal
</script>

@endsection