@extends('frontend.layout.app')
@section('content')
<div class="container-fluid">
    <div class="row px-xl-5">
        <div class="col-12">
            <nav class="breadcrumb bg-light mb-30">
                <a class="breadcrumb-item text-dark" href="{{ route('home') }}">Home</a>

                <span class="breadcrumb-item active">Shop </span>
            </nav>
        </div>
    </div>
    @livewire('frontend.product-filter')
</div>

@endsection