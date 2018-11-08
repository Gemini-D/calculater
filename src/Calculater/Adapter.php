<?php
// +----------------------------------------------------------------------
// | Adapter.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Know\Calculater;

use Know\Calculater\Adapter\Adder;
use Know\Calculater\Adapter\Minuser;
use Know\Calculater\Adapter\Multiplier;
use Know\Calculater\Exceptions\CalculaterException;
use Exception;
use Know\Calculater\Param;

abstract class Adapter implements CalculaterInterface
{
    protected $arguments;

    protected $param;

    /**
     * Adapter constructor.
     * @param $arguments 变量KEY或者数字
     * @param $params    变量值
     */
    public function __construct($arguments, $params, $extParams)
    {
        $this->arguments = $arguments;
        $this->param = new Param($params, $extParams);
    }

    public function getValue($string)
    {
        return $this->param->getValue($string);
    }
}
