@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  @if(session()->has('message'))
  <div class="alert alert-success">
      {{ session()->get('message') }}
  </div>
  @endif
  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Stock</h5>
    <div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate">
        Tambah Stok
      </button>
  </div>
  @include('stock.create')
      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama Bahan</th>
            <th>Qty</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach($data_stock as $i=>$row)
            <tr>
              <td>{{ ++$i }}</td>
              <td>{{ $row->nama_bahan }}</td>
              <td>{{ $row->qty }} g</td>
              <td>
                <form action="{{ route('stock.delete', $row->id) }}">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
              </td>
              <td>
                <a href="{{ route('stock.edit', $row->id) }}" class="btn btn-success">Ubah Stock</a>
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

<script>
  $(document).ready(function() {
    $('#modalcreate').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var modal = $(this);
      var title = button.data('title');
      var href = button.attr('href');
      modal.find('.modal-title').text(title);
      modal.find('.modal-body').html('<i class="fa fa-spinner fa-spin"></i>');
      $.post(href)
        .done(function(data) {
          modal.find('.modal-body').html(data);
        });
    });
  }); 

  var dengan_rupiah = document.getElementById('dengan-rupiah');
    dengan_rupiah.addEventListener('keyup', function(e)
    {
        dengan_rupiah.value = formatRupiah(this.value, 'Rp. ');
    });
    
    /* Fungsi */
    function formatRupiah(angka, prefix)
    {
        var number_string = angka.replace(/[^,\d]/g, '').toString(),
            split    = number_string.split(','),
            sisa     = split[0].length % 3,
            rupiah     = split[0].substr(0, sisa),
            ribuan     = split[0].substr(sisa).match(/\d{3}/gi);
            
        if (ribuan) {
            separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        
        rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
        return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
    }
</script>