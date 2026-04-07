<?php

use Livewire\Volt\Component;
use App\Models\Product;
use App\Models\Brand;
use Livewire\WithPagination;

new class extends Component {
    use WithPagination;
    public $sort = '';
    public $selectedBrands = [];

    public function getProductsProperty()
    {
        return Product::when($this->sort === 'low-high', fn($q) => $q->orderBy('original_price'))
            ->when($this->sort === 'high-low', fn($q) => $q->orderByDesc('original_price'))
            ->when($this->selectedBrands, fn($q) => $q->whereIn('brand', $this->selectedBrands))
            ->when(!$this->sort, fn($q) => $q->latest())
            ->paginate(12);
    }

    public function getBrandsProperty()
    {
        return Brand::select('id', 'name')->get();
    }
};
?>
<div class="row px-xl-5 ">

    <!-- Sidebar -->
    <div class="col-lg-3">

        <!-- Price Sort -->
        <div class="bg-light p-3 mb-3 rounded">
            <h6 class="fw-bold mb-2">Sort by Price</h6>

            <label><input type="radio" wire:model.live="sort" value="low-high"> Low → High</label><br>
            <label><input type="radio" wire:model.live="sort" value="high-low"> High → Low</label>
        </div>

        <!-- Brand Filter -->
        <div class="bg-light p-3 rounded">
            <h6 class="fw-bold mb-2">Brands</h6>

            @foreach ($this->brands as $brand)
            <label class="d-block">
                <input type="checkbox" wire:model.live="selectedBrands" value="{{ $brand->id }}">
                {{ $brand->name }}
            </label>
            @endforeach
        </div>

    </div>

    <!-- Products -->
    <div class="col-lg-9">
        <div class="row g-4">

            @foreach ($this->products as $product)

            <div class="col-lg-4 col-md-6 mt-4">
                <div class="card border-0 shadow-sm h-100 product-card">

                    <!-- Image -->
                    <div class="position-relative overflow-hidden">
                        <img class="w-100 product-img border"
                            src="{{ isset($product->productImages[0]) ? asset($product->productImages[0]->image) : '' }}">
                    </div>

                    <!-- Content -->
                    <div class="card-body text-center">

                        <h6 class="mb-2 text-truncate fw-semibold">
                            {{ $product->name }}
                        </h6>

                        <!-- Price -->
                        <div class="mb-2">
                            <span class="fw-bold text-dark fs-5">
                                PKR {{ number_format($product->selling_price) }}
                            </span>

                            @if($product->selling_price < $product->original_price)
                                <small class="text-muted ms-2">
                                    <del>PKR {{ number_format($product->original_price) }}</del>
                                </small>
                                @endif
                        </div>

                    </div>

                    <!-- Button -->
                    <div class="card-footer bg-white border-0 px-3 pb-3">
                        @if($product->quantity > 0)
                        <a href="{{ route('shopdetail', $product->slug) }}" class="btn btn-warning text-white w-100">
                            <i class="bi bi-cart"></i> Show Detail
                        </a>
                        @else
                        <button class="btn btn-danger w-100" disabled>
                            Out of Stock
                        </button>
                        @endif
                    </div>

                </div>
            </div>

            @endforeach

        </div>

        <!-- 🔥 Pagination -->
        <div class="mt-5 d-flex justify-content-center">
            {{ $this->products->links('pagination::bootstrap-5') }}
        </div>

    </div>

</div>
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
        height: 250px;
        object-fit: cover;
        transition: 0.3s;
    }

    .product-card:hover .product-img {
        transform: scale(1.05);
    }
</style>