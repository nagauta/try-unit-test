<?php

declare(strict_types=1);

namespace Tests\Domain\User;

use App\Domain\FizzBuzz\FizzBuzz;
use Tests\TestCase;

class FizzBuzzTest extends TestCase
{
    protected FizzBuzz $fizzBuzz;

    /**
     * @test
     */
    public function _3の倍数かつ5の倍数のときにはFizzBuzzを返すこと() {
        $this->fizzBuzz = new FizzBuzz(15);
        $this->assertSame('FizzBuzz', $this->fizzBuzz->value());
    }

    /**
     * @test
     */
    public function _3の倍数のときにはFizzを返すこと() {
        $this->fizzBuzz = new FizzBuzz(3);
        $this->assertSame('Fizz', $this->fizzBuzz->value());
    }

    /**
     * @test
     */
    public function _5の倍数のときにはFizzを返すこと() {
        $this->fizzBuzz = new FizzBuzz(5);
        $this->assertSame('Buzz', $this->fizzBuzz->value());
    }

     /**
     * @test
     */
    public function _3の倍数でも5の倍数でもないときには入力値を返すこと() {
        $this->fizzBuzz = new FizzBuzz(1);
        $this->assertSame('1', $this->fizzBuzz->value());
    }

    /**
     * @test
     */
    public function 数字ではないときには例外を返すこと() {
        $value = $this->getInvalidValueStr();
        $this->expectException(\TypeError::class);
        $this->fizzBuzz = new FizzBuzz($value);
    }

    /**
     * @test
     */
    public function 値がない場合に例外を返すこと() {
        $value = $this->getInvalidValueNull();
        $this->expectException(\TypeError::class);
        $this->fizzBuzz = new FizzBuzz($value);
    }

    public function getInvalidValueStr(): mixed
    {
        return "文字列";
    }

    public function getInvalidValueNull(): mixed
    {
        return null;
    }

}
