@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Tables Produk</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">Produk</h5>
      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Permission</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($user as $i=>$row)
            <tr>
              <td>{{ ++$i}}</td>
              <td>{{ $row->name }}</td>
              <td>
                
              </td>
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
        $("input[name='nama_produk']").val('');
    		$("input[name='kategori_id']").val('');
        $("input[name='harga_jual']").val('');
        $("input[name='harga_pokok']").val('');
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
</script>

@endsection