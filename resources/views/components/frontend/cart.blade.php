<?php

use App\Models\Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

new class extends Component
{
    public $showcartData = [];

    public $grandTotal = 0;



public function calculateTotal()
{
    $this->grandTotal = 0;

    foreach ($this->showcartData as $item) {
        $this->grandTotal += $item->product->selling_price * $item->quantity;
    }
}
    //  page load par data fetch
    public function mount()
    {
        $this->loadCart();
        $this->calculateTotal();
    }

    //  reusable function
    public function loadCart()
    {
        $this->showcartData = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();
    }

    public function increament(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)
            ->where('user_id', Auth::id())
            ->first();

        if ($cartData) {

            $proclr = $cartData->productColor()
                ->where('id', $cartData->product_color_id)
                ->first();

            if ($proclr) {

                if ($proclr->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                } else {
                    $this->dispatch('message', text: 'quantity not available', type: 'warning');
                }

            } else {

                //  FIX: products → product
                if ($cartData->product->quantity > $cartData->quantity) {
                    $cartData->increment('quantity');
                } else {
                    $this->dispatch('message', text: 'quantity not available', type: 'warning');
                }
            }
            $this->loadCart(); //  refresh without reload
            $this->calculateTotal(); //  add this
        }
    }

    public function decreament(int $cartId)
    {
        $cartData = Cart::where('id', $cartId)
            ->where('user_id', Auth::id())
            ->first();

        if ($cartData) {

            if ($cartData->quantity > 1) {
                $cartData->decrement('quantity');
            } else {
                $this->dispatch('message', text: 'minimum quantity is 1', type: 'warning');
            }
            $this->loadCart(); //  refresh
            $this->calculateTotal(); //  add this
        }
    }

    public function removecart($cartId)
    {
        $cartData = Cart::where('id', $cartId)
            ->where('user_id', Auth::id())
            ->first();

        if ($cartData) {
            $cartData->delete();
            $this->dispatch('message', text: 'Item Deleted', type: 'success');
            $this->loadCart(); // refresh
            $this->calculateTotal(); //  add this
        }
    }
};
?>
<div>
    {{-- Order your soul. Reduce your wants. - Augustine --}}
    <!-- Breadcrumb Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-12">
                <nav class="breadcrumb bg-light mb-30">
                    <a class="breadcrumb-item text-dark" href="{{ 'home' }}">Home</a>
                    <a class="breadcrumb-item text-dark" href="{{ 'shop' }}">shop</a>

                 
                    <span class="breadcrumb-item active"> Cart</span>
                </nav>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->


    <!-- Cart Start -->
    <div class="container-fluid">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-light table-borderless table-hover text-center mb-0">
                    <thead class="thead-dark">
                        <tr>
                            <th>Products</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                    </thead>
                    <tbody class="align-middle">
                        @foreach ($showcartData as $item)


                        <tr>
                            <td class="align-middle"><img src="img/product-1.jpg" alt="" style="width: 50px;">{{ $item->product->name }}</td>
                            <td class="align-middle">{{number_format($item->product->selling_price )}}</td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button wire:click="decreament({{ $item->id }})" class="btn btn-sm btn-primary btn-minus">
                                            <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="text" class="form-control form-control-sm bg-secondary border-0 text-center" value="{{ $item->quantity }}">
                                    <div class="input-group-btn">
                                        <button wire:click="increament({{ $item->id }})" class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>

                            </td>
                            <td class="align-middle">{{number_format($item->product->selling_price *$item->quantity )}}</td>
                            <td class="align-middle"><button wire:click="removecart({{ $item->id }})" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></button></td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                
                <h5 class="section-title position-relative text-uppercase mb-3"><span class="bg-secondary pr-3">Cart Summary</span></h5>
                <div class="bg-light p-30 mb-5">
                    <div class="border-bottom pb-2">
                        <div class="d-flex justify-content-between mb-3">
                            <h6>Subtotal</h6>
                            <h6>{{number_format($grandTotal)}}</h6>
                        </div>
                     
                    </div>
                    <div class="pt-2">
                        <div class="d-flex justify-content-between mt-2">
                            <h5>Total</h5>
                            <h5>Pkr {{number_format($grandTotal)}}</h5>
                        </div>
                        <a href="{{ route('checkout') }}" class="btn btn-block btn-primary font-weight-bold my-3 py-3">Proceed To Checkout</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->

</div>