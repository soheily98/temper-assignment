<?php

namespace App\Charts\Formatters;

use App\Charts\Formatters\Contracts\ChartFormatter;
use App\Models\Record;
use App\Repositories\Contracts\RecordRepository;
use Carbon\Carbon;
use Illuminate\Support\Collection;

/**
 * Class WeeklyRetentionFormatter
 *
 * @package App\Charts\Formatters
 */
class WeeklyRetentionFormatter implements ChartFormatter
{
    public function format(RecordRepository $repository): ChartFormat
    {
        /** @var Collection $records */
        $records = $repository->all();

        $xAxis = $this->getXAxisLabels($records);
        $xAxisCount = count($xAxis);

        $series = $records->groupBy(static function (Record $record) {
            return $record->created_at->format("Y,W");
        })->mapWithKeys(static function ($value, $key) {
            $keyExploded = explode(",", $key);

            $date = Carbon::now();
            $date->setISODate($keyExploded[0], $keyExploded[1]);

            return [$date->startOfWeek()->format("Y-m-d") => $value];
        })->map(static function (Collection $collection) use ($xAxis, $xAxisCount) {
            $stepsBefore = 0;

            $weekData = $collection->groupBy('onboarding_percentage')->map(static function (Collection $collection) {
                return $collection->count();
            })
                ->sortKeysDesc();

            $totalCount = $weekData->sum();

            $weekData = $weekData->map(static function ($item) use (&$stepsBefore, $totalCount) {
                $stepsBefore += $item;
                return (int) round(($stepsBefore / $totalCount) * 100);
            })->sortKeys();

            $lastStep = 0;
            for ($i = $xAxisCount - 1; $i >= 0; $i -= 1) {
                if (isset($weekData[$xAxis[$i]])) {
                    $lastStep = $weekData[$xAxis[$i]];
                } else {
                    $weekData[$xAxis[$i]] = $lastStep;
                }
            }
            return $weekData->sortKeys();
        })->sortKeys()
            ->map(static function (Collection $value, $key) {
                return [
                    'name' => $key,
                    'data' => $value->values(),
                ];
            })->values();

        return (new ChartFormat())
            ->setChart(['type' => 'spline'])
            ->setTitle(['text' => 'Weekly retention'])
            ->setXAxis([
                'categories' => $xAxis,
                'title' => [
                    'text' => 'Onboarding Step Percentage',
                ],
            ])
            ->setYAxis([
                'max' => $records->max('onboarding_percentage'),
                'title' => [
                    'text' => 'Users Passed/Stuck Percentage',
                ],
            ])
            ->setSeries($series);
    }

    /**
     * @param Collection $records
     *
     * @return array
     */
    private function getXAxisLabels(Collection $records): array
    {
        return $records->pluck('onboarding_percentage')->unique()->sort()->values()->toArray();
    }
}
