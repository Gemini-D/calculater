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

class Divisier extends Adapter
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
                $result /= $value;
            }
        }
        return $result;
    }
}
