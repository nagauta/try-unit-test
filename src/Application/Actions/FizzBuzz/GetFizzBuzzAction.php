<?php

declare(strict_types=1);

namespace App\Application\Actions\FizzBuzz;

use App\Domain\FizzBuzz\FizzBuzz;
use Psr\Http\Message\ResponseInterface as Response;

class GetFizzBuzzAction extends FizzBuzzAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $value = (int)$this->resolveArg('value');
        $this->logger->info("verfy value '{value}'.");
        $fizzBuzz = new FizzBuzz($value);
        return $this->respondWithData($fizzBuzz);
    }
}
