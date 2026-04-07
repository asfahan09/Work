@extends('admin.layout.app')

@section('content')

<div class="pc-container mt-4">

    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif

    <!-- Header -->
    <div class="card shadow-sm mb-4">
        <div class="card-body d-flex justify-content-between align-items-center">
            <h4 class="mb-0"> Order Details</h4>
            <a href="{{ route('admin.order.index') }}" class="btn btn-outline-danger btn-sm">Back</a>
        </div>
    </div>

    <!-- Order + User Info -->
    <div class="row">

        <!-- Order Info -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="mb-3">Order Info</h5>

                    <p><strong>ID:</strong> {{ $order->id }}</p>
                    <p><strong>Tracking:</strong> {{ $order->trackin_no }}</p>
                    <p><strong>Date:</strong> {{ $order->created_at }}</p>
                    <p><strong>Payment:</strong> {{ $order->payment_mode }}</p>

                    <p>
                        <strong>Status:</strong>
                        <span class="badge bg-primary text-uppercase">
                            {{ $order->status_message }}
                        </span>
                    </p>
                </div>
            </div>
        </div>

        <!-- User Info -->
        <div class="col-md-6">
            <div class="card shadow-sm mb-3">
                <div class="card-body">
                    <h5 class="mb-3"> Customer Info</h5>

                    <p><strong>Name:</strong> {{ $order->fullname }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Phone:</strong> {{ $order->phone }}</p>
                    <p><strong>Address:</strong> {{ $order->address }}</p>
                    <p><strong>Pincode:</strong> {{ $order->pincode }}</p>
                </div>
            </div>
        </div>

    </div>

    <!-- Order Items -->
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <h5 class="mb-3"> Order Items</h5>

            <table class="table table-hover align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Qty</th>
                        <th>Total</th>
                    </tr>
                </thead>

                <tbody>
                    @php $totalPrice = 0; @endphp

                    @foreach($order->orderItems as $orderItem)

                        @php
                            $image = $orderItem->product->productImages->first() ?? null;
                        @endphp

                        <tr>
                            <td>{{ $orderItem->id }}</td>

                            <td>
                                <div style="width:50px;height:50px;">
                                    <img 
                                        src="{{ $image ? asset($image->image) : 'https://via.placeholder.com/50' }}"
                                        style="width:100%; height:100%; object-fit:cover; border-radius:6px;">
                                </div>
                            </td>

                            <td>
                                <strong>{{ $orderItem->product->name }}</strong>

                                @if ($orderItem->productColor)
                                    <br>
                                    <small class="text-muted">
                                        Color: {{ $orderItem->productColor->color->name }}
                                    </small>
                                @endif
                            </td>

                            <td>PKR {{ $orderItem->price }}</td>
                            <td>{{ $orderItem->quantity }}</td>
                            <td>PKR {{ $orderItem->price * $orderItem->quantity }}</td>
                        </tr>

                        @php
                            $totalPrice += $orderItem->quantity * $orderItem->price;
                        @endphp

                    @endforeach

                    <tr>
                        <td colspan="5" class="text-end"><strong>Total</strong></td>
                        <td><strong>PKR {{ $totalPrice }}</strong></td>
                    </tr>
                </tbody>
            </table>

        </div>
    </div>

    <!-- Status Update -->
    <div class="card shadow-sm mt-4">
        <div class="card-body">
            <h5 class="mb-3"> Update Order Status</h5>

            <form action="{{ url('admin/order/'.$order->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col-md-6">
                        <select name="status" class="form-select">
                            <option value="">Select Status</option>
                            <option value="in progress">In Progress</option>
                            <option value="completed">Completed</option>
                            <option value="pending">Pending</option>
                            <option value="cancelled">Cancelled</option>
                            <option value="out-for-delivery">Out for Delivery</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">
                            Update
                        </button>
                    </div>
                </div>
            </form>

            <div class="mt-3">
                <strong>Current Status:</strong>
                <span class="badge bg-success text-uppercase">
                    {{ $order->status_message }}
                </span>
            </div>

        </div>
    </div>

</div>

@endsection