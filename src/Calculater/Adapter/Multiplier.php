<?php
// +----------------------------------------------------------------------
// | Multiplier.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Know\Calculater\Adapter;

use Know\Calculater\Adapter;
use Know\Calculater\CalculaterInterface;

class Multiplier extends Adapter
{
    public function handle()
    {
        $result = 0;
        $first = true;
        foreach ($this->arguments as $arg) {
            $value = $this->getValue($arg);
            if ($first) {
                $result = $value;
                $first = false;
            } else {
                $result *= $value;
            }
        }
        return $result;
    }
}
