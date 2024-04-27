<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component {
	public function mount($productId) {
		dd($productId);
	}

	public function render() {
		return view('livewire.product');
	}
}
