<?php

namespace App\Containers\Ad\Tests\UI\CLI\Commands;

use App\Ship\Parents\Tests\PhpUnit\TestCase;

/**
 * Class MigrateAdsCommandTest
 * @covers \App\Containers\Ad\UI\CLI\Commands\MigrateAdsCommand
 * @package App\Containers\Ad\Tests\UI\CLI\Commands
 */
class MigrateAdsCommandTest extends TestCase
{

    public function testMigrateOnlyValidAds()
    {
        $this->artisan('ads:migrate');

        $this->assertDatabaseHas('ads', [
            'id' => 312500,
            'title' => 'Tidy room to rent in 5-bedroom flat in Clapton',
            'link' => 'https://www.spotahome.com/london/for-rent:rooms/312500',
            'city' => 'London',
            'image_url' => 'https://d1052pu3rm1xk9.cloudfront.net/fsosw_960_540_verified_ur_6_50/267b85cd3dc9a33538f5571246ee931887f42cef48298867e1baf767.jpg',
        ]);

        $this->assertDatabaseHas('ads', [
            'id' => 312501,
            'title' => 'Bright room to rent in 5-bedroom flat in Clapton',
            'link' => 'https://www.spotahome.com/london/for-rent:rooms/312501',
            'city' => 'London',
            'image_url' => 'https://d1052pu3rm1xk9.cloudfront.net/fsosw_960_540_verified_ur_6_50/b965e2008829b0138707e3f66bbb71c07b2d14ffdce47a9e1ea806db.jpg',
        ]);

        $this->assertDatabaseMissing('ads', [
            'title' => 'Invalid ad',
        ]);
    }
}
