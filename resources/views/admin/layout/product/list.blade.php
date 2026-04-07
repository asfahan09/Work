@extends('admin.layout.app')
@section('content')
<section class="pc-container">
    <div class="col-md-12">
        <div class="card">
            @if(session('success'))
            <script>
                document.addEventListener("DOMContentLoaded", function() {
                    Swal.fire({
                        toast: true,
                        position: 'top-end',
                        icon: 'success',
                        title: "{{ session('success') }}",
                        showConfirmButton: false,
                        timer: 5000
                    });
                });
            </script>
            @endif
            <div class="card-body table-border-style">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>SubCategory</th>
                                <th>Status</th>
                                <th>Brand</th>
                                <th>Quantity</th>
                                <th>Trending</th>
                                <th>Image</th>
                                <th>Edit</th>
                                <th>Delete</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->category->name }}</td>
                                <td>{{ $product->subcategory->name }}</td>
                                <td>{{ $product->status == true ? 'Active' :'Inactive' }}</td>
                                <td>{{ $product->brand }}</td>
                                <td>{{ $product->quantity }}</td>

                                <td>{{ $product->trending == true ? 'Yes' :'No' }}</td>
                                <td>
                                    <img src="{{ asset($product->ProductImage[0]->image) }}" width="50">
                                </td>
                                <td><a class="btn btn-success" href="{{ route('admin.product.edit',$product->id) }}">Edit</a></td>
                                <td><a class="btn btn-danger" href="{{ route('admin.product.delete',$product->id) }}">Delete</a></td>



                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection