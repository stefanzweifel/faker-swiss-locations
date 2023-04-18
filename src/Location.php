<?php

namespace Wnx\FakerSwissCities;

use Wnx\SwissCantons\Canton;

readonly class Location
{
    public function __construct(
        public int $postcode,
        public string $city,
        public Canton $canton
    ) {
    }
}
