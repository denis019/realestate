<?php

namespace App\Containers\Ad\Data\Repositories;

use App\Ship\Parents\Repositories\Repository;
use Prettus\Repository\Traits\CacheableRepository;

/**
 * Class AdRepository
 * @package App\Containers\Ad\Data\Repositories
 */
class AdRepository extends Repository
{

    use CacheableRepository;

    protected $fieldSearchable = [
        'city' => 'like',
        'title' => 'like',
    ];
}
