<?php

namespace App\Http\Service\delivery;

use App\Http\Service\delivery\utils\AbstractDelivery;
use App\Http\Service\delivery\adapters\SlowDeliveryAdapter;

final class SlowDelivery extends AbstractDelivery
{
	const TYPE = 'slow';

	public function setContext(): void
    {
		$this->base_url = 'bar';
		$this->adapter = new SlowDeliveryAdapter();
	}
}
