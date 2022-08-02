@extends('layout.master')
@section('css')
<link rel="stylesheet" href="{{ asset('css/transaction/style.css') }}">
<style>
    /* .list-pesanan > div:last-child {
        border-bottom: none !important;
        margin-bottom: 0 !important;
        padding-bottom: 0 !important;
    } */
</style>
@endsection
@section('content')
<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card" style="min-height:85vh">
                    <div class="card-header">
                        <ul class="nav nav-pills col-md-12" id="pills-tab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home"
                                    aria-selected="true">semua</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-profile" type="button" role="tab"
                                    aria-controls="pills-profile" aria-selected="false">es kopi</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">soda</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">milk</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">teh</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">snack</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill"
                                    data-bs-target="#pills-contact" type="button" role="tab"
                                    aria-controls="pills-contact" aria-selected="false">lain</button>
                            </li>
                        </ul>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="transacation-code ml-3">
                                <p class="m-0 text-black">Kode Transaksi</p>
                                <p class="m-0 text-black">T{{ date('dmYHis') }}</p>
                                <input type="text" name="kode_transaksi" value="T{{ date('dmYHis') }}" hidden="">
                            </div>
                            @foreach ($data_produk as $produk)
                            @if($produk->stok != 0)

                            <div style="width: 25%;border:3px solid rgb(243, 243, 243)" class="mb-4">
                                <div class="productCard">
                                    <div class="view overlay">
                                        <img class="card-img-top gambar" src="{{ asset('photo/' . $produk->photo) }}"
                                            width="40px" height="130px" alt="Card image cap" style="cursor: pointer"
                                            onclick="this.closest('form').submit();return false;">
                                    </div>
                                    <div class="card-body">
                                        <label class="card-text text-center font-weight-bold nama_produk"
                                            style="text-transform: capitalize;">
                                            {{ Str::words($produk->nama_produk,4) }}</label>
                                        <p class="card-text text-center harga_produk">
                                            Rp.
                                            {{ number_format($produk->harga,2,',','.') }}
                                            <p class="m-0">{{ $produk->stok }}</p>
                                        </p>
                                        <button class="btn-primary tambah_data">
                                            tambah data
                                        </button>
                                    </div>

                                </div>
                            </div>
                            @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @if ($message = Session::get('transaction_success'))
            <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
                aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-body bg-grey">
                            <div class="row">
                                <div class="col-12 text-center mb-4">
                                    <img src="{{ asset('gif/success4.gif') }}">
                                    <h4 class="transaction-success-text">Transaksi Berhasil</h4>
                                </div>
                                @php
                                $transaksi = \App\Transaction::where('transactions.kode_transaksi', '=', $message)
                                ->select('transactions.*')
                                ->first();
                                @endphp
                                <div class="col-12">
                                    <table class="table-receipt">
                                        <tr>
                                            <td>
                                                <span class="d-block little-td">Kode Transaksi</span>
                                                <span class="d-block font-weight-bold">{{ $message }}</span>
                                            </td>
                                            <td>
                                                <span class="d-block little-td">Tanggal</span>
                                                <span
                                                    class="d-block font-weight-bold">{{ date('d M, Y', strtotime($transaksi->created_at)) }}</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <span class="d-block little-td">Kasir</span>
                                                <span class="d-block font-weight-bold">{{ $transaksi->kasir }}</span>
                                            </td>
                                            <td>
                                                <span class="d-block little-td">Total</span>
                                                <span class="d-block font-weight-bold text-success">Rp.
                                                    {{ number_format($transaksi->total,2,',','.') }}</span>
                                            </td>
                                        </tr>
                                    </table>
                                    <table class="table-summary mt-3">
                                        <tr>
                                            <td class="line-td" colspan="2"></td>
                                        </tr>
                                        <tr>
                                            <td class="little-td big-td">Bayar</td>
                                            <td>Rp. {{ number_format($transaksi->bayar,2,',','.') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="little-td big-td">Kembali</td>
                                            <td>Rp. {{ number_format($transaksi->kembali,2,',','.') }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-sm btn-close-modal" data-dismiss="modal">Tutup</button>
                            <a href="{{ url('/transaction/receipt/' . $message) }}" target="_blank"
                                class="btn btn-sm btn-cetak-pdf">Cetak Struk</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-md-4">
                <form method="POST" name="transaction_form" id="transaction_form"
                    action="{{ url('/transaction/process') }}">
                    <div class="row">
                        <div class="card">
                            <div class="card-body mt-3">
                                <div class="col-md-12">
                                    <table class="table-payment-1">
                                        <tr>
                                            <td class="text-left">Tanggal</td>
                                            <td class="text-right">{{ date('d M, Y') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Waktu</td>
                                            <td class="text-right">{{ date('H:i') }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left">Kasir</td>
                                            <td class="text-right">{{ Auth::user()->name }}</td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="card-body">
                                <div class="d-flex justify-content-start align-items-center gap-2">
                                    <box-icon name='plus'></box-icon>
                                    <p class="m-0 text-black-50">Daftar Pesanan</p>
                                </div>
                                <div id="list-pesanan">
                                    <p id="default-view-pesanan" class="mt-3 mb-0 text-muted">Belum ada pesanan</p>
                                </div>

                                <!-- // template list produk pesanan untuk dimasukkan ke #list-pesanan -->
                                <div class="data-produk pb-2 my-3 border-bottom d-none">
                                    <div class="d-flex w-100 mb-1 align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="fs-5 m-0"><b class="nama_produk">ice coffe</b></p>
                                        </div>
                                        <div class="d-flex gap-2 align-items-center">
                                            <button type="button" class="btn btn-success p-0 lh-1">
                                                <box-icon name='plus'></box-icon>
                                            </button>
                                            <b class="jumlah_produk">2</b>
                                            <button type="button" class="btn btn-danger p-0 lh-1">
                                                <box-icon name='minus'></box-icon>
                                            </button>
                                        </div>
                                    </div>
                                    <div class="d-flex w-100">
                                        <div class="flex-grow-1">
                                            <small class="harga_produk m-0">Rp14.000</small>
                                        </div>
                                        <div class="d-flex">
                                            <p class="harga_total_produk fs-5 m-0"><b>Rp. 14.000</b></p>
                                        </div>
                                    </div>
                                </div>

                                <div id="info-pembayaran" class="d-none">
                                    <!-- // diskon -->
                                    <div class="d-flex align-items-center mb-2">
                                        <div class="flex-grow-1">
                                            <p class="fs-5 m-0">Diskon</p>
                                            <a href="javascript:void(0)"><small>Ubah diskon</small></a>
                                        </div>
                                        <div class="">
                                            <p class="m-0 fs-3"><b>33%</b></p>
                                        </div>
                                    </div>

                                    <!-- // subtotal -->
                                    <div class="d-flex align-items-center">
                                        <div class="flex-grow-1">
                                            <p class="fs-5 m-0">Subtotal</p>
                                            <small>3 Menu</small>
                                        </div>
                                        <div class="">
                                            <p class="m-0 fs-3"><b>Rp. 36.000</b></p>
                                        </div>
                                    </div>

                                    <div class="input-group my-3">
                                        <span class="input-group-text">^</span>
                                        <input type="number" name="nominal" class="form-control" placeholder="Masukkan nominal uang">
                                    </div>

                                    <button class="btn btn-primary w-100">Bayar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="content-backdrop fade"></div>
            </div>
            @endsection
            @section('script')
            <script src="{{ asset('plugins/js/quagga.min.js') }}"></script>
            <script src="{{ asset('js/transaction/script.js') }}"></script>
            <script type="text/javascript">
                // @if($message = Session::get('transaction_success'))
                // $('#successModal').modal('show');
                // @endif

                // $(document).on('click', '.btn-pilih', function (e) {
                //     e.preventDefault();
                //     var kode_barang = $(this).prev().prev().children().first().text();
                //     $.ajax({
                //         url: "{{ url('/transaction/product') }}/" + kode_barang,
                //         method: "GET",
                //         success: function (response) {
                //             var check = $('.kode-barang-td:contains(' + response.product
                //                     .kode_barang + ')')
                //                 .length;
                //             if (check == 0) {
                //                 tambahData(response.product.kode_barang, response.product
                //                     .nama_barang, response
                //                     .product.harga, response.product.stok, response.status);
                //             } else {
                //                 swal(
                //                     "",
                //                     "Barang telah ditambahkan",
                //                     "error"
                //                 );
                //             }
                //         }
                //     });
                // });

                // function startScan() {
                //     Quagga.init({
                //         inputStream: {
                //             name: "Live",
                //             type: "LiveStream",
                //             target: document.querySelector('#area-scan')
                //         },
                //         decoder: {
                //             readers: ["ean_reader"],
                //             multiple: false
                //         },
                //         locate: false
                //     }, function (err) {
                //         if (err) {
                //             console.log(err);
                //             return
                //         }
                //         console.log("Initialization finished. Ready to start");
                //         Quagga.start();
                //     });

                //     Quagga.onDetected(function (data) {
                //         $('#area-scan').prop('hidden', true);
                //         $('#btn-scan-action').prop('hidden', false);
                //         $('.barcode-result').prop('hidden', false);
                //         $('.barcode-result-text').html(data.codeResult.code);
                //         $('.kode_barang_error').prop('hidden', true);
                //         stopScan();
                //     });
                // }

                // $(document).on('click', '.btn-scan', function () {
                //     $('#area-scan').prop('hidden', false);
                //     $('#btn-scan-action').prop('hidden', true);
                //     $('.barcode-result').prop('hidden', true);
                //     $('.barcode-result-text').html('');
                //     $('.kode_barang_error').prop('hidden', true);
                //     startScan();
                // });

                // $(document).on('click', '.btn-repeat', function () {
                //     $('#area-scan').prop('hidden', false);
                //     $('#btn-scan-action').prop('hidden', true);
                //     $('.barcode-result').prop('hidden', true);
                //     $('.barcode-result-text').html('');
                //     $('.kode_barang_error').prop('hidden', true);
                //     startScan();
                // });

                // $(document).on('click', '.btn-continue', function (e) {
                //     e.stopPropagation();
                //     var kode_barang = $('.barcode-result-text').text();
                //     $.ajax({
                //         url: "{{ url('/transaction/product/check') }}/" + kode_barang,
                //         method: "GET",
                //         success: function (response) {
                //             var check = $('.kode-barang-td:contains(' + response.product
                //                     .kode_barang + ')')
                //                 .length;
                //             if (response.check == 'tersedia') {
                //                 if (check == 0) {
                //                     tambahData(response.product.kode_barang, response.product
                //                         .nama_barang,
                //                         response.product.harga, response.product.stok, response
                //                         .status);
                //                     $('.close-btn').click();
                //                 } else {
                //                     swal(
                //                         "",
                //                         "Barang telah ditambahkan",
                //                         "error"
                //                     );
                //                 }
                //             } else {
                //                 $('.kode_barang_error').prop('hidden', false);
                //             }
                //         }
                //     });
                // });

                // $(document).on('click', '.btn-bayar', function () {
                //     var total = parseInt($('.nilai-total2-td').val());
                //     var bayar = parseInt($('.bayar-input').val());
                //     var check_barang = parseInt($('.jumlah_barang_text').length);
                //     if (bayar >= total) {
                //         $('.nominal-error').prop('hidden', true);
                //         if (check_barang != 0) {
                //             if ($('.diskon-input').attr('hidden') != 'hidden') {
                //                 $('.diskon-input').addClass('is-invalid');
                //             } else {
                //                 $('#transaction_form').submit();
                //             }
                //         } else {
                //             swal(
                //                 "",
                //                 "Pesanan Kosong",
                //                 "error"
                //             );
                //         }
                //     } else {
                //         if (isNaN(bayar)) {
                //             $('.bayar-input').valid();
                //         } else {
                //             $('.nominal-error').prop('hidden', false);
                //         }

                //         if (check_barang == 0) {
                //             swal(
                //                 "",
                //                 "Pesanan Kosong",
                //                 "error"
                //             );
                //         }
                //     }
                // });

                let default_view_pesanan_element = $('#default-view-pesanan').clone()

                let dynamic_data = {};
                let data = new Proxy(dynamic_data, {
                    set: function (target, key, value) {
                        target[key] = value;
                        if (dynamic_data.list_pesanan?.length) {
                            $('#list-pesanan').html('')
                            $('#info-pembayaran').removeClass('d-none')
                            
                            dynamic_data.list_pesanan.map(val => {
                                let produk_element = $('.data-produk.d-none').clone().removeClass('d-none')
                                for (let produk in val) {
                                    console.log(produk, val[produk]);
                                    produk_element.find(`.${produk}`).text(val[produk])
                                }
                                produk_element.appendTo('#list-pesanan')
                            })
                        }
                        else {
                            $('#list-pesanan').html('')
                            default_view_pesanan_element.appendTo($('#list-pesanan'))
                            $('#info-pembayaran').addClass('d-none')
                        }
                        return true;
                    }
                });
                data.list_pesanan = []

                $('.tambah_data').on('click', function() {
                    let produk = {
                        nama_produk: $(this).closest('.card-body').find('.nama_produk').text(),
                        harga_produk: $(this).closest('.card-body').find('.harga_produk').text(),
                        jumlah_produk: 1,
                    }
                    let list_pesanan = data.list_pesanan
                    data.list_pesanan = [...list_pesanan, produk]
                })

            </script>
            @endsection
