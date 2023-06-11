<div class="modal fade" id="ModalEdit{{ $user->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title fs-5" id="exampleModalLabel">Edit Role User</h3>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">x</button>
            </div>
            <div class="modal-body">
                <form class="row g-3" action="{{ route('user.update', ['id' => $user->id]) }}" method="POST" enctype="multipart/form-data">
                    @method("put")
                    @csrf
                    <div class="col-lg-12">
                        <label class="form-label">Role</label>
                        <select class="form-control" name="roles" required>
                            <option value="{{ old('roles', $user->roles) }}">{{ $user->roles }}
                                (Current)</option>
                            @foreach (['User', 'Admin'] as $roles)
                                @if ($roles != $user->roles)
                                    <option value="{{ $roles }}">{{ $roles }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Edit Role</button>
            </div>
            </form>
        </div>
    </div>
</div>
