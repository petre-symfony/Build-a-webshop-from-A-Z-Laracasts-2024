<?php

namespace App\Livewire;

use Livewire\Component;

class Product extends Component {
	public $productId;

	public function mount() {
		dd($this->productId);
	}

	public function render() {
		return view('livewire.product');
	}
}
