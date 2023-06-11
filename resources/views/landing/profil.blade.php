@extends('landing.layouts.app')

@section('title')
<title>Dapurasa - Profil</title>
@endsection

@section('content')

<section id="testimonial">
    <div class="container">
        <div class="row h-100">
            <div class="col-lg-7 mx-auto text-center mb-6">
                <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Profile Saya</h5>
            </div>
        </div>
        <div>
            <form class="row g-3" action="{{ route('landing.profil.update') }}" method="POST">
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
