@extends('admin.layouts.app')

@section('title')
<title>Dapurasa - Update Profile</title>
@endsection

@section('content')

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Update Profile</h6>
    </div>
    <div class="card-body">
        <form class="row g-3" action="{{ route('profile.update') }}" method="POST">
            @csrf
            <div class="col-md-6">
              <label class="form-label">Name</label>
              <input type="text" class="form-control" name="name" value="{{ auth()->user()->name }}">
            </div>
            <div class="col-md-6">
              <label class="form-label">Email</label>
              <input type="text" class="form-control" name="email" value="{{ auth()->user()->email }}">
            </div>

            <div class="col-md-6 mt-3">
                <label class="form-label">Address</label>
                <textarea type="text" class="form-control" name="address">{{ auth()->user()->address }}</textarea>
            </div>
            <div class="col-md-6 mt-3">
                <label class="form-label">Phone</label>
                <input type="number" class="form-control" name="phone" value="{{ auth()->user()->phone }}">
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
