<?php
// +----------------------------------------------------------------------
// | RangeAdder.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Know\Calculater\Adapter;

use Know\Calculater\Adapter;
use Exception;

class RangeAdder extends Adapter
{
    public function handle()
    {
        if (!isset($this->arguments[0]) || !isset($this->arguments[1])) {
            throw new Exception('RangeAdder 必须传入初始值和终止值');
        }

        if (!is_numeric($this->arguments[0]) || !is_numeric($this->arguments[1])) {
            throw new Exception('RangeAdder 初始值和终止值必须为纯数字');
        }

        $begin = intval($this->arguments[0]);
        $end = intval($this->arguments[1]);

        $result = array_sum($this->param->getRangeValue($begin, $end));
        return $result;
    }
}
