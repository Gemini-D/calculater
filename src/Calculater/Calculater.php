<?php

declare(strict_types=1);
/**
 * This file is part of Knowyourself.
 *
 * @contact  l@hyperf.io
 * @license  https://github.com/kyknow/calculater/blob/master/LICENSE
 */
namespace Know\Calculater;

use Exception;
use Know\Calculater\Adapter\Abser;
use Know\Calculater\Adapter\Adder;
use Know\Calculater\Adapter\Averager;
use Know\Calculater\Adapter\Divisier;
use Know\Calculater\Adapter\Minuser;
use Know\Calculater\Adapter\Multiplier;
use Know\Calculater\Adapter\Sumer;
use Know\Calculater\Exceptions\CalculaterException;

class Calculater
{
    public $adapter = [
        '+' => Adder::class,
        'ADD' => Adder::class,
        '-' => Minuser::class,
        'MINUS' => Minuser::class,
        '*' => Multiplier::class,
        'MULTI' => Multiplier::class,
        '/' => Divisier::class,
        'DIVIS' => Divisier::class,
        '++' => Sumer::class,
        'SUM' => Sumer::class,
        'AVERAGE' => Averager::class,
        'ABS' => Abser::class,
    ];

    public function calculate($string, $params = [], $extParams = [])
    {
        [$cal, $string] = explode(' ', $string, 2);
        $cal = strtoupper($cal);

        if (! isset($this->adapter[$cal])) {
            throw new CalculaterException('Calcaulater Adapter is not defined.');
        }

        $string = trim($string);

        $pre_arguments = [];
        $param = '';
        $depth = 0;
        for ($i = 0; $i < strlen($string); ++$i) {
            $char = $string[$i];
            if ($char === '(') {
                ++$depth;
            } elseif ($char === ')') {
                --$depth;
            }
            $param .= $char;

            $isSuccess = $depth === 0 && (trim($char) === '' || $i == strlen($string) - 1);
            if ($isSuccess) {
                if (trim($param) !== '') {
                    $pre_arguments[] = trim($param);
                }
                $param = '';
            }
        }

        $arguments = [];
        foreach ($pre_arguments as $argument) {
            if (is_numeric($argument)) {
                $arguments[] = $argument;
            } else {
                preg_match('/^\((.*)\)$/', $argument, $result);
                if (! isset($result[1])) {
                    throw new Exception('参数格式不合法');
                }

                preg_match('/^\\d+(-\\d+)?$/', $result[1], $withOptions);
                if (is_numeric($result[1]) || isset($withOptions[1])) {
                    $arguments[] = $argument;
                } else {
                    $arguments[] = $this->calculate($result[1], $params, $extParams);
                }
            }
        }

        $adapter = new $this->adapter[$cal]($arguments, $params, $extParams);
        return $adapter->handle();
    }
}
