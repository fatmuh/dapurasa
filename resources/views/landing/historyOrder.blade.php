@extends('landing.layouts.app')

@section('title')
<title>Dapurasa - Riwayat Pesanan</title>
@endsection

@section('content')

<section id="testimonial">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Riwayat Pesanan</h5>
            </div>
        </div>
        <div class="text-center">
            <table class="table table-hover">
                <thead class="table-primary">
                    <tr>
                        <th scope="col">No Order</th>
                        <th scope="col">Pesanan</th>
                        <th scope="col">Restaurant</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Total Harga</th>
                        <th scope="col">Status</th>
                        <th scope="col">Bukti Transfer</th>
                        <th scope="col">Waktu Pengambilan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $order)
                    <tr>
                        <th scope="row">#{{ $order->id }}</th>
                        <td>{{ $order->product->name }}</td>
                        <td>{{ $order->product->restaurant->name }}</td>
                        <td>{{ $order->quantity }}</td>
                        <td>
                            @php
                            $total = $order->quantity * $order->product->price;
                            @endphp
                            {{ "Rp".number_format($total,2,',','.') }}
                        </td>
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
                            @if ($order->proof_of_payment == null)
                                -
                            @else
                                <a href="{{ asset('storage/'.$order->proof_of_payment) }}" class="badge btn-primary" target="_blank">Lihat Bukti</a>
                            @endif
                        </td>
                        <td>{{ date('d M Y \J\a\m H:i', strtotime($order->delivery_time)) }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</section>


<section>
    <div class="bg-holder"
        style="background-image:url(assets/img/gallery/cta-one-bg.png);background-position:center;background-size:cover;">
    </div>
    <!--/.bg-holder-->

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-10">
                <div class="card card-span shadow-warning" style="border-radius: 35px;">
                    <div class="card-body py-5">
                        <div class="row justify-content-evenly">
                            <div class="col-md-3">
                                <div
                                    class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                    <img src="{{ asset('assets/img/icons/discounts.png') }}" width="100" alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <h2 class="fw-bolder text-1000 mb-0 text-gradient">Daily<br
                                                class="d-none d-md-block" />Discounts </h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 hr-vertical">
                                <div
                                    class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                    <img src="{{ asset('assets/img/icons/live-tracking.png') }}" width="100"
                                        alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <h2 class="fw-bolder text-1000 mb-0 text-gradient">Live Tracking</h2>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3 hr-vertical">
                                <div
                                    class="d-flex d-md-block d-xl-flex justify-content-evenly justify-content-lg-between">
                                    <img src="{{ asset('assets/img/icons/quick-delivery.png') }}" width="100"
                                        alt="..." />
                                    <div class="d-flex d-lg-block d-xl-flex flex-center">
                                        <h2 class="fw-bolder text-1000 mb-0 text-gradient">Quick Delivery </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection
