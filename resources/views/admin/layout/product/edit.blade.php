@extends('admin.layout.app')
@section('content')
<section class="pc-container">
    <div class="pc-content">

        <h2>Edit Products</h2>

        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="row">

                <!-- Name -->
                <div class="col-md-6">
                    <label>Product Name</label>
                    <input type="text" name="name"
                        value="{{ $product->name }}"
                        class="form-control">
                </div>

                <!-- Category -->
                <div class="col-md-6">
                    <label>Select Category</label>
                    <select name="category_id" class="form-control">
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"
                            {{ $product->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6">
                    <label>Select Sub Category</label>
                    <select name="subcategory_id" class="form-control">

                        @foreach($subcategories as $subcategory)
                        <option value="{{ $subcategory->id }}"
                            {{ $product->subcategory_id == $subcategory->id ? 'selected' : '' }}>
                            {{ $subcategory->name }}
                        </option>
                        @endforeach

                    </select>
                </div>

                <!-- Brand -->
                <div class="col-md-6">
                    <label>Select Brand</label>
                    <select name="brand" class="form-control">
                        @foreach($brands as $brand)
                        <option value="{{ $brand->id }}"
                            {{ $product->brand == $brand->id ? 'selected' : '' }}>
                            {{ $brand->name }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- slug -->
                <div class="col-md-6">
                    <label>Slug</label>
                    <input type="text" name="slug"
                        value="{{ $product->slug }}"
                        class="form-control">
                </div>

                <!-- smal_description -->
                <div class="col-md-6">
                    <label>Small Description</label>
                    <input type="text" name="small_description"
                        value="{{ $product->small_description }}"
                        class="form-control">
                </div>

                <!-- description -->
                <div class="col-md-6">
                    <label>Description</label>
                    <input type="text" name="description"
                        value="{{ $product->description }}"
                        class="form-control">
                </div>


                <!-- Prices -->
                <div class="col-md-6">
                    <label>Selling Price</label>
                    <input type="number" name="selling_price"
                        value="{{ $product->selling_price }}"
                        class="form-control">
                </div>
                <div class="col-md-6">
                    <label>Original Price</label>
                    <input type="number" name="original_price"
                        value="{{ $product->original_price }}"
                        class="form-control">
                </div>

                <div class="col-md-6">
                    <label>Quantity</label>
                    <input type="number" name="quantity"
                        value="{{ $product->quantity }}"
                        class="form-control">
                </div>

                <!-- Status -->
                <div class="col-md-6 mt-3">
                    <input type="checkbox" name="status" value="1"
                        {{ $product->status ? 'checked' : '' }}>
                    Active
                </div>

                <!-- Trending -->
                <div class="col-md-6 mt-3">
                    <input type="checkbox" name="trending" value="1"
                        {{ $product->trending ? 'checked' : '' }}>
                    Trending
                </div>
                <!-- Image -->
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-label">products Images</label>

                        <input type="file" multiple name="image[]" class="form-control w-100">

                        <!-- ✅ LIVEWIRE COMPONENT YAHAN -->
                        @livewire('admin.product', ['product' => $product])

                    </div>
                </div>
                <!-- COLORS -->
                <div class="col-md-12 mt-4">
                    <h5>Colors</h5>

                    @foreach($colors as $color)
                    <div class="border p-2 mb-2">

                        <input type="checkbox"
                            name="colors[]"
                            value="{{ $color->id }}"
                            {{ isset($product_colors[$color->id]) ? 'checked' : '' }}>

                        {{ $color->name }}

                        <input type="number"
                            name="quantityy[{{ $color->id }}]"
                            class="form-control mt-1"
                            placeholder="Quantity"
                            value="{{ $product_colors[$color->id]->quantity ?? '' }}">
                    </div>
                    @endforeach
                </div>

            </div>

            <button type="submit" class="btn btn-primary mt-3">Update</button>

        </form>

    </div>
</section>
@endsection