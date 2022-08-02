@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Forms/</span> Data Supplier</h4>

    <!-- Basic Layout -->
    <div class="row">
      <div class="col-xl">
        <div class="card mb-4">
          
          <div class="card-body">
            <form>
              <div class="mb-3">
                <label class="form-label" for="basic-default-fullname">Perusahaan</label>
                <input type="text" class="form-control" id="basic-default-fullname" placeholder="inpur" />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Nama Supplier</label>
                <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">No Telpon</label>
                <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Situs Web</label>
                <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-email">Email</label>
                <div class="input-group input-group-merge">
                  <input
                    type="text"
                    id="basic-default-email"
                    class="form-control"
                    placeholder="john.doe"
                    aria-label="john.doe"
                    aria-describedby="basic-default-email2"
                  />
                  <span class="input-group-text" id="basic-default-email2">@example.com</span>
                </div>
                
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-phone">Alamat</label>
                <input
                  type="text"
                  id="basic-default-phone"
                  class="form-control phone-mask"
                  placeholder="658 799 8941"
                />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-message">Kota</label>
                <textarea
                  id="basic-default-message"
                  class="form-control"
                  placeholder="Hi, Do you have a moment to talk Joe?"
                ></textarea>
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Kode Pos</label>
                <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
              </div>
              <div class="mb-3">
                <label class="form-label" for="basic-default-company">Catatan</label>
                <input type="text" class="form-control" id="basic-default-company" placeholder="ACME Inc." />
              </div>
              <button type="submit" class="btn btn-primary">Send</button>
            </form>
          </div>
        </div>
      </div>
      
    </div>
  </div>

@endsection

