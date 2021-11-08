<?php
declare(strict_types=1);

namespace Src\View;

class FibonacciView {

    private ?string $fibonacciNumber;

    private ?string $errorMessage;

    public function __construct(
        ?string $fibonacciNumber,
        ?string $errorMessage = null
    ) {
        $this->fibonacciNumber = $fibonacciNumber;
        $this->errorMessage = $errorMessage;
    }

    public function toJson(): string {
        return json_encode(
            [
                'fibonacciNumber' => $this->fibonacciNumber,
                'errorMessage' => $this->errorMessage
            ]
        );
    }
}