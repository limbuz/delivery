<?php

namespace App\Http\Service;

final class RequestService
{
    /**
     * @throws \Exception
     */
    public function get(string $uri, array $data): array
    {
		//emulate
        return match ($uri) {
            'foo' => [
                'price' => mt_rand() / mt_getrandmax() * rand(50, 1500),
                'period' => rand(1, 6),
                'error' => ''
            ],
            'bar' => [
                'coefficient' => mt_rand() / mt_getrandmax() + rand(0, 1),
                'date' => date('Y-m-d', rand(1693943175, 1695833167)),
                'error' => ''
            ],
            default => throw new \Exception('Undefined uri'),
        };
	}
}
