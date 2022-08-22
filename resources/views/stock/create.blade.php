  <!-- Modal -->
  <div class="modal fade" id="modalcreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Data Stock</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form class="image-upload" method="post" action="{{ route('stock.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-company">Nama Bahan</label>
                          <input name="nama_bahan" type="text" class="form-control"  placeholder="Masukan Nama Bahan" />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="form-label" for="basic-default-company">Quantity</label>
                          <input name="qty" type="number" class="form-control"  placeholder="Masukan Quantity" />
                        </div>
                      </div>
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