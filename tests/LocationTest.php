<?php

declare(strict_types=1);

use Faker\Factory;
use Wnx\FakerSwissLocations\Provider\Location;
use Wnx\SwissCantons\Canton;

beforeEach(function () {
    $faker = Factory::create();
    $faker->addProvider(new Location($faker));

    $this->faker = $faker;
});

it('returns location instance with a canton instance from the location method', function () {
    /** @var \Wnx\FakerSwissLocations\Location $location */
    $location = $this->faker->location();

    expect($location)
        ->toBeInstanceOf(\Wnx\FakerSwissLocations\Location::class)
        ->and($location->canton)
        ->toBeInstanceOf(Canton::class);
});

it('returns valid swiss postcode', function () {
    $zipcode = $this->faker->postcode();

    $this->assertMatchesRegularExpression('/^[0-9]{4}$/', $zipcode);

    expect($zipcode)
        ->toBeString()
        ->and(strlen($zipcode))
        ->toBe(4);
});

it('returns swiss city from city method', function () {
    $city = $this->faker->city();

    expect($city)
        ->toBeString()
        ->and(strlen($city))
        ->toBeGreaterThan(0);
});

it('return swiss canton from canton menthod', function () {
    $canton = $this->faker->canton();

    expect($canton)
        ->toBeInstanceOf(Canton::class);
});
