@extends('layout.master')

@section('content')

<style>
  .btn-kasir {
    color: #ffaf00;
    background-color: rgba(255, 175, 0, 0.2);
    font-weight: bold;
    font-size: 0.875rem;
    line-height: 1;
    font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    padding: 0.5rem 0.75rem;
  }
  .btn-admin {
    color: #ff6258;
    background-color: rgba(255, 98, 88, 0.2);
    font-weight: bold;
    font-size: 0.875rem;
    line-height: 1;
    font-family: "roboto", sans-serif;
    border: 1px solid transparent;
    border-radius: 0.25rem;
    padding: 0.5rem 0.75rem;

  }
</style>

<div class="container-xxl flex-grow-1 container-p-y">
  <h4 class="fw-bold py-3 mb-4">Tables User</h4>

  <!-- Basic Bootstrap Table -->
  <div class="card">
    <h5 class="card-header">User</h5>

    <div class="card-body">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalcreate">
        Tambah User
      </button>
  </div>
 @include('user.create')
 @include('supplier.edit')
      {{-- <div class="col-md text-right">
        <a href="{{ route('supplier.create') }}" class="btn btn-primary">tambah</a>
      </div> --}}
      
      <div class="table-responsive text-nowrap">
      <table class="table">
        <thead>
          <tr>
            <th>#</th>
            <th>Photo</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Role</th>
            <th>action</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-0">
          @foreach ($users as $i=>$row)
            <tr>
              <td>{{ ++$i}}</td>
              <td>
                <img src="{{ asset('pictures/' . $row->foto) }}" style="width: 70px; height:70px;">
              </td>
              <td>{{ $row->name }}</td>
              <td>{{ $row->email }}</td>
              <td>
                @if($row->role == 'admin')
                <span class="btn-admin">{{ $row->role }}</span>
                @else
                <span class="btn-kasir">{{ $row->role }}</span>
                @endif
              </td>
              <td>
                <form action="{{ route('user.delete', $row->id) }}" method="post">
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

<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });


  var options = { 
    complete: function(response) 
    {
    	if($.isEmptyObject(response.responseJSON.error)){
        $("input[name='name']").val('');
        $("input[name='email']").val('');
        $("input[name='password']").val('');
        $("input[name='username']").val('');
        $("input[name='foto']").val('');
         $(".tampil").css('display','block');
        $(".tampil").find('img').attr('src','/foto/'+response.responseJSON.gambar);

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