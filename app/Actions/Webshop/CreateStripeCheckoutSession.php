<?php

namespace App\Actions\Webshop;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Database\Eloquent\Collection;

class CreateStripeCheckoutSession {
	public function createFromCart(Cart $cart) {
		return $cart->user->checkout(
			$this->formatCartItems($cart->items)
		);
	}

	private function formatCartItems(Collection $items) {
		return $items->map(function (CartItem $item) {});
		//[
		//	[
		//		'price_data' => [
		//			'currency' => 'USD',
		//			'unit_amount' => 100,
		//			'product_data' => [
		//				'name' => 'My product',
		//				'metadata' => [
		//					'product_id' => 1,
		//					'product_variant_id' => 1
		//				]
		//			]
		//		],
		//		'quantity' => 2,
		//	]
		//]
	}
}