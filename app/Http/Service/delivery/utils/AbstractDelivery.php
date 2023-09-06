<?php

namespace App\Http\Service\delivery\utils;

use App\Http\Service\RequestService;

abstract class AbstractDelivery
{
	protected string $base_url;

	protected array $data;

	protected IDeliveryAdapter $adapter;
	protected RequestService $requestService;

	const REQUIRED_ARGUMENTS = [];

	public function __construct()
	{
		$this->requestService = new RequestService();
	}

	public function validate() 
	{
		foreach (static::REQUIRED_ARGUMENTS as $argument) {
			if (!isset($this->data[$argument]) || empty($this->data[$argument])) {
				throw new \Exception("Missing argument: $argument");
			}
		}
	}

	abstract function setContext();

    /**
     * @throws \Exception
     */
    public function process(array $data)
	{
		$this->data = $data;

		$this->validate();
		$this->setContext();

		$response = $this->requestService->get($this->base_url, $this->data);

		return $this->adapter->getData($response);
	}
}
