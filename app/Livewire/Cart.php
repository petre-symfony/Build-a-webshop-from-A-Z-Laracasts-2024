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
		return auth()->user()->checkout([
			 [
					'price_data' => [
					'currency' => 'USD',
					'unit_amount' => 100,
					'product_data' => [
						'name' => 'My product',
						'metadata' => [
							'product_id' => 1,
							'product_variant_id' => 1
						]
					]
				],
				'quantity' => 2,
			 ]
		]);
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
