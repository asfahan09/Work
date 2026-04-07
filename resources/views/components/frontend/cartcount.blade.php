<?php

use Livewire\Component;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public $count = 0;

    // ye event sunega
    protected $listeners = ['CartAddedupdated' => 'refreshCount'];

    public function refreshCount()
    {
        if (Auth::check()) {
            $this->count = Cart::where('user_id', Auth::id())->count();
        }
    }

    public function mount()
    {
        $this->refreshCount();
    }
};
?>

<div>
    {{-- People find pleasure in different ways. I find it in keeping my mind clear. - Marcus Aurelius --}}
     {{ $count }}
</div>