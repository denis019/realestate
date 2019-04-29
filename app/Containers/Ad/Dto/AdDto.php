<?php

namespace App\Containers\Ad\Dto;

use App\Containers\Ad\Exceptions\AdValidationException;
use Tightenco\Collect\Support\Collection;

/**
 * Class AdDto
 * @package App\Containers\Ad\Dto
 */
class AdDto
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $link;

    /**
     * @var string
     */
    private $city;

    /**
     * @var ?string
     */
    private $imageUrl;

    public function __construct(Collection $rawAd)
    {
        $this->id = $this->resolveId($rawAd);
        $this->title = $this->resolveTitle($rawAd);
        $this->link = $this->resolveLink($rawAd);
        $this->city = $this->resolveCity($rawAd);
        $this->imageUrl = $this->resolveImageUrl($rawAd);
    }

    /**
     * @param Collection $ad
     * @return int
     * @throws AdValidationException
     */
    private function resolveId(Collection $ad): int
    {
        if (!empty($ad->get('id')) && filter_var($ad->get('id'), FILTER_VALIDATE_INT)) {
            return $ad->get('id');
        }

        throw new AdValidationException('id is missing or invalid');
    }

    /**
     * @param Collection $ad
     * @return string
     * @throws AdValidationException
     */
    private function resolveTitle(Collection $ad): string
    {
        if (!empty($ad->get('title'))) {
            return $ad->get('title');
        }

        throw new AdValidationException('title is missing');
    }

    /**
     * @param Collection $ad
     * @return string
     * @throws AdValidationException
     */
    private function resolveLink(Collection $ad): string
    {
        if (!empty($ad->get('url'))) {
            return $ad->get('url');
        }

        throw new AdValidationException('url is missing');
    }

    /**
     * @param Collection $ad
     * @return string
     * @throws AdValidationException
     */
    private function resolveCity(Collection $ad): string
    {
        if (!empty($ad->get('city'))) {
            return $ad->get('city');
        }

        throw new AdValidationException('city is missing');
    }

    /**
     * @param Collection $ad
     * @return string|null
     * @throws AdValidationException
     */
    private function resolveImageUrl(Collection $ad): ?string
    {
        /** @var Collection $picture */
        foreach ($ad->get('pictures') as $picture) {
            if (!empty($picture->get('picture_url'))) {
                return $picture->get('picture_url');
            }
        }

        return null;
    }

    /**
     * @return array
     */
    public function toArraySnakeCase(): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'link' => $this->link,
            'city' => $this->city,
            'image_url' => $this->imageUrl,
        ];
    }
}
