<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Money\Money;

class OrderItem extends Model {
	use HasFactory;

	protected function price():Attribute {
		return Attribute::make(
			get: function (int $value) {
				return new Money($value, new \Money\Currency('USD'));
			}
		);
	}
}
