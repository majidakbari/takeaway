<?php

namespace Tests\Feature;

use Tests\TestCase;


/**
 * Class ListRestaurantsAPITest
 * @package Tests\Feature
 */
class ListRestaurantsAPITest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->withHeaders([
            'Content-Type' => 'Application/json',
        ])->json('get', route('restaurant.index'));

        $response->assertStatus(200);
    }
}
