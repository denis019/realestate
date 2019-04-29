<?php

namespace App\Containers\Ad\Actions;

use App\Containers\Ad\Dto\AdDto;
use App\Containers\Ad\Models\Ad;
use App\Containers\Ad\Tasks\UpdateOrCreateAdTask;
use App\Ship\Parents\Actions\Action;
use Tightenco\Collect\Support\Collection;

class UpdateOrCreateAdFromRawDataAction extends Action
{
    public function run(Collection $rawAd): Ad
    {
        $adDto = new AdDto($rawAd);

        return $this->call(UpdateOrCreateAdTask::class, [$adDto]);
    }
}
