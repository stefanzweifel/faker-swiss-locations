<?php

declare(strict_types=1);

namespace Wnx\FakerSwissLocations;

use Wnx\SwissCantons\Canton;

readonly class Location
{
    public function __construct(
        public string $postcode,
        public string $city,
        public Canton $canton
    ) {
    }
}
