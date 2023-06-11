@extends('landing.layouts.app')

@section('title')
    <title>Dapurasa - Food List</title>
@endsection

@section('content')

<section id="testimonial">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Food List</h5>
            </div>
        </div>
        <div class="col-12">
            <div class="row gx-2">
                @foreach ($product as $produk)
                <div class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5">
                    <div class="card card-span h-100 rounded-3"><img class="img-fluid rounded-3 h-100"
                            src="{{ asset('storage/'. old('image', $produk->image)) }}" />
                        <div class="card-body ps-0">
                            <h5 class="fw-bold text-1000 text-truncate mb-1">{{ $produk->name }}</h5>
                            <div><span
                                    class="text-primary">{{ $produk->restaurant->name }}</span></div><span
                                class="text-1000 fw-bold">{{ "Rp".number_format($produk->price,2,',','.') }}</span>
                        </div>
                    </div>
                    <div class="d-grid gap-2">
                        @guest
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                        data-bs-target="#exampleModal">Masuk</button>
                        @else
                        <button type="button" class="btn btn-lg btn-danger" data-bs-toggle="modal" data-bs-target="#orderNow{{ $produk->id }}">Order now</button>
                        @endguest
                    </div>
                </div>
                @include('landing.modal.order')
                @endforeach
            </div>
        </div>
    </div>
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
