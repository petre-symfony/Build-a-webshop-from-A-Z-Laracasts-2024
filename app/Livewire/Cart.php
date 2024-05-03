<?php

namespace App\Livewire;

use App\Actions\Webshop\CreateStripeCheckoutSession;
use App\Factories\CartFactory;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Cart extends Component {
	protected $listeners = [
		'productDecrementedFromCart' => '$refresh',
		'productIncrementedFromCart' => '$refresh',
		'productRemovedFromCart' => '$refresh'
	];

	public function checkout(CreateStripeCheckoutSession $checkoutSession) {
		return $checkoutSession->createFromCart($this->cart);
	}

	#[Computed]
	public function cart() {
		return CartFactory::make()->loadMissing(['items', 'items.product', 'items.variant']);
	}

	#[Computed]
	public function items() {
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
