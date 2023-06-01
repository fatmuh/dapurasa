@extends('admin.layouts.app')

@section('title')
<title>Dapurasa - Restaurant</title>
@endsection

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Restaurant</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Restaurant</h6>
    </div>
    <div class="card-body">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Tambah Restaurant
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title fs-5" id="exampleModalLabel">Tambah Restaurant</h3>
                        <button type="button" data-bs-dismiss="modal">x</button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('restaurant.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label class="col-form-label">Nama Restaurant</label>
                                <input type="text" class="form-control" name="name" placeholder="Nama Restaurant"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Logo</label>
                                <input type="file" class="form-control" name="logo"
                                    accept="image/jpg,image/jpeg,image/png" required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Image</label>
                                <input type="file" class="form-control" name="image"
                                    accept="image/jpg,image/jpeg,image/png" required>
                            </div>

                            <div class="mb-3">
                                <label class="col-form-label">Status</label>
                                <select class="form-control" name="status" required>
                                    <option>---Pilih Status---</option>
                                    <option value="OPEN">OPEN</option>
                                    <option value="CLOSED">CLOSED</option>
                                </select>
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th style="width:60px;">No</th>
                        <th>Nama Restaurant</th>
                        <th>Logo</th>
                        <th>Image</th>
                        <th>Status</th>
                        <th style="width: 200px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $restaurant)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $restaurant->name }}</td>
                        <td>@if (old('logo', $restaurant->logo))
                            <img src="{{ asset('storage/'. old('logo', $restaurant->logo)) }}" width="100px"
                                class="rounded-circle m-3">
                            @else
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                width="70px" class="rounded-circle m-3">
                            @endif</td>
                        <td>@if (old('image', $restaurant->image))
                            <img src="{{ asset('storage/'. old('image', $restaurant->image)) }}" width="70px" height="70px"
                                class="rounded-circle m-3">
                            @else
                            <img src="https://cdn.pixabay.com/photo/2015/10/05/22/37/blank-profile-picture-973460_1280.png"
                                width="70px" class="rounded-circle m-3">
                            @endif</td>
                        <td>{{ $restaurant->status }}</td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $restaurant->id }}"
                                class="btn btn-outline-warning"><i class="fas fa-pen"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $restaurant->id }}"
                                class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @include('admin.pages.restaurant.delete')
                    @include('admin.pages.restaurant.edit')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
