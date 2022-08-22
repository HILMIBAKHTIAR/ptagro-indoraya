@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  @if(session()->has('message'))
  <div class="alert alert-success">
      {{ session()->get('message') }}
  </div>
  @endif
  
  <h4 class="fw-bold py-3 mb-4">Tables Produk</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Produk</h5>

<div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tambah Produk
      </button>
  </div>
      @include('produk.create')
      {{-- @include('produk.edit') --}}
      
      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Kode Produk</th>
                <th>Nama</th>
                <th>Kategori</th>
                <th>Harga</th>
                <th>Bahan</th>
                {{-- <th>Keterangan</th> --}}
                <th>Photo</th>
                <th>action</th>
                
            </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($produk as $i=>$row)
            <tr>
              <td>{{ ++$i}}</td>
              <td>{{ $row->kode_produk }}</td>
              <td>{{ $row->nama_produk }}</td>
              <td>{{ $row->kategori->nama_kategori }}</td>
              <td>{{ $row->harga }}</td>
              <td>
                <ol>
                    @foreach ($row->bahan as $j =>$bahan)
                        <li>
                            {{ $bahan->stock->nama_bahan }} - {{ $bahan->qty }}
                        </li>
                    @endforeach
                </ol>
              </td>
              {{-- <td>{{ $row->keterangan }}</td> --}}
              <td ><img class="rounded float-start" src="{{ asset('photo/' . $row->photo) }}" width="80px" height="80px"></td>
              <td>
                <a href="{{ route('produk.edit', $row->id) }}" class="btn btn-success upload-image">Edit</a>
                <form action="{{ route('produk.destroy', $row->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
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

<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });

  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error)){
        $("input[name='kode_produk']").val('');
        $("input[name='nama_produk']").val('');
    		$("input[name='stock_id']").val('');
    		$("input[name='kategori_id']").val('');
        $("input[name='harga']").val('');
        $("input[name='stok']").val('');
        $("input[name='keterangan']").val('');
        $(".tampil").css('display','block');
        $(".tampil").find('img').attr('src','/photo/'+response.responseJSON.gambar);

    		alert('Upload gambar berhasil.');
    	}else{
    		printErrorMsg(response.responseJSON.error);
    	}
    }
  };

  function printErrorMsg (msg) {
	$(".print-error-msg").find("ul").html('');
	$(".print-error-msg").css('display','block');
	$.each( msg, function( key, value ) {
		$(".print-error-msg").find("ul").append('<li>'+value+'</li>');
	});
  }

  @if(Session::has('success'))
    toastr.success("{{ Session::get('success') }}");
  @endif
</script>

@endsection