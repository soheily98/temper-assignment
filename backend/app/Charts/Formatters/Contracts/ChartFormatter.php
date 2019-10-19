<?php

namespace App\Charts\Formatters\Contracts;

use App\Charts\Formatters\ChartFormat;
use App\Repositories\Contracts\RecordRepository;

/**
 * Interface ChartFormatter
 * @package App\Charts\Formatters
 */
interface ChartFormatter
{
    /**
     * @param RecordRepository $repository
     * @return ChartFormat
     */
    public function format(RecordRepository $repository): ChartFormat;
}
