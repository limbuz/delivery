<?php

namespace App\Http\Service\delivery;

use App\Http\Service\delivery\utils\AbstractDelivery;
use App\Http\Service\delivery\adapters\SlowDeliveryAdapter;

final class SlowDelivery extends AbstractDelivery
{
	const TYPE = 'slow';
	const REQUIRED_ARGUMENTS = [
		'kladrFrom',
		'kladrTo',
		'weight',
		'deliveryType',
	];

	public function setContext(): void
    {
		$this->base_url = 'bar';
		$this->adapter = new SlowDeliveryAdapter();
	}
}
