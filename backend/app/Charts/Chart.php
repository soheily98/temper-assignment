<?php

namespace App\Charts;

/**
 * Class BasicChart
 *
 * @package App\Charts
 */
class Chart implements \JsonSerializable
{
    /**
     * @var array
     */
    private $options;

    /**
     * Chart constructor.
     *
     * @param $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * @return array
     */
    public function jsonSerialize()
    {
        return $this->options;
    }
}
