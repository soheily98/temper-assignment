<?php

namespace App\Http\Controllers;

use App\Charts\Factory\Contracts\ChartFactory;
use App\Charts\Formatters\WeeklyRetentionFormatter;
use App\Repositories\Contracts\RecordRepository;

class ChartsController extends Controller
{
    function getWeeklyRetention(RecordRepository $repository, ChartFactory $chartFactory)
    {
        $chart = $chartFactory->factory(
            $repository,
            new WeeklyRetentionFormatter()
        );

        return $this->success([
            'options' => $chart,
        ]);
    }
}
