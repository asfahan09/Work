@extends('frontend.layout.app')
@section('content')
<!-- Products Start -->
 <div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Home</a>

                <span class="breadcrumb-item active">Category  </span>
            </nav>
        </div>
    </div>

</div>
<div class="container-fluid pt-5 pb-3">

    <div class="row px-xl-5">
        @foreach ($allproducts as $showallprod )
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
        @endforeach
      
    </div>
</div>
<!-- Products End -->
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