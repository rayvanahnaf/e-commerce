@extends('layouts.parent')

@section('title', 'User')

@section('content')

    <div class="section profile">
        <div class="row">
            <div class="col-12">

                <div class="card">
                    <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

                        <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
                        <h2>{{ Auth::user()->name }}</h2>
                        <h3>Since: {{ Auth::user()->created_at->format('d F Y') }}</h3>
                        <div class="social-links mt-2">
                            <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                            <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                            <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                            <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
                        </div>
                        <div class="mt-2">
                            <button class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#changePassword" type="button">
                                Change Password
                            </button>
                        </div>
                        @include('pages.user.modal-change-password')
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
