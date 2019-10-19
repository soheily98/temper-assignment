<?php

namespace App\Charts\Factory\Contracts;

use App\Charts\Chart;
use App\Charts\Formatters\Contracts\ChartFormatter;
use App\Repositories\Contracts\RecordRepository;

interface ChartFactory
{
    public function factory(RecordRepository $repository, ChartFormatter $formatter): Chart;
}
