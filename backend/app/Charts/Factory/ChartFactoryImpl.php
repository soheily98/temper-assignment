<?php

namespace App\Charts\Factory;

use App\Charts\Chart;
use App\Charts\Factory\Contracts\ChartFactory;
use App\Charts\Formatters\Contracts\ChartFormatter;
use App\Repositories\Contracts\RecordRepository;

/**
 * Class ChartFactoryImpl
 *
 * @package App\Charts\Factory
 */
class ChartFactoryImpl implements ChartFactory
{
    /**
     * @param RecordRepository $repository
     * @param ChartFormatter $formatter
     *
     * @return Chart
     */
    public function factory(RecordRepository $repository, ChartFormatter $formatter): Chart
    {
        $format = $formatter->format($repository);

        return new Chart([
                'chart' => $format->getChart(),
                'title' => $format->getTitle(),
                'xAxis' => $format->getXAxis(),
                'yAxis' => $format->getYAxis(),
                'series' => $format->getSeries(),
            ]
        );
    }
}
