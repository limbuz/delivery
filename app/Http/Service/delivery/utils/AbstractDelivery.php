<?php

namespace App\Http\Service\delivery\utils;

use App\Http\Service\delivery\adapters\IDeliveryAdapter;
use App\Http\Service\RequestService;

abstract class AbstractDelivery
{
	protected string $base_url;

	protected array $data;

	protected IDeliveryAdapter $adapter;
	protected RequestService $requestService;

	public function __construct()
	{
		$this->requestService = new RequestService();
	}

	abstract function setContext();

    /**
     * @throws \Exception
     */
    public function process(array $data)
	{
		$this->data = $data;
		$this->setContext();

		$response = $this->requestService->get($this->base_url, $this->data);

		return $this->adapter->getData($response);
	}
}
