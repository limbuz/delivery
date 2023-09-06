<?php

namespace App\Http\Service\delivery\adapters;

use App\Http\Service\delivery\utils\IDeliveryAdapter;

final class FastDeliveryAdapter implements IDeliveryAdapter
{
	public function getData(array $data)
	{
		return [
			'price' => round($data['price'], 2),
			'date' => $this->getDate($data['period']),
			'error' => $data['error']
		];
	}

	private function getDate(int $period)
	{
		return date('Y-m-d', strtotime("+$period days"));
	}
}
