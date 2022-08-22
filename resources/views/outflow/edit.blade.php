@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Data Pengeluaran</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('outflow.update', $data_outflow->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Tanggal Pembelian</label>
                        <div class="col-sm-10">
                            <input name="tanggal_pembelian" value="{{ $data_outflow->tanggal_pembelian }}" type="date"
                                class="form-control @error('tanggal_pembelian') is-invalid @enderror"
                                value="{{ old('tanggal_pembelian') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Keterangan</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input name="keterangan" value="{{ $data_outflow->keterangan }}" type="text"
                                    class="form-control @error('keterangan') is-invalid @enderror"
                                    value="{{ old('keterangan') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Jumlah Pembelian</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input name="jumlah_pembelian" value="{{ $data_outflow->jumlah_pembelian }}" type="number"
                                    class="form-control @error('jumlah_pembelian') is-invalid @enderror"
                                    value="{{ old('jumlah_pembelian') }}" placeholder="Rp..." />
                            </div>
                        </div>
                    </div>
                    <div class="col text-center">

                        <button type="submit" class="btn btn-success btn-lg">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr class="my-5" />
    <!--/ Responsive Table -->
</div>
@endsection
