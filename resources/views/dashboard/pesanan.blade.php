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
                <div class="row justify-content-center">
                    <a href="/pesanan?type=makanan" class="d-inline-block col-md-3 col-5">
                        <div class="box mx-2 px-2 py-1 my-1" id="food-box">
                            <img src="/img/food.png" alt="Food Image" class="icon img-fluid d-none d-md-inline-block">
                            <h3 class="float-md-end mt-2 text-dark">Makanan</h3>
                        </div>
                    </a>
                    <a href="/pesanan?type=minuman" class="d-inline-block col-md-3 col-5">
                        <div class="box mx-2 px-2 py-1 my-1" id="drink-box">
                            <img src="/img/drink.png" alt="Drink Image" class="icon img-fluid d-none d-md-inline-block">
                            <h3 class="float-md-end mt-2 text-dark">Minuman</h3>
                        </div>
                    </a>
                </div>
                <hr>
                <div class="row justify-content-center">

                    @foreach ($masakan as $item)
                        <div class="card col-md-3 box py-0 px-2 m-3">
                            <img src="{{ $item->getFirstMedia()->getUrl() }}" class="card-img-top rounded mt-2"
                                alt="Image">
                            <div class="card-body p-2">
                                <h5 class="card-title">{{ $item->nama_masakan }}</h5>
                                <div class="card-text">
                                    <h6 class="text-primary">Rp. {{ $item->harga }}</h6>
                                    <div class="d-inline-block float-end mt-auto">
                                        <a class="bg-transparent" href="#">
                                            <img src="/img/minus.png" alt="Image" class="icon-sm img-fluid">
                                        </a>
                                        <div class="d-inline-block">0</div>
                                        <a class="bg-transparent" href="#">
                                            <img src="/img/add.png" alt="Image" class="icon-sm img-fluid">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Order --}}
            <div class="col-md-3 side-content p-3">
                <h2 class="pb-4 pt-1 text-center">Pesanan Anda</h2>
                <hr>

                {{-- Order 1 --}}
                <div class="box fw-bold px-3 py-1 mb-3">
                    <span>Makanan 1</span>
                    <br>
                    <h6>
                        <span class="text-primary">
                            Rp. 15.000
                        </span>
                        <span class="float-end">
                            x1
                        </span>
                    </h6>
                </div>

                {{-- Order 2 --}}
                <div class="box fw-bold px-3 py-1 mb-3">
                    <span>Makanan 2</span>
                    <br>
                    <h6>
                        <span class="text-primary">
                            Rp. 15.000
                        </span>
                        <span class="float-end">
                            x1
                        </span>
                    </h6>
                </div>

                {{-- Order 3 --}}
                <div class="box fw-bold px-3 py-1 mb-3">
                    <span>Makanan 3</span>
                    <br>
                    <h6>
                        <span class="text-primary">
                            Rp. 20.000
                        </span>
                        <span class="float-end">
                            x3
                        </span>
                    </h6>
                </div>

                <hr>

                <div class="w-100 mb-3">
                    {{-- Total --}}
                    <div class="box fw-bold px-3 py-3 mb-3 f">
                        <span>Total </span>
                        <span class="float-end">
                            Rp. 90.000
                        </span>
                    </div>

                    {{-- Submit Button --}}
                    <a class="btn btn-primary w-100 box" href="#">
                        Submit Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
