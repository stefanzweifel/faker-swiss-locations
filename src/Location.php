<?php

namespace Wnx\FakerSwissCities;

use Wnx\SwissCantons\Canton;

class Location
{
    public function __construct(
        public readonly int $postcode,
        public readonly string $city,
        public readonly Canton $canton
    ) {
    }
}
