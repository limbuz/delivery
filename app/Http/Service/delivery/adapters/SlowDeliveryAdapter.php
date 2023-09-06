<?php

namespace App\Http\Service\delivery\adapters;

use App\Http\Service\delivery\utils\IDeliveryAdapter;

final class SlowDeliveryAdapter implements IDeliveryAdapter
{
	const BASE_PRICE = 150;

	public function getData(array $data)
	{
		return [
			'price' => round(self::BASE_PRICE * $data['coefficient'], 2),
			'date' => $data['date'],
			'error' => $data['error']
		];
	}
}
