<?php

namespace App\Containers\Ad\Actions;

use App\Containers\Ad\Tasks\ListAdsTask;
use App\Ship\Parents\Actions\Action;

/**
 * Class ListAdsAction
 * @package App\Containers\Ad\Actions
 */
class ListAdsAction extends Action
{
    /**
     * @return mixed
     */
    public function run()
    {
        return $this->call(ListAdsTask::class);
    }
}
