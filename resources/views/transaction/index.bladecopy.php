@extends('layout.master')

@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-8">
                {{-- <div class="row">
                    <ul class="nav nav-pills col-md-12" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                aria-selected="true">semua</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile"
                                aria-selected="false">es kopi</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">soda</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">milk</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">teh</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">snack</button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact"
                                aria-selected="false">lain</button>
                        </li>
                    </ul>
                </div> --}}
                <div class="row">
                    <div class="col-md-3">
                            <div class="card-body">

                                {{-- @foreach ($data_produk as $i=>$p)
                                <tr>
                                    <div class="row">
                                        <td><img class="rounded float-start" src="{{ asset('photo/' . $p->photo) }}"
                                                width="10px" height="80px"></td>
                                    </div>
                                    <div class="row">
                                        <td class="text-center">{{ $p->nama_produk }}</td>
                                    </div>
                                    <div class="row">
                                        <td>{{ $p->harga_jual }}</td>
                                    </div>
                                </tr>
                                @endforeach --}}
                            </div>
                        
                    </div>
                    {{-- <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                            class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span>Sales</span>
                                <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                    +28.42%</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card"
                                            class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="d-block mb-1">Payments</span>
                                <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                                <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>
                                    -14.82%</small>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                    <div class="avatar flex-shrink-0">
                                        <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card" ..
                                            class="rounded" />
                                    </div>
                                    <div class="dropdown">
                                        <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                            aria-haspopup="true" aria-expanded="false">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                            <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                        </div>
                                    </div>
                                </div>
                                <span class="fw-semibold d-block mb-1">Transactions</span>
                                <h3 class="card-title mb-2">$14,857</h3>
                                <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i>
                                    +28.14%</small>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
            <div class="col-md-4">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    tanggal
                                </div>
                                <div class="col-md-6">
                                    14 juni 2021
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7 mt-2">
                                    Waktu
                                </div>
                                <div class="col-md-5">
                                    20.09
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-7">
                                    Kasir
                                </div>
                                <div class="col-md-5">
                                    Hillmi
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="card h-100">
                            <div class="card-header">
                                <ul class="nav nav-pills" role="tablist">
                                    <li class="nav-item">
                                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                                            data-bs-target="#navs-tabs-line-card-income"
                                            aria-controls="navs-tabs-line-card-income" aria-selected="true">
                                            Income
                                        </button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab">Expenses</button>
                                    </li>
                                    <li class="nav-item">
                                        <button type="button" class="nav-link" role="tab">Profit</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="card-body px-0">
                                <div class="tab-content p-0">
                                    <div class="tab-pane fade show active" id="navs-tabs-line-card-income"
                                        role="tabpanel">
                                        <div class="d-flex p-4 pt-3">
                                            <div class="avatar flex-shrink-0 me-3">
                                                <img src="../assets/img/icons/unicons/wallet.png" alt="User" />
                                            </div>
                                            <div>
                                                <small class="text-muted d-block">Total Balance</small>
                                                <div class="d-flex align-items-center">
                                                    <h6 class="mb-0 me-1">$459.10</h6>
                                                    <small class="text-success fw-semibold">
                                                        <i class="bx bx-chevron-up"></i>
                                                        42.9%
                                                    </small>
                                                </div>
                                            </div>
                                        </div>
                                        <div id="incomeChart"></div>
                                        <div class="d-flex justify-content-center pt-4 gap-2">
                                            <div class="flex-shrink-0">
                                                <div id="expensesOfWeek"></div>
                                            </div>
                                            <div>
                                                <p class="mb-n1 mt-1">Expenses This Week</p>
                                                <small class="text-muted">$39 less than last week</small>
                                            </div>
                                        </div>
                                        <div class="btn btn-primary">
                                            oks
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="content-backdrop fade"></div>
            </div>
            <div class="row">
                yhaa
            </div>

            @endsection
