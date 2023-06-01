<div class="modal fade" id="ModalEdit{{ $restaurant->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Restaurant</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('restaurant.update', ['id' => $restaurant->id]) }}" method="POST" enctype="multipart/form-data">
                    @method("put")
                    @csrf
                    <div class="col-lg-12">
                        <label class="form-label">Nama Restaurant</label>
                        <input type="text" class="form-control" name="name" value="{{ old('name', $restaurant->name) }}">
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Logo</label>
                        <input type="hidden" name="oldLogo" value="{{ $restaurant->logo }}">
                        <input class="form-control" type="file" name="logo" accept="image/jpg,image/jpeg,image/png">
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Image</label>
                        <input type="hidden" name="oldImage" value="{{ $restaurant->image }}">
                        <input class="form-control" type="file" name="image" accept="image/jpg,image/jpeg,image/png">
                    </div>

                    <div class="col-lg-12">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="OPEN" {{ (old('status', $restaurant->status) === 'OPEN') ? 'selected' : '' }}>OPEN {{ (old('status', $restaurant->status) === 'OPEN') ? '(Active)' : '' }}</option>
                            <option value="CLOSED" {{ (old('status', $restaurant->status) === 'CLOSED') ? 'selected' : '' }}>CLOSED {{ (old('status', $restaurant->status) === 'CLOSED') ? '(Active)' : '' }}</option>
                        </select>

                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Restaurant</button>
            </div>
            </form>
        </div>
    </div>
</div>
