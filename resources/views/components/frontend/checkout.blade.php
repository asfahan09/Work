<?php

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;

new class extends Component
{
    public $cartprice = [];
    public $totalPrice = 0;

    public $fullname, $email, $phone, $pincode, $address;
    public $payment_mode = null;
    public $transaction_id;

    public function mount()
    {
        $this->loadCart();
    }

    public function loadCart()
    {
        $this->cartprice = Cart::with('product')
            ->where('user_id', Auth::id())
            ->get();

        $this->calculateTotal();
    }

    public function calculateTotal()
    {
        $this->totalPrice = 0;

        foreach ($this->cartprice as $item) {
            if ($item->product) {
                $this->totalPrice += $item->product->selling_price * $item->quantity;
            }
        }
    }

    public function placeOrder()
    {
        $this->validate([
            'fullname' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'pincode' => 'required',
            'address' => 'required',
            'payment_mode' => 'required',
            'transaction_id' => $this->payment_mode == 'Easypaisa' ? 'required' : 'nullable'
        ]);

        $order = Order::create([
            'user_id' => Auth::id(),
            'trackin_no' => 'ORD-' . Str::random(10),
            'fullname' => $this->fullname,
            'email' => $this->email,
            'phone' => $this->phone,
            'pincode' => $this->pincode,
            'address' => $this->address,
            'status_message' => 'in progress',
            'payment_mode' => $this->payment_mode,

            // 🔥 IMPORTANT (existing column use)
            'payment_id' => $this->transaction_id,
        ]);

        foreach ($this->cartprice as $item) {

            if (!$item->product) continue;

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item->product_id,
                'product_color_id' => $item->product_color_id,
                'quantity' => $item->quantity,
                'price' => $item->product->selling_price
            ]);
        }

        Cart::where('user_id', Auth::id())->delete();
        $this->loadCart();

        $this->dispatch('message', text: 'Order successfully placed', type: 'success');
    }
};
?>
<div>
    <div>
        <div class="container py-5">

            @if($totalPrice > 0)

            <div class="row">

                <!-- LEFT SIDE -->
                <div class="col-md-8">

                    <div class="card shadow mb-4">
                        <div class="card-header bg-primary text-white">
                            <h5>Billing Details</h5>
                        </div>

                        <div class="card-body row">

                            <div class="col-md-6 mb-3">
                                <label>Full Name</label>
                                <input type="text" wire:model="fullname" class="form-control">
                                @error('fullname') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Phone</label>
                                <input type="text" wire:model="phone" class="form-control">
                                @error('phone') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Email</label>
                                <input type="email" wire:model="email" class="form-control">
                                @error('email') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-6 mb-3">
                                <label>Pincode</label>
                                <input type="text" wire:model="pincode" class="form-control">
                                @error('pincode') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Address</label>
                                <textarea wire:model="address" class="form-control"></textarea>
                                @error('address') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>

                        </div>
                    </div>

                </div>

                <!-- RIGHT SIDE -->
                <div class="col-md-4">

                    <!-- Order Summary -->
                    <div class="card shadow mb-4">
                        <div class="card-header bg-dark text-white">
                            <h5>Order Summary</h5>
                        </div>

                        <div class="card-body">

                            @foreach($cartprice as $item)
                            @if($item->product)
                            <div class="d-flex justify-content-between mb-2">
                                <span>{{ $item->product->name }} (x{{ $item->quantity }})</span>
                                <span>PKR {{ number_format($item->product->selling_price * $item->quantity) }}</span>
                            </div>
                            @endif
                            @endforeach

                            <hr>

                            <div class="d-flex justify-content-between">
                                <strong>Total</strong>
                                <strong>PKR {{ number_format($totalPrice) }}</strong>
                            </div>

                        </div>
                    </div>

                    <!-- Payment -->
                    <div class="card shadow">
                        <div class="card-header bg-success text-white">
                            <h5>Payment</h5>
                        </div>

                        <div class="card-body">

                            <!-- COD -->
                            <div class="form-check mb-2">
                                <input type="radio" wire:model="payment_mode" value="COD" class="form-check-input">
                                <label class="form-check-label">Cash on Delivery</label>
                            </div>

                            <!-- Easypaisa -->
                            <div class="form-check mb-3">
                                <input type="radio" wire:model="payment_mode" value="Easypaisa" class="form-check-input">
                                <label class="form-check-label">Easypaisa</label>
                            </div>

                            @error('payment_mode')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            <!-- Easypaisa Instructions -->
                            @if($payment_mode == 'Easypaisa')

                            <div class="alert alert-info">
                                <strong>Send Payment To:</strong><br>
                                Easypaisa: 03XXXXXXXXX <br>
                                Amount: PKR {{ number_format($totalPrice) }}
                            </div>

                            <div class="mb-2">
                                <input type="text"
                                    wire:model="transaction_id"
                                    placeholder="Enter Transaction ID"
                                    class="form-control">
                            </div>

                            @error('transaction_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror

                            @endif

                            <!-- Button -->
                            <button
                                wire:click="placeOrder"
                                wire:loading.attr="disabled"
                                wire:target="placeOrder"
                                class="btn btn-primary w-100 mt-3">

                                <span wire:loading.remove wire:target="placeOrder">
                                    Place Order
                                </span>

                                <span wire:loading wire:target="placeOrder">
                                    Processing...
                                </span>
                            </button>

                        </div>
                    </div>

                </div>

            </div>

            @else

            <div class="text-center">
                <h4>No items in cart</h4>
                <a href="{{ route('shop') }}" class="btn btn-warning mt-3">Go to Shop</a>
            </div>

            @endif

        </div>
    </div>
</div>