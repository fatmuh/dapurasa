<div class="modal fade" id="ModalEdit{{ $order->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Status Pesanan</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('order.update', ['id' => $order->id]) }}" method="POST" enctype="multipart/form-data">
                    @method("put")
                    @csrf
                    <div class="col-lg-12">
                        <label class="form-label">Status</label>
                        <select class="form-control" name="status" required>
                            <option value="{{ old('status', $order->status) }}">{{ $order->status }}
                                (Current)</option>
                            @foreach (['Pending', 'Cooking', 'Delivery Preparation', 'Delivering', 'Delivered', 'Cancelled'] as $status)
                                @if ($status != $order->status)
                                    <option value="{{ $status }}">{{ $status }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Status</button>
            </div>
            </form>
        </div>
    </div>
</div>
