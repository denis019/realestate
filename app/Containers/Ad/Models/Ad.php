<?php

namespace App\Containers\Ad\Models;

use App\Ship\Parents\Models\Model;

/**
 * App\Containers\Ad\Models\Ad
 *
 * @property int $id
 * @property string $title
 * @property string $link
 * @property string $city
 * @property string|null $image_url
 * @property \Carbon\Carbon|null $created_at
 * @property \Carbon\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Ad\Models\Ad whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Ad\Models\Ad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Ad\Models\Ad whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Ad\Models\Ad whereImageUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Ad\Models\Ad whereLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Ad\Models\Ad whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Containers\Ad\Models\Ad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Ad extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'title',
        'link',
        'city',
        'image_url',
    ];
}
