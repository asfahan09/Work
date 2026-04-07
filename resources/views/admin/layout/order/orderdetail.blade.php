@extends('admin.layout.app')

@section('content')

<div class="container mt-4">
    @if (session('message'))
    <div class="alert alert-success">{{ session('message') }}</div>
    
    @endif

    <div class="card shadow-sm mb-3">
        <div class="card-body d-flex justify-content-between align-items-center">

            <h5 class="mb-0">
                <i class="fa fa-shopping-cart me-2"></i> My Order Details
            </h5>

            <a href="{{ url()->previous() }}" class="btn btn-danger btn-sm">Back</a>

        </div>
    </div>


    <div class="row">

        <div class="col-md-6">

            <h5>Order Details</h5>
            <hr>

            <label>Order Id:</label>
            <div>{{ $order->id }}</div>

            <label>Tracking No:</label>
            <div>{{ $order->trackin_no }}</div>

            <label>Ordered Date:</label>
            <div>{{ $order->created_at }}</div>

            <label>Payment Mode:</label>
            <div>{{ $order->payment_mode }}</div>

            <label>Status Message:</label>
            <div class="border p-2">
                {{ $order->status_message }}
            </div>

        </div>


        <div class="col-md-6">

            <h5>User Details</h5>
            <hr>

            <label>Full Name:</label>
            <div>{{ $order->fullname }}</div>

            <label>Email:</label>
            <div>{{ $order->email }}</div>

            <label>Phone:</label>
            <div>{{ $order->phone }}</div>

            <label>Address:</label>
            <div>{{ $order->address }}</div>

            <label>Pin code:</label>
            <div>{{ $order->pincode }}</div>

        </div>

    </div>


    <div class="mt-4">
        <h5>Order Items</h5>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Item ID</th>
                    <th>Image</th>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
            </thead>

            <tbody>

                @php
                $totalPrice = 0;
                @endphp

                @foreach($order->orderItems as $orderItem)

                <tr>
                    <td>{{ $orderItem->id}}</td>

                    <td>
                        <img src="{{ asset($orderItem->products->productImages[0]->image) }}" style="width: 50px; height: 50px">
                    </td>

                    <td>
                        {{ $orderItem->products->name }}

                        @if ($orderItem->productColors)
                        <br> with color: {{ $orderItem->productColors->color->name }}
                        @endif
                    </td>

                    <td>{{ $orderItem->price }}</td>

                    <td>{{ $orderItem->quantity }}</td>

                    <td>{{ $orderItem->price * $orderItem->quantity }}</td>

                </tr>

                @php
                $totalPrice += $orderItem->quantity * $orderItem->price;
                @endphp

                @endforeach

                <tr>
                    <td colspan="5" class="text-end"><b>Total Price</b></td>
                    <td><b>PKR {{ $totalPrice }}</b></td>
                </tr>

            </tbody>

        </table>

    </div>

    <div class="card">
        <div class="card-body">

            <h4>Order Process (Order Status Updates)</h4>
            <hr>

            <div class="row">
                <div class="col-md-5">

                    <form action="{{ url('admin/order/'.$order->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <label>Update Your Order Status</label>

                        <div class="input-group">
                            <select name="status" class="form-select">

                                <option value="">Select Order Status</option>

                                <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>
                                    In Progress
                                </option>

                                <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>
                                    Completed
                                </option>

                                <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>
                                    Pending
                                </option>

                                <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>
                                    Cancelled
                                </option>

                                <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>
                                    Out for delivery
                                </option>

                            </select>

                            <button type="submit" class="btn btn-primary">
                                Update
                            </button>

                        </div>

                    </form>
                    <div class="col-md-7">
                        <br>
                        <h4 class='mt-4'>Currrent order status <span class="text-uppercase">{{ $order->status_message }}</span></h4>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

@endsection