<?php

declare(strict_types=1);

namespace App\Domain\FizzBuzz;

use JsonSerializable;
use App\Domain\DomainException\DomainRecordNotFoundException;

class FizzBuzz implements JsonSerializable
{
    private string $value;

    public function value(): string
    {
        return $this->value;
    }

    public function __construct(int $value)
    {
        $this->value = $this->fizzBuzz($value);
    }

    private function fizzBuzz(int $value): string
    {
        if ($value % 15 === 0) {
            return 'FizzBuzz';
        } elseif ($value % 3 === 0) {
            return 'Fizz';
        } elseif ($value % 5 === 0) {
            return 'Buzz';
        } else {
            return strval($value);
        }
    }

    #[\ReturnTypeWillChange]
    public function jsonSerialize(): array
    {
        return [
            'value' => $this->value,
        ];
    }
}
