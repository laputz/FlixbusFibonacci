<?php
declare(strict_types=1);

namespace Test\Model;

use PHPUnit\Framework\TestCase;
use Src\Model\Fibonacci;
use Src\Model\FibonacciImpl;

class FibonacciImplTest extends TestCase {

    private Fibonacci $fibonacci;

    protected function setUp(): void {
        $this->fibonacci = new FibonacciImpl();
        parent::setUp();
    }

    public function fibonacciCases(): array {
        return [
            [
                'input' => 0,
                'fibonacciNumber' => '0'
            ],
            [
                'input' => 1,
                'fibonacciNumber' => '1'
            ],
            [
                'input' => 2,
                'fibonacciNumber' => '1'
            ],
            [
                'input' => 3,
                'fibonacciNumber' => '2'
            ],
            [
                'input' => 4,
                'fibonacciNumber' => '3'
            ],
            [
                'input' => 5,
                'fibonacciNumber' => '5'
            ],
            [
                'input' => 6,
                'fibonacciNumber' => '8'
            ],
            [
                'input' => 20,
                'fibonacciNumber' => '6765'
            ],
            [
                'input' => 200,
                'fibonacciNumber' => '280571172992510140037611932413038677189525'
            ]
        ];
    }

    /**
     * @dataProvider fibonacciCases
     */
    public function testValidCases(int $input, string $fibonacciNumber) {
        $this->assertEquals($fibonacciNumber, $this->fibonacci->getNumber($input));
    }

    public function testNegative() {
        $this->expectException(\Exception::class);
        $this->fibonacci->getNumber(-1);
    }
}