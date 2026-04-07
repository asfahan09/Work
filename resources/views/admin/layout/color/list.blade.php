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
                                <th>Code</th>
                                <th>Status</th>
                                <th>Edit</th>
                                <th>Delete</th>


                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($ColorShow as $color )
                            <tr class="table-active">
                                <td>{{ $color->id}}</td>
                                <td>{{ $color->name }}</td>
                                <td>{{ $color->code }}</td>
                                <td>{{ $color->status }}</td>
                                <td>
                                    <a href="{{ route('admin.color.edit', $color->id) }}" class="btn btn-success">
                                        Edit
                                    </a>
                                </td>
                                <td>
                                    <a href="{{ route('admin.color.delete', $color->id) }}" class="btn btn-danger">
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