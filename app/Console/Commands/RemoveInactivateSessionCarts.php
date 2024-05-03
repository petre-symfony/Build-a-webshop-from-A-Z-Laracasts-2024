<?php

namespace App\Console\Commands;

use App\Models\Cart;
use Illuminate\Console\Command;

class RemoveInactivateSessionCarts extends Command {
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'app:remove-inactivate-session-carts';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Remove inactive session based cart';

	/**
	 * Execute the console command.
	 */
	public function handle() {
		$carts = Cart::whereDoesntHave('user')->whereDate('created_at', '*', now()->subDay(1))->get();

		foreach ($carts as $cart) {
			$cart->items()->delete();
			$cart->delete();
		}
	}
}
