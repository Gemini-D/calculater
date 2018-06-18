<?php
// +----------------------------------------------------------------------
// | Adder.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Know\Calculater\Adapter;

use Know\Calculater\Adapter;
use Know\Calculater\CalculaterInterface;

class Adder extends Adapter
{
    public function handle()
    {
        $result = 0;
        foreach ($this->arguments as $arg) {
            $result += $this->getValue($arg);
        }
        return $result;
    }
}
