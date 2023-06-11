@extends('admin.layouts.app')

@section('title')
<title>Dapurasa - Pesanan</title>
@endsection

@section('content')

<!-- Page Heading -->
<h1 class="h3 mb-2 text-gray-800">Pesanan</h1>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Daftar Pesanan</h6>
    </div>
    <div class="card-body">

        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr class="text-center">
                        <th style="width:30px;">No</th>
                        <th>No Order</th>
                        <th>Produk</th>
                        <th>Restaurant</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Waktu Antar</th>
                        <th>Status</th>
                        <th style="width: 150px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $order)
                    <tr class="text-center">
                        <td>{{ $loop->iteration }}</td>
                        <td>#{{ $order->id }}</td>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->product->restaurant->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>
                            @php
                            $total = $order->quantity * $order->product->price;
                            @endphp
                            {{ "Rp".number_format($total,2,',','.') }}
                        </td>
                        <td>{{ date('d M Y \J\a\m H:i', strtotime($order->delivery_time)) }}</td>
                        <td>
                            @if ($order->status == 'Pending')
                                <span class="badge btn-dark">Pending</span>
                            @elseif ($order->status == 'Cooking')
                                <span class="badge btn-primary">Cooking</span>
                            @elseif ($order->status == 'Delivery Preparation')
                                <span class="badge btn-primary">Delivery Preparation</span>
                            @elseif ($order->status == 'Delivering')
                                <span class="badge btn-primary">Delivering</span>
                            @elseif ($order->status == 'Delivered')
                                <span class="badge btn-success">Delivered</span>
                            @else
                                <span class="badge btn-danger">Cancelled</span>
                            @endif
                        </td>
                        <td>
                            <a href="" data-bs-toggle="modal" data-bs-target="#ModalDetail{{ $order->id }}"
                                class="btn btn-outline-primary"><i class="fas fa-eye"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#ModalEdit{{ $order->id }}"
                                class="btn btn-outline-warning"><i class="fas fa-pen"></i></a>
                            <a href="" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $order->id }}"
                                class="btn btn-outline-danger"><i class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    @include('admin.pages.pesanan.edit')
                    @include('admin.pages.pesanan.delete')
                    @include('admin.pages.pesanan.detail')
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
