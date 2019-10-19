<?php

namespace App\Charts;

/**
 * Class BasicChart
 * @package App\Charts
 */
class Chart implements \JsonSerializable
{
    /**
     * @var mixed
     */
    private $options;

    /**
     * Chart constructor.
     * @param $options
     */
    public function __construct($options)
    {
        $this->options = $options;
    }

    /**
     * @return mixed
     */
    public function jsonSerialize()
    {
        return $this->options;
    }
}
