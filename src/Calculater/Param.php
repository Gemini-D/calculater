<?php
// +----------------------------------------------------------------------
// | Param.php [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 limingxinleo All rights reserved.
// +----------------------------------------------------------------------
// | Author: limx <715557344@qq.com> <https://github.com/limingxinleo>
// +----------------------------------------------------------------------
namespace Know\Calculater;

use Exception;

class Param
{
    public $params;

    public function __construct($params)
    {
        $this->params = $params;
    }

    public function getValue($string)
    {
        if (is_numeric($string)) {
            return $string;
        }

        preg_match('/^\((\d+)\)$/', $string, $result);
        if (!isset($result[1]) || !is_numeric($result[1])) {
            throw new Exception('参数格式不合法');
        }

        if (!isset($this->params[$result[1]])) {
            throw new Exception('目标参数不存在！');
        }

        return $this->params[$result[1]];
    }
}
