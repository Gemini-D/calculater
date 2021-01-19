<?php

declare(strict_types=1);
/**
 * This file is part of Knowyourself.
 *
 * @contact  l@hyperf.io
 * @license  https://github.com/kyknow/calculater/blob/master/LICENSE
 */
namespace Know\Calculater;

abstract class Adapter implements CalculaterInterface
{
    protected $arguments;

    protected $param;

    /**
     * Adapter constructor.
     * @param $arguments 变量KEY或者数字
     * @param $params    变量值
     * @param mixed $extParams
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
