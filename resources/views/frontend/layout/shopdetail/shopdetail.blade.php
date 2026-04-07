@extends('frontend.layout.app')
@section('content')
@livewire('frontend.shopdetail', [
    'product' => $product,
    'category' => $product->category
])
@endsection