<?php

namespace App\Containers\Ad\Tasks;

use App\Containers\Ad\Data\Repositories\AdRepository;
use App\Ship\Parents\Tasks\Task;

/**
 * Class ListAdsTask
 * @package App\Containers\Ad\Tasks
 */
class ListAdsTask extends Task
{
    /**
     * @var  AdRepository
     */
    private $adRepository;

    /**
     * ListAdsTask constructor.
     * @param AdRepository $carBrandRepository
     */
    public function __construct(AdRepository $carBrandRepository)
    {
        $this->adRepository = $carBrandRepository;
    }

    /**
     * @return mixed
     */
    public function run()
    {
        return $this->adRepository->paginate();
    }
}
