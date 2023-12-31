<?php

namespace App\Http\Service\delivery;

use App\Http\Service\delivery\utils\AbstractDelivery;
use App\Http\Service\delivery\adapters\FastDeliveryAdapter;

final class FastDelivery extends AbstractDelivery
{
	const TYPE = 'fast';
	const REQUIRED_ARGUMENTS = [
		'kladrFrom',
		'kladrTo',
		'weight',
		'deliveryType',
	];

	public function setContext(): void
    {
		$this->base_url = 'foo';
		$this->adapter = new FastDeliveryAdapter();
	}
}
