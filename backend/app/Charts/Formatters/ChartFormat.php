<?php

namespace App\Charts\Formatters;

/**
 * Class ChartFormat
 *
 * @package App\Charts\Formatters
 */
class ChartFormat
{
    /**
     * @var array
     */
    private $chart;

    /**
     * @var array
     */
    private $title;

    /**
     * @var array
     */
    private $xAxis;

    /**
     * @var array
     */
    private $yAxis;

    /**
     * @var array
     */
    private $series;

    /**
     * @return array
     */
    public function getChart()
    {
        return $this->chart;
    }

    /**
     * @param array $chart
     *
     * @return ChartFormat
     */
    public function setChart($chart)
    {
        $this->chart = $chart;
        return $this;
    }

    /**
     * @return array
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param array $title
     *
     * @return ChartFormat
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return array
     */
    public function getXAxis()
    {
        return $this->xAxis;
    }

    /**
     * @param array $xAxis
     *
     * @return ChartFormat
     */
    public function setXAxis($xAxis)
    {
        $this->xAxis = $xAxis;
        return $this;
    }

    /**
     * @return array
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * @param array $yAxis
     *
     * @return ChartFormat
     */
    public function setYAxis($yAxis)
    {
        $this->yAxis = $yAxis;
        return $this;
    }

    /**
     * @return array
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param array $series
     *
     * @return ChartFormat
     */
    public function setSeries($series)
    {
        $this->series = $series;
        return $this;
    }
}
