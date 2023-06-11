<div class="modal fade" id="ModalDetail{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Detail Pesanan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="" method="POST" enctype="multipart/form-data">

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Produk</label>
                            <input type="text" class="form-control" value="{{ $order->product->name }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Restaurant</label>
                            <input type="text" class="form-control" value="{{ $order->product->restaurant->name }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Pemesan</label>
                            <input type="text" class="form-control" value="{{ $order->users->name }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Jumlah Order</label>
                            <input type="text" class="form-control" value="{{ $order->quantity }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Total Harga</label>
                            @php
                            $total = $order->quantity * $order->product->price;
                            @endphp
                            <input type="text" class="form-control" value="{{ "Rp".number_format($total,2,',','.') }}" readonly>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Tipe Pembayaran</label>
                            <input type="text" class="form-control" value="{{ $order->type_of_payment }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Bukti Pembayaran</label><br>
                            @if ($order->proof_of_payment == null)
                                -
                            @else
                                <a href="{{ asset('storage/'.$order->proof_of_payment) }}" class="btn btn-primary btn-block d-grid" target="_blank">Lihat Bukti</a>
                            @endif
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Alamat Pengiriman</label>
                            <textarea class="form-control" readonly>{{ $order->delivery_address }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Waktu Pengiriman</label>
                            <input type="text" class="form-control" value="{{ $order->delivery_time }}" readonly>
                        </div>

                        <div class="col-md-6 mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" value="{{ $order->status }}" readonly>
                        </div>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
            </div>
            </form>
        </div>
    </div>
</div>
