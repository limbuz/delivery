<?php

namespace App\Http\Service\delivery\utils;

interface IDeliveryAdapter
{
	public function getData(array $data);
}
