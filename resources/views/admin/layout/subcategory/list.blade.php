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
                                <th>Slug</th>
                                <th>Description</th>
                                <th>Status</th>
                                <th>Category</th>
                                <th>Edit</th>
                                <th>Delete</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($subcategoriesshow as $catItem )
                            <tr class="table-active">
                                <td>{{ $catItem->id}}</td>
                                <td>{{ $catItem->name }}</td>
                                <td>{{ $catItem->slug }}</td>
                                <td>{{ $catItem->description }}</td>
                                <td>{{ $catItem->status }}</td>
                                <td>{{ $catItem->category->name }}</td>
                                <td>
                                    <a href="{{ route('admin.subcategory.edit', $catItem->id) }}" class="btn btn-success">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="" class="btn btn-danger">
                                        Delete
                                    </a>
                                </td>


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