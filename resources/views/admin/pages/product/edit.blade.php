<div class="modal fade" id="ModalEdit{{ $produk->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Produk</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('product.update', ['id' => $produk->id]) }}" method="POST" enctype="multipart/form-data">
                    @method("put")
                    @csrf
                    <div class="col-lg-12">
                        <label class="form-label">Restaurant</label>
                        <select class="form-control" name="restaurant_id" required>
                            <option value="{{ old('restaurant_id', $produk->restaurant_id) }}">{{ $produk->restaurant->name }} (Current)</option>
                            @foreach ($restaurant as $res)
                                <option value="{{ $res->id }}">{{ $res->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Nama Produk</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $produk->name) }}">
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Deskripsi Produk</label>
                        <textarea class="form-control" name="description" cols="5">{{ old('description', $produk->description) }}</textarea>
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Harga Produk</label>
                        <input type="text" class="form-control" name="price" value="{{ old('price', $produk->price) }}">
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Image</label>
                        <input type="hidden" name="oldImage" value="{{ $produk->image }}">
                        <input class="form-control" type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Produk</button>
            </div>
            </form>
        </div>
    </div>
</div>
