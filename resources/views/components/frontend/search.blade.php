<?php

use Livewire\Volt\Component;
use App\Models\Product;

new class extends Component {

    public $search = '';

    public function with()
    {
        return [
            'products' => $this->search
                ? Product::where('name', 'like', '%' . $this->search . '%')->get()
                : []
        ];
    }
};
?>

<div class="col-lg-4 col-6 text-left position-relative">

    <div class="input-group">
        <input
            type="text"
            class="form-control"
            placeholder="Search for products"
            wire:model.live="search">

        <div class="input-group-append">
            <span class="input-group-text bg-transparent text-primary">
                <i class="fa fa-search"></i>
            </span>
        </div>
    </div>

    @if($search)
    <div class="bg-white border mt-2 p-2 position-absolute w-100" style="z-index:1000;">

        @forelse($products as $product)

        <div class="p-2 border-bottom d-flex  align-items-center gap-4 hover-bg">

            <!-- Product Image -->
            <div style="width:50px; height:50px; overflow:hidden; border-radius:6px;">
                <a href="{{ route('shopdetail',$product->slug) }}">

                    <img
                        src="{{ asset($product->productImages[0]->image ?? 'default.png') }}"
                        alt="
                        {{ $product->name }}"
                        style="width:100%; height:100%; object-fit:cover;">

                </a>
            </div>

            <!-- Product Info -->
            <div class="flex-grow-1">
                <div style="font-size:14px; font-weight:500;">
                    <a href="{{ route('shopdetail',$product->slug) }}">
                        {{ $product->name }}
                    </a>
                </div>
            </div>

        </div>
        @empty
        <div class="p-2 text-muted">No product found</div>
        @endforelse

    </div>
    @endif

</div>