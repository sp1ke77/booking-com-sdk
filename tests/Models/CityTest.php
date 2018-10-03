<?php
/**
 * Created by Andrew Ivchenkov <and.ivchenkov@gmail.com>
 * Date: 02.10.18
 */

namespace BookingCom\Tests\Models;


use BookingCom\Models\City;
use BookingCom\Models\Location;
use BookingCom\Models\Timezone;
use PHPUnit\Framework\TestCase;

class CityTest extends TestCase
{
    public function testFromArray(): void
    {
        $city = City::fromArray([
            'nr_hotels' => 1,
            'city_id' => -3875419,
            'name' => 'Pedro Gonzalez',
            'country' => 've',
        ]);

        $this->assertEquals(1, $city->getNumberOfHotels());
        $this->assertEquals(-3875419, $city->getId());
        $this->assertEquals('Pedro Gonzalez', $city->getName());
        $this->assertEquals('ve', $city->getCountry());
    }

    public function testLocation(): void
    {
        $city = City::fromArray([
            'nr_hotels' => 1,
            'city_id' => -3875419,
            'name' => 'Pedro Gonzalez',
            'country' => 've',
            'location' => [
                'latitude' => '11.116700172424316',
                'longitude' => '-63.91669845581055',
            ],
        ]);

        $this->assertInstanceOf(Location::class, $city->getLocation());
    }

    public function testTimezone(): void
    {
        $city = City::fromArray([
            'nr_hotels' => 1,
            'city_id' => -3875419,
            'name' => 'Pedro Gonzalez',
            'country' => 've',
            'timezone' => [
                'offset' => 2,
                'name' => 'Europe/Amsterdam',
            ],
        ]);

        $this->assertInstanceOf(Timezone::class, $city->getTimezone());
    }


}