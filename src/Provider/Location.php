<?php

declare(strict_types=1);

namespace Wnx\FakerSwissLocations\Provider;

use Faker\Provider\Base;
use JsonException;
use Wnx\SwissCantons\Canton;
use Wnx\SwissCantons\CantonManager;
use Wnx\SwissCantons\CitySearch;
use Wnx\SwissCantons\Exceptions\CantonNotFoundException;

class Location extends Base
{
    /**
     * @throws JsonException
     * @throws CantonNotFoundException
     */
    public function location(): \Wnx\FakerSwissLocations\Location
    {
        $citySearch = new CitySearch();
        $cityDataSet = $citySearch->getDataSet();

        $cityDataSet = array_filter($cityDataSet, function ($zipcode) {
            return ! in_array($zipcode['canton'], ['DE', 'IT']);
        });

        $randomLocation = static::randomElement($cityDataSet);

        $cantonManager = new CantonManager();
        $canton = $cantonManager->getByAbbreviation($randomLocation['canton']);

        return new \Wnx\FakerSwissLocations\Location(
            (string) $randomLocation['zipcode'],
            $randomLocation['city'],
            $canton,
        );
    }

    /**
     * @throws JsonException
     */
    public function postcode(): string
    {
        return (string) $this->location()->postcode;
    }

    /**
     * @throws JsonException
     */
    public function city(): string
    {
        return $this->location()->city;
    }

    /**
     * @throws JsonException
     */
    public function canton(): Canton
    {
        return $this->location()->canton;
    }
}
