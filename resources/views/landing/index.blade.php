    @extends('landing.layouts.app')

    @section('title')
        <title>Dapurasa</title>
    @endsection

    @section('content')
    <section class="py-5 overflow-hidden bg-primary" id="home">
        <div class="container">
            <div class="row flex-center">
                <div class="col-md-5 col-lg-6 order-0 order-md-1 mt-8 mt-md-0"><a class="img-landing-banner"
                        href="#!"><img class="img-fluid" src="{{ asset('assets/img/gallery/hero-header.png') }}"
                            alt="hero-header" /></a></div>
                <div class="col-md-7 col-lg-6 py-8 text-md-start text-center">
                    <h1 class="display-1 fs-md-5 fs-lg-6 fs-xl-8 text-light">Kamu lapar?</h1>
                    <h1 class="text-800 mb-5 mt-4 fs-4">Dalam beberapa klik, makanan anda akan diantar<br
                            class="d-none d-xxl-block" />sesuai pesanan anda!</h1>
                    <a href="#" class="btn btn-danger" type="submit">Find Food</a>
                </div>
            </div>
        </div>
    </section>

    <!-- ============================================-->
    <!-- <section> begin ============================-->
    <section class="py-0 bg-primary-gradient">

        <div class="container">
            <div class="row justify-content-center g-0">
                <div class="col-xl-9">
                    <div class="col-lg-6 text-center mx-auto mb-3 mb-md-5 mt-4">
                        <h5 class="fw-bold text-danger fs-3 fs-lg-5 lh-sm my-6">How does it work</h5>
                    </div>
                    <div class="row">
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                    src="{{ asset('assets/img/gallery/location.png') }}" height="112" alt="..." />
                                <h5 class="mt-4 fw-bold">Select location</h5>
                                <p class="mb-md-0">Choose the location where your food will be delivered.</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                    src="{{ asset('assets/img/gallery/order.png') }}" height="112" alt="..." />
                                <h5 class="mt-4 fw-bold">Choose order</h5>
                                <p class="mb-md-0">Check over hundreds of menus to pick your favorite food</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                    src="{{ asset('assets/img/gallery/pay.png') }}" height="112" alt="..." />
                                <h5 class="mt-4 fw-bold">Pay advanced</h5>
                                <p class="mb-md-0">It's quick, safe, and simple. Select several methods of payment</p>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3 mb-6">
                            <div class="text-center"><img class="shadow-icon"
                                    src="{{ asset('assets/img/gallery/meals.png') }}" height="112" alt="..." />
                                <h5 class="mt-4 fw-bold">Enjoy meals</h5>
                                <p class="mb-md-0">Food is made and delivered directly to your home.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <section id="testimonial">
        <div class="container">
            <div class="row h-100">
                <div class="col-lg-7 mx-auto text-center mb-6">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm mb-3">Featured Restaurants</h5>
                </div>
            </div>
            <div class="row gx-2">
                @foreach ($restaurant as $res)
                <a href="{{ route('landing.product', $res->id) }}">
                    <div class="col-sm-6 col-md-4 col-lg-3 h-100 mb-5">
                        <div class="card card-span h-100 text-white rounded-3"><img class="img-fluid rounded-3 h-100"
                                src="{{ asset('storage/'. old('image', $res->image)) }}" alt="..." />
                            <div class="card-body ps-0">
                                <div class="d-flex align-items-center mb-3"><img class="img-fluid"
                                        src="{{ asset('storage/'. old('logo', $res->logo)) }}" width="90px" />
                                    <div class="flex-1 ms-3">
                                        <h5 class="mb-0 fw-bold text-1000">{{ $res->name }}</h5>
                                    </div>
                                </div><span
                                    class="badge {{ ($res->status === 'OPEN') ? 'bg-soft-success' : 'bg-soft-danger' }} p-2">
                                    <span
                                        class="fw-bold fs-1 {{ ($res->status === 'OPEN') ? 'text-success' : 'text-danger' }}">{{ $res->status }}</span>
                                </span>

                            </div>
                        </div>
                    </div>
                </a>
                @endforeach

                {{-- <div class="col-12 d-flex justify-content-center mt-5"> <a class="btn btn-lg btn-primary" href="#!">View
                        All <i class="fas fa-chevron-right ms-2"> </i></a></div> --}}
            </div>
        </div>
    </section>


    <!-- ============================================-->
    <!-- <section> begin ============================-->
    {{-- <section class="py-8 overflow-hidden">

        <div class="container">
            <div class="row flex-center mb-6">
                <div class="col-lg-7">
                    <h5 class="fw-bold fs-3 fs-lg-5 lh-sm text-center text-lg-start">Search by Food</h5>
                </div>
                <div class="col-lg-4 text-lg-end text-center"><a class="btn btn-lg text-800 me-2" href="#"
                        role="button">VIEW ALL <i class="fas fa-chevron-right ms-2"></i></a></div>
                <div class="col-lg-auto position-relative">
                    <button class="carousel-control-prev s-icon-prev carousel-icon" type="button"
                        data-bs-target="#carouselSearchByFood" data-bs-slide="prev"><span
                            class="carousel-control-prev-icon hover-top-shadow" aria-hidden="true"></span><span
                            class="visually-hidden">Previous</span></button>
                    <button class="carousel-control-next s-icon-next carousel-icon" type="button"
                        data-bs-target="#carouselSearchByFood" data-bs-slide="next"><span
                            class="carousel-control-next-icon hover-top-shadow" aria-hidden="true"></span><span
                            class="visually-hidden">Next</span></button>
                </div>
            </div>
            <div class="row flex-center">
                <div class="col-12">
                    <div class="carousel slide" id="carouselSearchByFood" data-bs-touch="false"
                        data-bs-interval="false">
                        <div class="carousel-inner">
                            <div class="carousel-item active" data-bs-interval="10000">
                                <div class="row h-100 align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/search-pizza.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/burger.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/noodles.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/sub-sandwich.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">
                                                    Sub-sandwiches</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/chowmein.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/steak.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="5000">
                                <div class="row h-100 align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/search-pizza.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/burger.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/noodles.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/sub-sandwich.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">
                                                    Sub-sandwiches</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/chowmein.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/steak.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item" data-bs-interval="3000">
                                <div class="row h-100 align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/search-pizza.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/burger.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/noodles.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/sub-sandwich.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">
                                                    Sub-sandwiches</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/chowmein.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/steak.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <div class="row h-100 align-items-center">
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/search-pizza.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">pizza</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/burger.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Burger</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/noodles.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Noodles
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/sub-sandwich.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">
                                                    Sub-sandwiches</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/chowmein.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Chowmein
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl mb-5 h-100">
                                        <div class="card card-span h-100 rounded-circle"><img
                                                class="img-fluid rounded-circle h-100"
                                                src="{{ asset('assets/img/gallery/steak.png') }}" alt="..." />
                                            <div class="card-body ps-0">
                                                <h5 class="text-center fw-bold text-1000 text-truncate mb-2">Steak</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- end of .container-->

    </section> --}}
    <!-- <section> close ============================-->
    <!-- ============================================-->


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
                                        <img src="{{ asset('assets/img/icons/discounts.png') }}" width="100"
                                            alt="..." />
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
