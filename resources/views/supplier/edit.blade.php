@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Data Supplier</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('supplier.update', $data_supplier->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Perusahaan</label>
                        <div class="col-sm-10">
                            <input name="perusahaan" value="{{ $data_supplier->perusahaan }}" type="text"
                                class="form-control @error('perusahaan') is-invalid @enderror"
                                value="{{ old('perusahaan') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Nama Supplier</label>
                        <div class="col-sm-10">
                            <input name="nama_supplier" value="{{ $data_supplier->nama_supplier }}" type="text"
                                class="form-control @error('nama_supplier') is-invalid @enderror"
                                value="{{ old('nama_supplier') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">No Telp</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input name="no_telp" value="{{ $data_supplier->no_telp }}" type="number"
                                    class="form-control @error('no_telp') is-invalid @enderror"
                                    value="{{ old('no_telp') }}" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Situs web</label>
                        <div class="col-sm-10">
                            <input name="situs_web" value="{{ $data_supplier->situs_web }}" type="text"
                                class="form-control @error('situs_web') is-invalid @enderror"
                                value="{{ old('situs_web') }}" />
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <input name="email" value="{{ $data_supplier->email }}" type="text  "
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="" />
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alamat</label>
                        <div class="col-sm-10">
                            <input name="alamat" value="{{ $data_supplier->alamat }}" type="text"
                                class="form-control @error('alamat') is-invalid @enderror"
                                value="{{ old('alamat') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Kota</label>
                        <div class="col-sm-10">
                            <input name="kota" value="{{ $data_supplier->kota }}" type="text"
                                class="form-control @error('kota') is-invalid @enderror" value="{{ old('kota') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">kode pos</label>
                        <div class="col-sm-10">
                            <input name="kode_pos" value="{{ $data_supplier->kode_pos }}" type="text"
                                class="form-control @error('kode_pos') is-invalid @enderror"
                                value="{{ old('kode_pos') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Catatan</label>
                        <div class="col-sm-10">
                            <input name="catatan" value="{{ $data_supplier->catatan }}" type="text"
                                class="form-control @error('catatan') is-invalid @enderror"
                                value="{{ old('catatan') }}" />
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
