<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Attributes\Computed;
use Livewire\Component;

class StoreFront extends Component {
	public $keywords;

	#[Computed]
	public function products() {
		return Product::query()
			->when($this->keywords, fn($query) => $query->where('name', 'like', "%{$this->keywords}%"))
			->paginate(5);
	}

	public function render() {
		return view('livewire.store-front');
	}
}
