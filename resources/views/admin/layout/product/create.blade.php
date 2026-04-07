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
                            <h2 class="mb-0">Create Products </h2>
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
                                    <a href="{{ route('admin.product.list') }}" class="btn btn-success">List</a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="row">
                            <div class="col-md-12">
                                <form action="{{ route('admin.product.process') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="row">

                                        <!-- Name -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Product Name</label>
                                                <input type="text" name="name" class="form-control @error('name') is-invalid
                                                @enderror" placeholder="Product Name">
                                                @error('name')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Select Category</label>

                                                <select name="category_id" class="form-control @error('category_id') is-invalid @enderror">
                                                    <option value="">-- Select Category --</option>

                                                    @foreach($ParentCategory as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                                @error('category_id')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Select Sub Category</label>

                                                <select name="subcategory_id" class="form-control @error('subcategory_id') is-invalid @enderror">
                                                    <option value="">-- Select Sub Category --</option>

                                                    @foreach($ChildCategory as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->name }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                                @error('subcategory_id')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>
                                        <!-- brand -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Select Brand</label>

                                                <select name="brand" class="form-control @error('brand') is-invalid @enderror">
                                                    <option value="">-- Select Brand --</option>

                                                    @foreach($BrandsShow as $brandItems)
                                                    <option value="{{ $brandItems->id }}">
                                                        {{ $brandItems->name }}
                                                    </option>
                                                    @endforeach

                                                </select>
                                                @error('brand')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>

                                        </div>

                                        <!-- slug -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Slug</label>
                                                <input type="text" name="slug" class="form-control @error('slug') is-invalid
                                                @enderror" placeholder="slug">
                                                @error('slug')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- small Description -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Small Description</label>
                                                <textarea name="small_description" placeholder="Small description" class="form-control @error('small_description')
                                                is-invalid
                                                @enderror"></textarea>
                                                @error('small_description')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- !-- Description  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">Description</label>
                                                <textarea name="description" placeholder="description" class="form-control @error('description')
                                                is-invalid
                                                @enderror"></textarea>
                                                @error('description')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- original_price-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Original Price</label>
                                                <input type="number" name="original_price" class="form-control @error('original_price') is-invalid
                                                @enderror" placeholder="original price">
                                                @error('original_price')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- selling_price-->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Selling Price</label>
                                                <input type="number" name="selling_price" class="form-control @error('selling_price') is-invalid
                                                @enderror" placeholder="selling price">
                                                @error('selling_price')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <!-- quantity  -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Qunatity</label>
                                                <input type="number" name="quantity" class="form-control @error('quantity') is-invalid
                                                @enderror" placeholder="quantity">
                                                @error('quantity')
                                                <p class="invalid-feedback">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>

                                        <!-- Image -->
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="form-label">products Images</label>
                                                <input type="file" multiple name="image[]" class="form-control w-100">
                                            </div>
                                        </div>

                                        <!-- Status -->
                                        <div class="col-md-6">
                                            <div class="form-group form-check mt-4">
                                                <input type="checkbox" name="status" value="1" class="form-check-input">
                                                <label class="form-check-label">Active Status</label>
                                            </div>
                                        </div>

                                        <!-- Trending -->
                                        <div class="col-md-6">
                                            <div class="form-group form-check mt-4">
                                                <input type="checkbox" name="trending" value="1" class="form-check-input">
                                                <label class="form-check-label">Trending Product</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            @forelse($colors as $color)

                                            <div class="col-md-12">
                                                <div class="border p-2">
                                                    <input
                                                        type="checkbox"
                                                        name="colors[{{ $color->id }}]"
                                                        value="{{ $color->id }}">

                                                    <label class="form-check-label">
                                                        {{ $color->name }}
                                                    </label>
                                                    <br>
                                                    <input type="number" name="quantityy[{{ $color->id }}]" id="">
                                                </div>
                                            </div>

                                            @empty
                                            <div class="col-12">
                                                No colors found!
                                            </div>
                                            @endforelse
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