<?php

namespace Tests\Unit;

use App\Repositories\Interfaces\RestaurantRepositoryInterface;
use Tests\TestCase;

/**
 * Class FindAdminAssetsTest
 * @package Tests\Unit
 */
class RestaurantListTest extends TestCase
{
    /*
    |--------------------------------------------------------------------------
    | (Note) Repository testing
    |--------------------------------------------------------------------------
    | Unit testing repositories in a project is not recommended.
    | When you're dealing with a repository, you're really dealing
    | with something that's meant to be tested against a real database connection.
    |
    | But here is a sample of repository testing
    */


    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        /** @var RestaurantRepositoryInterface $repo */
        $repo = resolve(RestaurantRepositoryInterface::class);

        $restaurants = $repo->findMany('', '', '');

        $this->assertCount(
            count(json_decode(file_get_contents(storage_path('data/restaurants.json')), true)), $restaurants
        );
    }
}
