<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form class="image-upload" method="post" action="{{ route('produk.store') }}"
                    enctype="multipart/form-data">
                    @csrf   
                    <div class="print-img" style="display:none">
                        <img src="" style="height:300px;width:500px">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="basic-default-fullname">Kode Produk</label>
                                <input name="kode_produk" type="text" class="form-control" placeholder="kode produk" />
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="basic-default-fullname">Nama</label>
                                <input name="nama_produk" type="text" class="form-control" placeholder="nama produk" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="basic-default-company">Kategori</label>
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="basic-default-company">Harga</label>
                                <input name="harga" type="number" class="form-control" placeholder="harga" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="basic-default-company">stock</label>

                                @foreach ($stock as $item)
                                    <div class="form-check">
                                        <input class="form-check-input" name="stock_id[]" type="checkbox" value="{{ $item->id }}" id="flexCheckDefault-{{ $item->id }}">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            {{ $item->nama_bahan }}
                                        </label>
                                        <input type="number" class="form-control" name="bahan_qty[]">
                                    </div>
                                @endforeach
                                  
                                {{-- <select name="stock_id"
                                    class="form-control @error('stock_id') is-invalid @enderror">
                                    @foreach ($stock as $item)
                                    <option value="{{ $item->id }}"
                                        {{ old('stock') == $item->id ? 'selected' : null }}>
                                        {{ $item->nama_bahan }}
                                    </option>
                                    @endforeach
                                </select> --}}
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="form-label" for="basic-default-company">Keterangan </label>
                                <input name="keterangan" type="text" class="form-control" placeholder="keterangan" />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label class="form-label" for="basic-default-message">Foto</label>
                            <input name="photo" id="photo" type="file" class="form-control"  placeholder="Masukan Foto" />
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success btn-lg" id="simpan"
                            style="padding: 5px 50px; margin-top: 10px;">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
