<?php

use App\Charts\Factory\ChartFactoryImpl;
use App\Charts\Formatters\ChartFormat;
use App\Charts\Formatters\Contracts\ChartFormatter;
use App\Repositories\Contracts\RecordRepository;

class ChartFactoryTest extends TestCase
{
    /**
     * @test
     */
    public function testItWorks()
    {
        $factory = new ChartFactoryImpl();

        $repositoryMock = Mockery::mock(RecordRepository::class);
        $formatterMock = Mockery::mock(ChartFormatter::class);

        $formatterMock->shouldReceive('format')->andReturn(
            (new ChartFormat())->setTitle(['text' => 'someTitle'])
        );

        $chart = $factory->factory($repositoryMock, $formatterMock);

        $this->assertEquals($chart->jsonSerialize()['title']['text'], "someTitle");
    }
}
