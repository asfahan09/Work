@extends('frontend.layout.app')
@section('content')


<!-- Carousel Start -->
<div class="container-fluid mb-3">

    <div class="row px-xl-5">
        <div class="col-lg-12">
            <div id="header-carousel" class="carousel slide carousel-fade mb-30 mb-lg-0" data-ride="carousel">

                <!-- Indicators -->
                <ol class="carousel-indicators">
                    @foreach($sliders as $key => $slider)
                    <li data-target="#header-carousel" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"></li>
                    @endforeach
                </ol>

                <!-- Slides -->
                <div class="carousel-inner">

                    @foreach($sliders as $key => $slider)

                    <div class="carousel-item position-relative {{ $key == 0 ? 'active' : '' }}" style="height: 430px;">

                        <img class="position-absolute w-100 h-100"
                            src="{{ asset($slider->image) }}"
                            style="object-fit: cover;">

                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">

                            <div class="p-3" style="max-width: 700px;">

                                <!-- TITLE -->
                                <!-- <h1 class="display-4 text-white mb-3 animate__animated animate__fadeInDown">
                                    {{ $slider->category->name ?? $slider->name }}
                                </h1> -->



                                <!-- BUTTON -->
                                <!-- <a class="btn btn-outline-light py-2 px-4 mt-3 animate__animated animate__fadeInUp"
                                    href="{{ $slider->button_link }}">
                                    {{ $slider->button_text ?? 'Shop Now' }}
                                </a> -->

                            </div>

                        </div>

                    </div>

                    @endforeach

                </div>

            </div>
        </div>

    </div>
</div>
<!-- Carousel End -->


<!-- Featured Start -->
<div class="container-fluid pt-5">
    <div class="row px-xl-5 pb-3">
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
            <div class="d-flex align-items-center bg-light mb-4" style="padding: 30px;">
                <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
            </div>
        </div>
    </div>
</div>
<!-- Featured End -->


<!-- Categories Start -->
<div class="container-fluid pt-5">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Categories</span></h2>
    <div class="row px-xl-5 pb-3">
        @foreach ($subcategory as $chilcategory)

        <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
            <a class="text-decoration-none" href="{{ route('category',$chilcategory->slug) }}">
                <div class="cat-item d-flex align-items-center mb-4">
                    <div class="overflow-hidden" style="width: 100px; height: 100px;">
                        <img
                            src="{{ asset($chilcategory->image) }}"
                            alt=""
                            style="width: 100%; height: 100%; object-fit: cover;">
                    </div>
                    <div class="flex-fill pl-3">
                        <h6>{{ $chilcategory->name }}</h6>
                        <small class="text-body">
                            {{ $chilcategory->products_count }} Products
                        </small>
                    </div>
                </div>
            </a>
        </div>

        @endforeach



    </div>
</div>
<!-- Categories End -->





<!-- Offer Start -->
<div class="container-fluid pt-5 pb-3">
    <div class="row px-xl-5">
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="{{ asset('images/gradient-shopping-discount-horizontal-sale-banner_23-2150321996.avif') }}" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="product-offer mb-30" style="height: 300px;">
                <img class="img-fluid" src="{{ asset('images/360_F_465465254_1pN9MGrA831idD6zIBL7q8rnZZpUCQTy.jpg') }}" alt="">
                <div class="offer-text">
                    <h6 class="text-white text-uppercase">Save 20%</h6>
                    <h3 class="text-white mb-3">Special Offer</h3>
                    <a href="" class="btn btn-primary">Shop Now</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Products Start -->
<div class="container-fluid pt-5 pb-3">
    <h2 class="section-title position-relative text-uppercase mx-xl-5 mb-4"><span class="bg-secondary pr-3">Recent Products</span></h2>
    <div class="row px-xl-5">
        @foreach ($recentprod as $showallprod )
        <a href="#">

            <div class="col-lg-3 col-md-4 col-sm-6 pb-1">
                <a href="{{ route('shopdetail',$showallprod->slug) }}">
                    <div class="product-item bg-light mb-4">
                        <div class="product-img position-relative overflow-hidden">
    
                            <img class="img-fluid w-100 product-img border" src="{{ isset($showallprod->productImages[0]) ? asset($showallprod->productImages[0]->image) : '' }}">>
    
                            <div class="product-action">
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-shopping-cart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="far fa-heart"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-sync-alt"></i></a>
                                <a class="btn btn-outline-dark btn-square" href=""><i class="fa fa-search"></i></a>
                            </div>
                        </div>
                        <div class="text-center py-4">
                            <a class="h6 text-decoration-none text-truncate" href="{{ route('shopdetail',$showallprod->slug) }}">{{ $showallprod->name }}</a>
                            <div class="d-flex align-items-center justify-content-center mt-2">
                                <h5>{{ number_format($showallprod->selling_price) }}</h5>
                                <h6 class="text-muted ml-2"><del>{{ number_format($showallprod->original_price) }}</del></h6>
                            </div>
                            <div class="d-flex align-items-center justify-content-center mb-1">
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small class="fa fa-star text-primary mr-1"></small>
                                <small>(99)</small>
                            </div>
                              <a href="{{ route('shopdetail', $showallprod->slug) }}" class=" px-5 btn btn-warning w-75 text-white">
                            <i class="bi bi-cart"></i> Show Detail
                        </a>
                        </div>
                    </div>
                </a>
            </div>
        </a>
        @endforeach

    </div>
</div>
<!-- Products End -->


<!-- Vendor Start -->
<div class="container-fluid py-5">
    <div class="row px-xl-5">
        <div class="col">
            <div class="owl-carousel vendor-carousel">
                <div class="bg-light p-4">
                    <img src="img/vendor-1.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-2.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-3.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-4.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-5.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-6.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-7.jpg" alt="">
                </div>
                <div class="bg-light p-4">
                    <img src="img/vendor-8.jpg" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Vendor End -->
<style>
    .product-card {
        border-radius: 12px;
        transition: all 0.3s ease;
    }

    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }

    .product-img {
        height: 300px;
        object-fit: cover;
        transition: 0.3s;
    }

    .product-card:hover .product-img {
        transform: scale(1.05);
    }
</style>

@endsection