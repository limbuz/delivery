<?php

namespace App\Http\Service;

final class ValidationService
{
	private array $data;
	const REQUIRED_ARGUMENTS = [
		'kladrFrom',
		'kladrTo',
		'weight',
		'deliveryType'
	];

	public function __construct(array $data)
	{
		$this->data = $data;
	}

    /**
     * @throws \Exception
     */
    public function validate()
	{
		foreach (self::REQUIRED_ARGUMENTS as $argument) {
			if (!isset($this->data[$argument])) {
				throw new \Exception("Missing argument: $argument");
			}
		}
	}
}
