<?php

namespace App\Containers\Ad\UI\CLI\Commands;

use Apiato\Core\Traits\CallableTrait;
use App\Containers\Ad\Actions\UpdateOrCreateAdFromRawDataAction;
use App\Containers\Ad\Models\Ad;
use App\Ship\Parents\Commands\ConsoleCommand;
use Rodenastyle\StreamParser\StreamParser;
use Tightenco\Collect\Support\Collection;

/**
 * Class MigrateAdsCommand
 * @package App\Containers\Ad\UI\CLI\Commands
 */
class MigrateAdsCommand extends ConsoleCommand
{
    use CallableTrait;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = "ads:migrate";

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Ads Migration";

    public function handle()
    {
        $source = config('migration.ads_migration_url');

        StreamParser::xml($source)
            ->each(function (Collection $rawAd) {
                $this->importAd($rawAd);
            });
    }

    private function importAd(Collection $rawAd)
    {
        try {
            /** @var Ad $ad */
            $ad = $this->call(UpdateOrCreateAdFromRawDataAction::class, [$rawAd]);

            $this->info('Imported: ' . $ad->title);
        } catch (\Exception $ex) {
            $this->error($ex->getMessage() . ', Ad ID: ' . $rawAd->get('id'));
        }
    }
}
