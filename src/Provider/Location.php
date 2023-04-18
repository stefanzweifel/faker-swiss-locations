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
        $zipcodeDataSet = $zipcodeSearch->getDataSet();

        $randomLocation = static::randomElement($zipcodeDataSet);

        $cantonManager = new CantonManager();
        $canton = $cantonManager->getByAbbreviation($randomLocation['canton']);

        return new \Wnx\FakerSwissCities\Location(
            $randomLocation['zipcode'],
            $randomLocation['city'],
            $canton,
        );
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
