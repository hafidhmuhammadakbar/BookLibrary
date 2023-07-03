@extends('layouts.app')

@section('content')
    <div class="container-fluid py-4 px-5">
        @if(session()->has('error'))
            <div class="alert alert-danger alert-dismissible fade show mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @elseif(session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show mt-5" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card border shadow-xs mb-4">
                    <div class="card-header border-bottom pb-0">
                        <div class="row d-flex ">
                            <div class="col-md-3">
                                <div class="d-sm-flex align-items-center mb-3">
                                    <div>
                                        <h3 class="font-weight-semibold text-lg mb-0">Profile Account</h3>
                                        <p class="text-sm mb-sm-0">All Informations about your account</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container">
                            <div class="card mb-5 mt-5">
                                <div class="card-body">
                                    <table class="table">
                                        <tbody>
                                            <tr>
                                                <th scope="row">Nama</th>
                                                <td>{{ $user->name }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Email</th>
                                                <td>{{ $user->email }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Username</th>
                                                <td>{{ $user->username }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Role</th>
                                                <td style="text-transform: capitalize;">{{ $user->role }}</td>
                                            </tr>
                                            <tr>
                                                <th scope="row">Phone</th>
                                                <td>{{ $user->phone }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex align-items-center justify-content-center mt-5 mb-3">
                            <a href="{{ route('profile.edit', $user) }}" class="text-decoration-none">
                                <button type="button" class="btn btn-primary btn-icon d-flex align-items-center mb-0 mx-2">
                                    <span class="btn-inner--icon me-2">
                                        <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                                    </span>
                                    <span class="btn-inner--text">Edit Profile</span>
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection