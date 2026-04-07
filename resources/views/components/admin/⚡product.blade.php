<?php

use Livewire\Component;
use App\Models\ProductImage;

new class extends Component {

    public $images = [];

    public function mount($product)
    {
        $this->images = $product->productImages;
    }

    public function deleteImage($id)
    {
        $image = ProductImage::find($id);

        if ($image) {
            if (file_exists(public_path($image->image))) {
                unlink(public_path($image->image));
            }

            $image->delete();
        }

        // refresh UI
        $this->images = collect($this->images)->where('id', '!=', $id);
    }
};
?>

<div class="row mt-2">
    @foreach($images as $img)
    <div class="col-md-3 mb-3">

        <div style="position: relative; display: inline-block;">

            <!-- Image -->
            <img
                src="{{ asset($img->image) }}"
                style="width: 100px; height: 100px; border:1px solid #ccc; border-radius:6px;">

            <!--  Delete Button -->
            <button
                wire:click="deleteImage({{ $img->id }})"
                onclick="confirm('Are you sure you want to delete this image?') || event.stopImmediatePropagation()"
                style="
                        position: absolute;
                        top: -8px;
                        right: -8px;
                        background: red;
                        color: white;
                        border: none;
                        border-radius: 50%;
                        width: 25px;
                        height: 25px;
                        cursor: pointer;
                    ">
                ❌
            </button>

        </div>

    </div>
    @endforeach
</div>