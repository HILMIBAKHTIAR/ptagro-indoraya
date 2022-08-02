  <!-- Modal -->
  <div class="modal fade" id="modaledit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Edit Data Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                {{-- <form action="{{route('supplier.update',$data_supplier->id)}}" method="post"> --}}
                    @method('PATCH')
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-fullname">Perusahaan</label>
                          <input name="perusahaan" type="text" class="form-control" placeholder="nama perusahaan" />
                        </div>  
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-company">Nama Supplier</label>
                          <input name="nama_supplier" type="text" class="form-control"  placeholder="nama supplier." />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-company">Situs web</label>
                          <input name="situs_web" type="text" class="form-control"  placeholder="web supplier." />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-company">No Telp</label>
                          <input name="no_telp" type="text" class="form-control"  placeholder="no telp supplier." />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-email">Email</label>
                          <div class="input-group input-group-merge">
                            <input
                              name="email"
                              type="text"
                              class="form-control"
                              placeholder="john.doe"
                              aria-label="john.doe"
                              aria-describedby="basic-default-email2"
                            />
                            <span class="input-group-text" id="basic-default-email2">@example.com</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-phone">Alamat</label>
                          <input
                            name="alamat"
                            type="text"
                            class="form-control phone-mask"
                            placeholder="alamat suppplier"
                          />
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-message">Kota</label>
                          <input name="kota" type="text" class="form-control"  placeholder="kota supplier" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-company">Kode Pos</label>
                          <input name="kode_pos" type="number" class="form-control"  placeholder="kode pos supplier" />
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="form-label" for="basic-default-company">Catatan</label>
                      <input name="catatan" type="text" class="form-control"  placeholder="note" />
                    </div>
                    <div class="modal-footer">
                      <input type="submit" class="btn btn-success btn-lg" name="simpan" id="simpan" value="simpan"
                      style="padding: 5px 50px; margin-top: 10px;">
                    </div>
                </form>
              
            </div>
        </div>
    </div>
</div>