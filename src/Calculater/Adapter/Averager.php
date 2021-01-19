<?php

declare(strict_types=1);
/**
 * This file is part of Knowyourself.
 *
 * @contact  l@hyperf.io
 * @license  https://github.com/kyknow/calculater/blob/master/LICENSE
 */
namespace Know\Calculater\Adapter;

use Know\Calculater\Adapter;

class Averager extends Adapter
{
    public function handle()
    {
        if (! isset($this->arguments[0]) || ! isset($this->arguments[1])) {
            throw new Exception('求和算法 必须传入初始值和终止值');
        }

        if (! is_numeric($this->arguments[0]) || ! is_numeric($this->arguments[1])) {
            throw new Exception('求和算法 初始值和终止值必须为纯数字');
        }

        $begin = intval($this->arguments[0]);
        $end = intval($this->arguments[1]);

        $params = $this->param->getRangeValue($begin, $end);
        return array_sum($params) / count($params);
    }
}
