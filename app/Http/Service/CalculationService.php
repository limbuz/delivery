<?php

namespace App\Http\Service;

use App\Http\Service\delivery\utils\DeliveryFactory;

final class CalculationService
{
    private array $data;

    /**
     * @throws \Exception
     */
    public function __construct(array $data)
	{
        $this->data = $data;

		$validationService = new ValidationService($this->data);
        $validationService->validate();
    }

    /**
     * @throws \Exception
     */
    public function calculate()
	{
		$delivery = DeliveryFactory::create($this->data['deliveryType']);
		return $delivery->process($this->data);
	}
}
