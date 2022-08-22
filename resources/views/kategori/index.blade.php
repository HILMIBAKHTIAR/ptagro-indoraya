@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  @if(session()->has('message'))
  <div class="alert alert-success">
      {{ session()->get('message') }}
  </div>
  @endif
  <h4 class="fw-bold py-3 mb-4">Table Kategori</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Kategori</h5>

    <div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Kategori
      </button>
  </div>

        <!-- Modal -->
   <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Form Input Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger" style="display:none"></div>
                <form class="image-upload" method="post" action="{{ route('kategori.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                      <label class="form-label" for="basic-default-fullname">Nama Kategori</label>
                      <input name="nama_kategori" type="text" class="form-control" placeholder="nama kategori" />
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

      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Kategori</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($data as $i=>$row)
            <tr>
              <td>{{++$i}}</td>
              <td>{{ $row->nama_kategori }}</td>
              <td>
                <form action="{{ route('kategori.destroy', $row->id) }}" method="post">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
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