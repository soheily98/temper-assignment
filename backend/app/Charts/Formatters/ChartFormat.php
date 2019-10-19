<?php

namespace App\Charts\Formatters;

/**
 * Class ChartFormat
 * @package App\Charts\Formatters
 */
class ChartFormat
{
    private $chart, $title, $legend, $xAxis, $yAxis, $series;

    /**
     * @return mixed
     */
    public function getChart()
    {
        return $this->chart;
    }

    /**
     * @param mixed $chart
     * @return ChartFormat
     */
    public function setChart($chart)
    {
        $this->chart = $chart;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     * @return ChartFormat
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLegend()
    {
        return $this->legend;
    }

    /**
     * @param mixed $legend
     * @return ChartFormat
     */
    public function setLegend($legend)
    {
        $this->legend = $legend;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getXAxis()
    {
        return $this->xAxis;
    }

    /**
     * @param mixed $xAxis
     * @return ChartFormat
     */
    public function setXAxis($xAxis)
    {
        $this->xAxis = $xAxis;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getYAxis()
    {
        return $this->yAxis;
    }

    /**
     * @param mixed $yAxis
     * @return ChartFormat
     */
    public function setYAxis($yAxis)
    {
        $this->yAxis = $yAxis;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getSeries()
    {
        return $this->series;
    }

    /**
     * @param mixed $series
     * @return ChartFormat
     */
    public function setSeries($series)
    {
        $this->series = $series;
        return $this;
    }
}
