@extends('layout.master')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Edit Data Stock</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('stock.update', $data_stock->id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">QTY</label>
                        <div class="col-sm-10">
                            <input name="qty" value="{{ $data_stock->qty }}" type="text"
                                class="form-control @error('qty') is-invalid @enderror"
                                value="{{ old('qty') }}" />
                        </div>
                    </div>
                    <div class="col text-center">

                        <button type="submit" class="btn btn-success btn-lg">Update</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <hr class="my-5" />
    <!--/ Responsive Table -->
</div>
@endsection
