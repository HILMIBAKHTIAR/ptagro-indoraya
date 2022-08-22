@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Data Produk</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('produk.update', $produk->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">nama produk</label>
                        <div class="col-sm-10">
                            <input name="nama_produk" value="{{ $produk->nama_produk }}" type="text"
                                class="form-control @error('nama_produk') is-invalid @enderror"
                                value="{{ old('nama_produk') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Kode Produk</label>
                        <div class="col-sm-10">
                            <input name="kode_produk" value="{{ $produk->kode_produk }}" type="text"
                                class="form-control @error('kode_produk') is-invalid @enderror"
                                value="{{ old('kode_produk') }}" />
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-email">kategori</label>
                        <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                                <select name="kategori_id"
                                    class="form-control @error('kategori_id') is-invalid @enderror">
                                    @foreach ($kategori as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('kategori_id') == $item->id ? 'selected' : null }}>
                                        {{ $item->nama_kategori }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">harga</label>
                        <div class="col-sm-10">
                            <input name="harga" value="{{ $produk->harga }}" type="number"
                                class="form-control @error('harga') is-invalid @enderror"
                                value="{{ old('harga') }}" />
                        </div>
                    </div>
                    {{-- <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Alamat</label>
                        <div class="col-sm-10">
                            <input name="alamat" value="{{ $produk->alamat }}" type="text"
                                class="form-control @error('alamat') is-invalid @enderror"
                                value="{{ old('alamat') }}" />
                        </div>
                    </div> --}}
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
