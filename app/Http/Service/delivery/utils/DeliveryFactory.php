<?php

namespace App\Http\Service\delivery\utils;

use App\Http\Service\delivery\FastDelivery;
use App\Http\Service\delivery\SlowDelivery;

final class DeliveryFactory
{
	public static function create($type): AbstractDelivery
	{
		return match ($type) {
			FastDelivery::TYPE => new FastDelivery(),
			SlowDelivery::TYPE => new SlowDelivery(),
			default => null
		};
	}
}
