@extends('admin.layout.app')
@section('content')
<section class="pc-container">
    <div class="pc-content">

        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">

                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Create Color</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-lg-12">
                <div class="card">
                    <div id="sticky-action" class="sticky-action">
                        <div class="card-header">
                            <div class="row align-items-center">
                                <div class="col-sm-6">
                                </div>
                                <div class="col-sm-6 text-sm-end mt-3 mt-sm-0">
                                    <a href="{{ route('admin.color.list') }}" class="btn btn-success">List</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.color.process') }}" method="POST" >
                                    @csrf

                                    <div class="row">

                                        <!-- Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Color Name</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid
                                                @enderror" placeholder="Category Name">
                                                @error('name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Color Code</label>
                                                <input type="text" name="code" class="form-control @error('code') is-invalid
                                                @enderror" placeholder="Code">
                                                @error('code')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>



                                        <!-- Status -->
                                        <div class="col-md-6">
                                            <div class="form-group form-check mt-4">
                                                <input type="checkbox" name="status" value="1" class="form-check-input">
                                                <label class="form-check-label">Active</label>
                                            </div>
                                        </div>

                                    </div>

                                    <button type="submit" class="btn btn-primary mt-3">Submit</button>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
            <!-- [ form-element ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
@endsection