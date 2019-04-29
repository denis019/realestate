<?php

namespace App\Containers\Ad\UI\API\Transformers;

use App\Containers\Ad\Models\Ad;
use App\Ship\Parents\Transformers\Transformer;

class AdTransformer extends Transformer
{
    /**
     * @param Ad $ad
     * @return array
     */
    public function transform(Ad $ad)
    {
        return [
            'type' => 'Ad',
            'id' => $ad->getHashedKey(),
            'attributes' => [
                'city' => $ad->city,
                'title' => $ad->title,
                'link' => $ad->link,
                'imageUrl' => $ad->image_url,
            ],
        ];
    }
}
