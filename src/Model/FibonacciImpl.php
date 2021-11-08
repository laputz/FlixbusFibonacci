<?php

namespace Src\Model;

class FibonacciImpl implements Fibonacci {
    public function getNumber(int $n): string {
        $previous = "0";
        $current = "1";

        if ($n < 0) {
            throw new \Exception("Fibonacci Number must be greater than 0");
        }

        switch ($n) {
            case 0: return $previous;
            case 1: return $current;
        }

        for ($i = 1; $i < $n; $i++) {
            $next = $this->stringAddition($previous, $current);
            $previous = $current;
            $current = $next;
        }

        return $current;
    }

    /**
     * Helper function to add two numbers, represented as strings.
     * Ex. Input "458" and "3484", return "3942".
     */
    private function stringAddition(string $intOne, string $intTwo): string {
        $larger = $intOne > $intTwo ? $intOne : $intTwo;
        $smaller = $intOne < $intTwo ? $intOne : $intTwo;

        $largerArrayDigits = array_reverse(str_split($larger));
        $smallerArrayDigits = array_reverse(str_split($smaller));

        $max_length = strlen($larger);
        $min_length = strlen($smaller);

        $addition = array();

        $carryover = 0;
        for ($i=0; $i<$min_length; $i++) {
            $next_digit = $largerArrayDigits[$i] + $smallerArrayDigits[$i] + $carryover;
            if ($next_digit >= 10) {
                $carryover = 1;
                $next_digit -= 10;
            } else {
                $carryover = 0;
            }
            $addition[] = $next_digit;
        }

        if ($min_length === $max_length && $carryover) {
            $addition[] = $carryover;
        } else {
            for ($i = $min_length; $i < $max_length; $i++) {
                $addition[] = $largerArrayDigits[$i] + $carryover;
                $carryover = 0;
            }
        }

        return join('', array_reverse($addition));
    }
}
