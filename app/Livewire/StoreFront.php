<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;

class StoreFront extends Component {
	#[Computed]
	public function products() {
		return Product::query()->paginate(5);
	}

	public function render() {
		return view('livewire.store-front');
	}
}
