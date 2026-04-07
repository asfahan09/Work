<?php

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

new class extends Component {

    public $product, $category;

    public $colorItemId = null;
    public $prodcolorquantity = 0;

    public $quantityCounts = 1;

    public function colorSelected($colorItemId)
    {
        $this->colorItemId = $colorItemId;

        $prodColor = $this->product->productColors()
            ->where('id', $colorItemId)
            ->first();

        if ($prodColor) {
            $this->prodcolorquantity = $prodColor->quantity;

            if ($this->prodcolorquantity == 0) {
                $this->prodcolorquantity = 'outOfStock';
            }
        }
    }

    public function decrement()
    {
        if ($this->quantityCounts > 1) {
            $this->quantityCounts--;
        }
    }

    public function increment()
    {
        if ($this->quantityCounts < 10) {
            $this->quantityCounts++;
        }
    }

    public function addtoCart($productID)
    {
        if (!Auth::check()) {
            $this->dispatch('message', text: 'Please login to continue', type: 'info');
            return;
        }

        if ($this->product->id != $productID || $this->product->status != 1) {
            $this->dispatch('message', text: 'Product not found', type: 'error');
            return;
        }

        $cartItem = Cart::where('user_id', Auth::id())
            ->where('product_id', $productID)
            ->where('product_color_id', $this->colorItemId)
            ->first();

        if ($cartItem) {
            $this->dispatch('message', text: 'Product already added in cart', type: 'warning');
            return;
        }

        // ================= WITH COLOR =================
        if ($this->product->productColors()->count() > 0) {

            if ($this->colorItemId == null) {
                $this->dispatch('message', text: 'Please select color', type: 'warning');
                return;
            }

            $productcolor = $this->product->productColors()
                ->where('id', $this->colorItemId)
                ->first();

            if (!$productcolor) {
                $this->dispatch('message', text: 'Color not found', type: 'error');
                return;
            }

            if ($productcolor->quantity <= 0) {
                $this->dispatch('message', text: 'Out of stock', type: 'warning');
                return;
            }

            if ($this->quantityCounts > $productcolor->quantity) {
                $this->dispatch('message', text: 'Only ' . $productcolor->quantity . ' available', type: 'warning');
                return;
            }

            //  CREATE CART
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productID,
                'product_color_id' => $productcolor->id,
                'quantity' => $this->quantityCounts,
            ]);

         
        }

        // ================= WITHOUT COLOR =================
        else {

            if ($this->product->quantity <= 0) {
                $this->dispatch('message', text: 'Out of stock', type: 'warning');
                return;
            }

            if ($this->quantityCounts > $this->product->quantity) {
                $this->dispatch('message', text: 'Only ' . $this->product->quantity . ' available', type: 'warning');
                return;
            }

            // CREATE CART
            Cart::create([
                'user_id' => Auth::id(),
                'product_id' => $productID,
                'product_color_id' => null,
                'quantity' => $this->quantityCounts,
            ]);

          
        }

        // EVENTS
        $this->dispatch('CartAddedupdated');
        $this->dispatch('message', text: 'Product added to cart', type: 'success');
    }

    public function mount($category = null, $product)
    {
        $this->category = $category;
        $this->product = $product;
    }
};
?>

<div>

    <!-- SHOP DETAIL -->

    <div class="container-fluid pb-5">
        <div class="row px-xl-5 bg-white p-4 rounded shadow-sm">

            <!-- PRODUCT IMAGE -->
            <div class="col-lg-5 mb-4">
                <div id="product-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner bg-light rounded">

                        @foreach($product->productImages as $key => $image)
                        <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                            <img class="w-100 border p-4" src="{{ asset($image->image) }}" style="height:400px; object-fit:contain;">
                        </div>
                        @endforeach

                    </div>

                    <a class="carousel-control-prev" href="#product-carousel" data-slide="prev">
                        <i class="fa fa-2x fa-angle-left text-dark"></i>
                    </a>
                    <a class="carousel-control-next" href="#product-carousel" data-slide="next">
                        <i class="fa fa-2x fa-angle-right text-dark"></i>
                    </a>
                </div>
            </div>

            <!-- PRODUCT DETAILS -->
            <div class="col-lg-7">

                <h2 class="font-weight-bold mb-2">{{ $product->name }}</h2>

                <!-- PRICE -->
                <h3 class="text-danger mb-3">
                    PKR {{ number_format($product->selling_price) }}
                </h3>

                <!-- DESCRIPTION -->
                <p class="text-muted">
                    {{ $product->description }}
                </p>

                <hr>

                <!-- COLORS -->
                <div class="mb-3">
                    <strong>Select Color:</strong><br>

                    <div class="mb-3">


                        <div class="mt-2">

                            @foreach ($product->productColors as $color)
                            <div class="form-check form-check-inline">

                                <input
                                    class="form-check-input"
                                    type="radio"
                                    name="color"
                                    id="color-{{ $color->id }}"
                                    wire:click="colorSelected({{ $color->id }})">

                                <label class="form-check-label" for="color-{{ $color->id }}">
                                    {{ $color->color->name }}
                                </label>

                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>

                <!-- STOCK -->
                @if($prodcolorquantity)
                <div class="mb-3">
                    @if($prodcolorquantity === 'outOfStock')
                    <span class="text-danger font-weight-bold">Out of Stock</span>
                    @else
                    <span class="text-success">
                        In Stock ({{ $prodcolorquantity }} available)
                    </span>
                    @endif
                </div>
                @endif

                <!-- QUANTITY -->
                <div class="d-flex align-items-center mb-4">
                    <strong class="mr-3">Quantity:</strong>

                    <div class="input-group" style="width: 130px;">
                        <div class="input-group-prepend">
                            <button type="button" wire:click="decrement" class="btn btn-warning">-</button>
                        </div>

                        <input
                            type="text"
                            wire:model="quantityCounts"
                            class="form-control text-center">

                        <div class="input-group-append">
                            <button type="button" wire:click="increment" class="btn btn-warning">+</button>
                        </div>
                    </div>
                </div>

                <!-- ADD TO CART -->
                <button
                    type="button"
                    wire:click.prevent="addtoCart({{ $product->id }})"
                    class="btn btn-lg btn-primary px-5">
                    <i class="fa fa-shopping-cart mr-2"></i> Add To Cart
                </button>

            </div>
        </div>
    </div>

</div>