<?php

namespace App\Http\Controllers;

use App\Charts\Factory\Contracts\ChartFactory;
use App\Charts\Formatters\WeeklyRetentionFormatter;
use App\Repositories\Contracts\RecordRepository;
use App\Traits\ResponseHelper;

class ChartsController extends Controller
{
    use ResponseHelper;

    function getWeeklyRetention(RecordRepository $repository, ChartFactory $chartFactory)
    {
        $chart = $chartFactory->factory(
            $repository,
            new WeeklyRetentionFormatter()
        );

        return $this->success([
            'options' => $chart
        ]);
    }
}
