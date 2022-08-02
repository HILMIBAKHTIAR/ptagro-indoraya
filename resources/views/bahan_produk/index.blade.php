@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Basic Tables</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Supplier</h5>

      <div class="col-md text-right">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">tambah</a>
      </div>
      
      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>Perusahaan</th>
            <th>Supplier</th>
            <th>situs web</th>
            <th>email</th>
            <th>alamat</th>
            <th>kota</th>
            <th>kode pos</th>
            <th>catatan</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          
            <tr>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
              <td></td>
            </tr>

            
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->

  <hr class="my-5" />
  <!--/ Responsive Table -->
</div>

@endsection