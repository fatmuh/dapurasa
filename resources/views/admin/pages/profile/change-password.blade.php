@extends('admin.layouts.app')

@section('title')
<title>Dapurasa - Change Password</title>
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Change Password</h6>
    </div>
    <div class="card-body">
        <form class="row g-3" action="{{ route('profile.changePassword.post') }}" method="POST">
            @csrf
            <div class="col-md-12">
              <label class="form-label">Password Lama</label>
              <input type="password" class="form-control" name="old_password">
            </div>

            <div class="col-md-6 mt-3">
                <label class="form-label">Password Baru</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="col-md-6 mt-3">
                <label class="form-label">Konfirmasi Password Baru</label>
                <input type="password" class="form-control" name="password_confirmation" />
            </div>

            <div class="col-12">
                <div class="d-flex align-items-center justify-content-end mt-4 gap-3">
                    <button class="btn btn-primary">Save</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
