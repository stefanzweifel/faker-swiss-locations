<?php

use Faker\Factory;
use Wnx\FakerSwissCities\Provider\Location;
use Wnx\SwissCantons\Canton;

it('returns location instance with a canton instance from the location method', function () {
    $faker = Factory::create();
    $faker->addProvider(new Location($faker));

    /** @var \Wnx\FakerSwissCities\Location $location */
    $location = $faker->location();

    expect($location)
        ->toBeInstanceOf(\Wnx\FakerSwissCities\Location::class)
        ->and($location->canton)
        ->toBeInstanceOf(Canton::class);
});
