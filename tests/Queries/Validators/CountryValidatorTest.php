<?php

namespace BookingCom\Tests\Queries\Validators;

use BookingCom\Queries\Validators\CountryValidator;
use PHPUnit\Framework\TestCase;

class CountryValidatorTest extends TestCase
{
    /**
     * @return void
     */
    public function testValidator(): void
    {
        $validator = new CountryValidator();
        $validator->assertValues(['us', 'ru', 'ua']);

        $this->expectException(\InvalidArgumentException::class);
        $validator->assertValues(['us1', 'ru', 'ua']);
    }
}
