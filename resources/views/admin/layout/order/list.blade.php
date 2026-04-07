@extends('admin.layout.app')

@section('content')

<div class="container">
    <h2>User Orders</h2>

<form action="{{ route('admin.order.update', $order->id) }}" method="POST">
    <div class="row">

        <div class="col-md-3">
            <label>Filter by Date</label>
            <input type="date" name="date" value="{{ Request::get('date') ?? date('Y-m-d') }}" class="form-control">
        </div>

        <div class="col-md-3">
            <label>Filter by Status</label>
            <select name="status" class="form-select">
                <option value="">Select Status</option>
                <option value="in progress"{{ Request::get('status') == 'in progress' }}>In Progress</option>
                <option value="completed"{{ Request::get('status') == 'complete' }}>Completed</option>
                <option value="pending"{{ Request::get('status') ==  'pending'}}>Pending</option>
                <option value="cancelled"{{ Request::get('status') ==  'cencelled'}}>Cancelled</option>
                <option value="out-for-delivery"{{ Request::get('status') ==  'out for delivery'}}>Out for delivery</option>
            </select>
        </div>

        <div class="col-md-6">
            <br>
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>

    </div>
</form>
    <table border="1" width="100%" cellpadding="10">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Tracking No</th>
                <th>Username</th>
                <th>Payment Mode</th>
                <th>Order Date</th>
                <th>Status Msg</th>
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
                <td>{{ $order->created_at }}</td>
                <td>{{ $order->status_message }}</td>
                <td>
                    <a href="{{ url('admin/order/'.$order->id) }}">View</a>
                </td>
            </tr>

        @endforeach

        </tbody>
    </table>

    <br>

    {{ $orders->links() }}

</div>

@endsection