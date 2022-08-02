@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Tables Supplier</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Supplier</h5>

    <div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate">
        Tambah Supplier
      </button>
  </div>
 @include('supplier.create')
 @include('supplier.edit')
      {{-- <div class="col-md text-right">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">tambah</a>
      </div> --}}
      
      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Perusahaan</th>
            <th>Supplier</th>
            <th>No Telp</th>
            <th>situs web</th>
            <th>email</th>
            <th>alamat</th>
            <th>kota</th>
            <th>kode pos</th>
            <th>catatan</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($data_supplier as $i=>$row)
            <tr>
              <td>{{ ++$i}}</td>
              <td>{{ $row->perusahaan }}</td>
              <td>{{ $row->nama_supplier }}</td>
              <td>{{ $row->no_telp }}</td>
              <td>{{ $row->situs_web }}</td>
              <td>{{ $row->email }}</td>
              <td>{{ $row->alamat }}</td>
              <td>{{ $row->kota }}</td>
              <td>{{ $row->kode_pos }}</td>
              <td>{{ $row->catatan }}</td>
              <td>
                <form action="{{ route('supplier.destroy', $row->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
                <a href="{{ route('supplier.edit', $row->id) }}" class="btn btn-success" data-toggle="modal" data-target="#modaledit">Edit</a>
              </td>
            </tr>
            @endforeach
            
        </tbody>
      </table>
    </div>
  </div>
  <!--/ Basic Bootstrap Table -->

  <hr class="my-5" />
  <!--/ Responsive Table -->
</div>



@endsection