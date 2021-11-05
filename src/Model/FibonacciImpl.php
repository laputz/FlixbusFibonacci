<?php

namespace Src\Model;

class FibonacciImpl implements Fibonacci {
    public function getNumber(int $n): int {
        $previous = 0;
        $current = 1;

        if ($n < 0) {
            throw new \Exception("Fibonacci Number must be greater than 0");
        } elseif ($n > 92) {
            throw new \Exception("Result larger than 32-bits");
        }

        switch ($n) {
            case 0: return $previous;
            case 1: return $current;
        }

        for ($i = 1; $i < $n; $i++) {
            $next = $previous + $current;
            $previous = $current;
            $current = $next;
        }

        return $current;
    }
}
