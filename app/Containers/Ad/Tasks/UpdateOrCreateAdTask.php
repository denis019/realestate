<?php

namespace App\Containers\Ad\Tasks;

use App\Containers\Ad\Data\Repositories\AdRepository;
use App\Containers\Ad\Dto\AdDto;
use App\Containers\Ad\Models\Ad;
use App\Ship\Parents\Tasks\Task;

class UpdateOrCreateAdTask extends Task
{

    /**
     * @var AdRepository
     */
    protected $adRepository;

    public function __construct(AdRepository $adRepository)
    {
        $this->adRepository = $adRepository;
    }

    /**
     * @param AdDto $adDto
     * @return Ad
     * @throws \Prettus\Validator\Exceptions\ValidatorException
     */
    public function run(AdDto $adDto): Ad
    {
        return $this->adRepository->updateOrCreate($adDto->toArraySnakeCase());
    }
}
