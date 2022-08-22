@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xxl">
        <div class="card mb-4">
            {{-- cetak data keluar --}}
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Cetak Laporan Keluar</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal awal</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="date" name="tgl_awal" id="tgl_awal">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal akhir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="date" name="tgl_akhir" id="tgl_akhir">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col text-center mt-2">
                    <button type="button" class="btn btn-success btn-lg" id="cetak">Cetak</button>
                </div>   
            </div>

            {{-- cetak data masuk --}}
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Cetak Laporan Masuk</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal awal</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="date" name="tglawal" id="tgl_awal">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal akhir</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input class="form-control" type="date" name="tglakhir" id="tgl_akhir">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col text-center mt-2">
                    <a href="" onclick="this.href='cetakoutflow'+ document.getElementById('tglawal').value +
                    '/' + document.getElementById('tglawal').value" target="_blank" class="btn btn-primary"><box-icon name='printer'></box-icon></a>
            </div>

        </div>
    </div>
    <hr class="my-5" />
    <!--/ Responsive Table -->
</div>
@endsection
