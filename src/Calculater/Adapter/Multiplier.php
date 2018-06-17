<?php
// +----------------------------------------------------------------------
// | Multiplier.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Know\Calculater\Adapter;

use Know\Calculater\CalculaterInterface;

class Multiplier implements CalculaterInterface
{
    public $arguments;

    public function __construct()
    {
        $this->arguments = func_get_args();
    }

    public function handle()
    {
        $result = 0;
        $first = true;
        foreach ($this->arguments as $arg) {
            if ($first) {
                $result = $arg;
                $first = false;
            } else {
                if (is_numeric($arg)) {
                    $result *= $arg;
                }
                if ($arg instanceof CalculaterInterface) {
                    $result *= floatval($arg->handle());
                }
            }
        }
        return $result;
    }
}