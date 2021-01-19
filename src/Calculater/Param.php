<?php

namespace Know\Calculater;

use Exception;

class Param
{
    protected $params;
    protected $extParams;

    public function __construct($params, $extParams = [])
    {
        $this->params = $params;
        $this->extParams = $extParams;
    }

    public function getParams()
    {
        return $this->params;
    }

    public function getValue($string)
    {
        if (is_numeric($string)) {
            return $string;
        }

        preg_match('/^\((\d+)(?:-(\d+))?\)$/', $string, $result);
        if (!isset($result[1]) || !is_numeric($result[1])) {
            throw new Exception('参数格式不合法');
        }

        if (!isset($this->params[$result[1]])) {
            throw new Exception("目标参数[$result[1]]不存在！");
        }

        # 带选项的情况
        if (isset($result[2])) {
          if (!isset($this->extParams[$result[1]])) {
            throw new Exception("目标参数[$result[1]]不存在！");
          }
          $ret = $result[2] == $this->extParams[$result[1]] ? $this->params[$result[1]] : 0;
          return $ret;
        }

        return $this->params[$result[1]];
    }

    public function getRangeValue($begin, $end)
    {
        $result = [];
        while ($begin <= $end) {
            if (!isset($this->params[$begin])) {
                throw new Exception("目标参数[$begin]不存在！");
            }
            $result[$begin] = $this->params[$begin];
            $begin++;
        }

        return $result;
    }
}
