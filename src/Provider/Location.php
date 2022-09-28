<?php

namespace Wnx\FakerSwissCities\Provider;

use Faker\Provider\Base;
use Wnx\SwissCantons\Canton;
use Wnx\SwissCantons\CantonManager;
use Wnx\SwissCantons\ZipcodeSearch;

class Location extends Base
{
    public function location(): \Wnx\FakerSwissCities\Location
    {
        $zipcodeSearch = new ZipcodeSearch();
        $data = $zipcodeSearch->getDataSet();

        $randomLocation = static::randomElement($data);

        $cantonManager = new CantonManager();
        $canton = $cantonManager->getByAbbreviation($randomLocation['canton']);

        $location = new \Wnx\FakerSwissCities\Location(
            $randomLocation['zipcode'],
            $randomLocation['city'],
            $canton,
        );

        return $location;
    }

    public function postcode(): string
    {
        return $this->location()->postcode;
    }

    public function city(): string
    {
        return $this->location()->city;
    }

    public function canton(): Canton
    {
        return $this->location()->canton;
    }
}
