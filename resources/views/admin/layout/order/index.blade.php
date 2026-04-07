@extends('admin.layout.app')

@section('content')

<div class="pc-container mt-4">

    <!-- Header -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <h4 class="mb-0"> User Orders</h4>
        </div>
    </div>

    <!-- Filter -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">

            <form action="{{ url('admin/order') }}" method="GET">
                <div class="row align-items-end">

                    <div class="col-md-3">
                        <label>Date</label>
                        <input type="date" name="date"
                               value="{{ Request::get('date') ?? date('Y-m-d') }}"
                               class="form-control">
                    </div>

                    <div class="col-md-3">
                        <label>Status</label>
                        <select name="status" class="form-select">
                            <option value="">All</option>
                            <option value="in progress" {{ Request::get('status') == 'in progress' ? 'selected' : '' }}>In Progress</option>
                            <option value="completed" {{ Request::get('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="pending" {{ Request::get('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="cancelled" {{ Request::get('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            <option value="out-for-delivery" {{ Request::get('status') == 'out-for-delivery' ? 'selected' : '' }}>Out for Delivery</option>
                        </select>
                    </div>

                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary w-100">
                             Filter
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    <!-- Orders Table -->
    <div class="card shadow-sm">
        <div class="card-body">

            <div class="table-responsive">
                <table class="table table-hover align-middle">

                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Tracking</th>
                            <th>Customer</th>
                            <th>Payment</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach($orders as $order)

                            <tr>
                                <td>{{ $order->id }}</td>
                                <td>{{ $order->trackin_no }}</td>
                                <td>{{ $order->fullname }}</td>
                                <td>{{ $order->payment_mode }}</td>
                                <td>{{ $order->created_at->format('d M Y') }}</td>

                                <!-- Status Badge -->
                                <td>
                                    @if($order->status_message == 'completed')
                                        <span class="badge bg-success">Completed</span>
                                    @elseif($order->status_message == 'pending')
                                        <span class="badge bg-warning text-dark">Pending</span>
                                    @elseif($order->status_message == 'cancelled')
                                        <span class="badge bg-danger">Cancelled</span>
                                    @elseif($order->status_message == 'out-for-delivery')
                                        <span class="badge bg-info text-dark">Out for Delivery</span>
                                    @else
                                        <span class="badge bg-primary">In Progress</span>
                                    @endif
                                </td>

                                <td>
                                    <a href="{{ url('admin/order/'.$order->id) }}" 
                                       class="btn btn-sm btn-outline-primary">
                                        View
                                    </a>
                                </td>
                            </tr>

                        @endforeach

                    </tbody>

                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-3">
                {{ $orders->links() }}
            </div>

        </div>
    </div>

</div>

@endsection