<?php

namespace App\Containers\Ad\UI\API\Controllers;

use App\Containers\Ad\Actions\ListAdsAction;
use App\Containers\Ad\UI\API\Transformers\AdTransformer;
use App\Ship\Parents\Controllers\ApiController;

class ListAdsController extends ApiController
{

    public function handle()
    {
        $ads = $this->call(ListAdsAction::class);

        return $this->transform($ads, AdTransformer::class);
    }
}
