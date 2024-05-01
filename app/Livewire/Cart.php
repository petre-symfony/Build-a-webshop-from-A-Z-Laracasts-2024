<?php

namespace App\Livewire;

use App\Factories\CartFactory;
use Livewire\Component;

class Cart extends Component {
	protected $listeners = [
		'productDecrementedFromCart' => '$refresh',
		'productIncrementedFromCart' => '$refresh',
		'productRemovedFromCart' => '$refresh'
	];

	public function checkout() {
		return auth()->user()->checkout();
	}

	public function getCartProperty() {
		return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
	}

	public function getItemsProperty() {
		return $this->cart->items;
	}

	public function increment($itemId) {
		$this->cart->items()->find($itemId)?->increment('quantity');

		$this->dispatch('productIncrementedFromCart');
	}

	public function decrement($itemId) {
		$item = $this->cart->items()->find($itemId);

		if ($item->quantity > 1) {
			$item->decrement('quantity');

			$this->dispatch('productDecrementedFromCart');
		}
	}

	public function delete($itemId) {
		$this->cart->items()->where('id', $itemId)->delete();

		$this->dispatch('productRemovedFromCart');
	}

	public function render() {
		return view('livewire.cart');
	}
}
