<?php

use App\Charts\Factory\ChartFactoryImpl;
use App\Charts\Formatters\ChartFormat;
use App\Charts\Formatters\Contracts\ChartFormatter;
use App\Charts\Formatters\WeeklyRetentionFormatter;
use App\Models\Record;
use App\Repositories\Contracts\RecordRepository;

class WeeklyRetentionTest extends TestCase
{
    /**
     * @test
     */
    public function testXAxis()
    {
        /** @var RecordRepository $repositoryMock */
        $repositoryMock = $this->getRepositoryMock();

        $formatter = new WeeklyRetentionFormatter();
        $format = $formatter->format($repositoryMock);

        $this->assertEquals([40, 50, 60], $format->getXAxis()['categories']);
    }

    /**
     * @test
     */
    public function testYAxis()
    {
        /** @var RecordRepository $repositoryMock */
        $repositoryMock = $this->getRepositoryMock();

        $formatter = new WeeklyRetentionFormatter();
        $format = $formatter->format($repositoryMock);

        $this->assertEquals(60, $format->getYAxis()['max']);
    }

    /**
     * @test
     */
    public function testSeries()
    {
        /** @var RecordRepository $repositoryMock */
        $repositoryMock = $this->getRepositoryMock();

        $formatter = new WeeklyRetentionFormatter();
        $format = $formatter->format($repositoryMock);

        $expectedSeries = [
            [
                "name" => "2012-01-30",
                "data" => [
                    100, 67, 33
                ]
            ]
        ];

        $actualSeries = $format->getSeries();

        $this->assertEquals($expectedSeries[0]['name'], $actualSeries[0]['name']);
        $this->assertEquals($expectedSeries[0]['data'], $actualSeries[0]['data']->toArray());
    }

    private function getRepositoryMock()
    {
        $mock = Mockery::mock(RecordRepository::class);
        $mock->shouldReceive('all')->andReturn(collect([
            new Record([
                'user_id' => 1234,
                'created_at' => "2012-02-02",
                'onboarding_percentage' => 50,
                'count_applications' => 1,
                'count_accepted_applications' => 0,
            ]),
            new Record([
                'user_id' => 2222,
                'created_at' => "2012-02-03",
                'onboarding_percentage' => 40,
                'count_applications' => 0,
                'count_accepted_applications' => 0,
            ]),
            new Record([
                'user_id' => 2222,
                'created_at' => "2012-02-04",
                'onboarding_percentage' => 60,
                'count_applications' => 0,
                'count_accepted_applications' => 0,
            ])
        ]));
        return $mock;
    }
}
