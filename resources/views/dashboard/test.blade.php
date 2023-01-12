@extends('layouts.dashboard')

@section('content')
    <div class="container-fluid">
        <div class="row vh-100-custom side-content">
            {{-- MainContent --}}
            <div class="col-md-9 p-3" id="main-content">
                <div class="d-inline-block w-100">
                    <div class="d-inline-block ms-5">
                        <img src="/img/logo.png" alt="Logo" class="img-fluid logo">
                    </div>
                    <div class="d-md-inline-block d-none float-end w-25 pt-2">
                        <input type="text" class="form-control rounded-search w-100" placeholder="Search...">
                    </div>
                </div>
                <hr>
                <div class="container">
                    <h3>Semua Pesanan</h3>
                    <div class="card">
                        <div class="card-header">
                            Featured
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Order --}}
            <div class="col-md-3 side-content p-3">
                <h2 class="pb-4 pt-1 text-center">Belum Tau Diisi Apa</h2>
                <hr>
            </div>
        </div>
    </div>
@endsection
