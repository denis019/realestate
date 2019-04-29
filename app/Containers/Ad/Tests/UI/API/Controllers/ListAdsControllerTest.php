<?php

namespace App\Containers\Ad\Tests\UI\API\Controllers;

use App\Ship\Parents\Tests\PhpUnit\TestCase;

/**
 * Class ListAdsControllerTest
 * @covers \App\Containers\Ad\UI\API\Controllers\ListAdsController
 * @package App\Containers\Ad\Tests\UI\API\Controllers
 */
class ListAdsControllerTest extends TestCase
{

    protected $endpoint = 'get@v1/ads';

    public function testListAds()
    {
        $this->artisan('ads:migrate');

        // send the HTTP request
        $response = $this->makeCall();

        // assert response status is correct
        $response->assertStatus(200);

        $response->assertJson(array(
            'data' =>
                [
                    [
                        'type' => 'Ad',
                        'id' => 'vmg6q36g08r4b8kz',
                        'attributes' =>
                            [
                                'city' => 'London',
                                'title' => 'Tidy room to rent in 5-bedroom flat in Clapton',
                                'link' => 'https://www.spotahome.com/london/for-rent:rooms/312500',
                                'imageUrl' => 'https://d1052pu3rm1xk9.cloudfront.net/fsosw_960_540_verified_ur_6_50/267b85cd3dc9a33538f5571246ee931887f42cef48298867e1baf767.jpg',
                            ],
                    ],
                    [
                        'type' => 'Ad',
                        'id' => 'nwmkv57ja9k5blag',
                        'attributes' =>
                            [
                                'city' => 'London',
                                'title' => 'Bright room to rent in 5-bedroom flat in Clapton',
                                'link' => 'https://www.spotahome.com/london/for-rent:rooms/312501',
                                'imageUrl' => 'https://d1052pu3rm1xk9.cloudfront.net/fsosw_960_540_verified_ur_6_50/b965e2008829b0138707e3f66bbb71c07b2d14ffdce47a9e1ea806db.jpg',
                            ],
                    ],
                ],
            'meta' =>
                [
                    'include' => [],
                    'custom' => [],
                    'pagination' =>
                        [
                            'total' => 2,
                            'count' => 2,
                            'per_page' => 50,
                            'current_page' => 1,
                            'total_pages' => 1,
                            'links' => [],
                        ],
                ],
        ));
    }

    public function getTestingUser($userDetails = null, $access = null)
    {
        return null;
    }
}
