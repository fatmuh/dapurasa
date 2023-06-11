<div class="modal fade" id="orderNow{{ $produk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Pesan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('order.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="col-lg-6">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" value="{{ old('name', $produk->name) }}" readonly>
                        <input type="hidden" class="form-control" name="product_id" value="{{ old('product_id', $produk->id) }}" readonly>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Restaurant</label>
                        <input type="text" class="form-control" value="{{ old('restaurant', $produk->restaurant->name) }}" readonly>
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" name="description" cols="5" readonly>{{ old('description', $produk->description) }}</textarea>
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control" name="quantity" placeholder="Jumlah Order" value="{{ old('quantity') }}" oninput="calculateTotal({{ $produk->price }}, '{{ $produk->id }}')">
                    </div>

                    <div class="col-lg-6">
                        <label class="form-label">Total Pembayaran</label>
                        <input type="text" class="form-control" id="total{{ $produk->id }}" placeholder="Jumlah Order" value="{{ old('quantity') }}" disabled>
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Tipe Pembayaran</label>
                        <select class="form-select" name="type_of_payment" required>
                            <option selected>---Pilih---</option>
                            <option value="COD">COD</option>
                            <option value="Transfer">Transfer</option>
                          </select>
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Alamat Pengiriman</label>
                        <textarea class="form-control" name="delivery_address">{{ old('delivery_address') }}</textarea>
                    </div>

                    <div class="col-lg-12 text-center">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/5c/Bank_Central_Asia.svg/2560px-Bank_Central_Asia.svg.png" alt="" width="50px"><br>71528132823 a.n. Dapurasa
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Bukti Pembayaran</label>
                        <input type="file" class="form-control" name="proof_of_payment" accept="image/jpg,image/jpeg,image/png">
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Waktu Pengiriman</label>
                        <input type="datetime-local" class="form-control" name="delivery_time" value="{{ old('delivery_time') }}">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Pesan</button>
            </div>
            </form>
        </div>
    </div>
</div>

<script>
    function formatCurrency(amount) {
        return new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(amount);
    }

    function calculateTotal(price, id) {
        var quantity = document.querySelector('input[name="quantity"][oninput="calculateTotal(' + price + ', \'' + id + '\')"]').value;
        var total = quantity * price;

        var inputId = 'total' + id;
        document.getElementById(inputId).value = formatCurrency(total);
    }
</script>
