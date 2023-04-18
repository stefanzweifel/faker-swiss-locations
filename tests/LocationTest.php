<?php

use Faker\Factory;
use Wnx\FakerSwissCities\Provider\Location;
use Wnx\SwissCantons\Canton;

beforeEach(function () {
    $faker = Factory::create();
    $faker->addProvider(new Location($faker));

    $this->faker = $faker;
});

it('returns location instance with a canton instance from the location method', function () {
    /** @var \Wnx\FakerSwissCities\Location $location */
    $location = $this->faker->location();

    expect($location)
        ->toBeInstanceOf(\Wnx\FakerSwissCities\Location::class)
        ->and($location->canton)
        ->toBeInstanceOf(Canton::class);
});

it('returns valid swiss postcode', function () {
    $zipcode = $this->faker->postcode();

    expect($zipcode)
        ->toBeString()
        ->and(strlen($zipcode))
        ->toBe(4);
});

it('returns valid swiss city', function () {
    $city = $this->faker->city();

    expect($city)
        ->toBeString()
        ->and(strlen($city))
        ->toBeGreaterThan(0);
});

it('return valid swiss canton', function () {
    $canton = $this->faker->canton();

    expect($canton)
        ->toBeInstanceOf(Canton::class);
});
