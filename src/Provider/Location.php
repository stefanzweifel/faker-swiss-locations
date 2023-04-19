<?php

declare(strict_types=1);

namespace Wnx\FakerSwissLocations\Provider;

use Faker\Provider\Base;
use JsonException;
use Wnx\SwissCantons\Canton;
use Wnx\SwissCantons\CantonManager;
use Wnx\SwissCantons\Exceptions\CantonException;
use Wnx\SwissCantons\ZipcodeSearch;

class Location extends Base
{
    /**
     * @throws CantonException
     * @throws JsonException
     */
    public function location(): \Wnx\FakerSwissLocations\Location
    {
        $zipcodeSearch = new ZipcodeSearch();
        $zipcodeDataSet = $zipcodeSearch->getDataSet();

        $randomLocation = static::randomElement($zipcodeDataSet);

        $cantonManager = new CantonManager();
        $canton = $cantonManager->getByAbbreviation($randomLocation['canton']);

        return new \Wnx\FakerSwissLocations\Location(
            (string) $randomLocation['zipcode'],
            $randomLocation['city'],
            $canton,
        );
    }

    /**
     * @throws CantonException
     * @throws JsonException
     */
    public function postcode(): string
    {
        return (string) $this->location()->postcode;
    }

    /**
     * @throws CantonException
     * @throws JsonException
     */
    public function city(): string
    {
        return $this->location()->city;
    }

    /**
     * @throws CantonException
     * @throws JsonException
     */
    public function canton(): Canton
    {
        return $this->location()->canton;
    }
}
